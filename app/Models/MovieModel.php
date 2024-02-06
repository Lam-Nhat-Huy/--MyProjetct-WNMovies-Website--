<?php

namespace App\Models;

use App\Models\BaseModel;
use App\Core\HandleFunction;

use Exception;

class MovieModel extends BaseModel
{
    protected $HandleFunction;

    public function __construct()
    {
        $this->HandleFunction = new HandleFunction();
    }

    public function getAllMovies()
    {
        try {
            $movie = $this->getAll('movies');
            return $movie;
        } catch (Exception $e) {
            echo "Error" . $e->getMessage();
        }
    }

    public function getApiCache($url)
    {
        $cacheFile = 'cache/' . md5($url) . '.json';
        $cacheTime = 3200;
        if (file_exists($cacheFile) && time() - fileatime($cacheFile) < $cacheTime) {
            $data = file_get_contents($cacheFile);
            return json_decode($data, true);
        }
        $apiResponse = file_get_contents($url);
        file_put_contents($cacheFile, $apiResponse);
        return json_decode($apiResponse, true);
    }

    public function getApiMovies($page)
    {
        $i = [
            'api' => 'https://ophim1.com/danh-sach/phim-moi-cap-nhat/?page=' . $page,
            'data' => ''
        ];

        $i['data'] = $this->getApiCache($i['api']);
        return $i['data'];
    }

    public function getSlugMovies($slug)
    {
        $i = [
            'slug' => "https://ophim1.com/phim/" . $slug,
            'data' => ''
        ];

        $i['data'] = $this->getApiCache($i['slug']);
        return $i['data'];
    }

    public function addNewMovies($name, $thumb_url, $origin_name, $content, $year, $time, $slug, $lang, $quality, $status, $category, $country, $link_embed)
    {
        $data = array(
            'name' => $name,
            'thumb_url' => $thumb_url,
            'origin_name' => $origin_name,
            'content' => $content,
            'year' => $year,
            'time' => $time,
            'slug' => $slug,
            'lang' => $lang,
            'quality' => $quality,
            'status' => $status,
            'category' => $category,
            'country' => $country,
            'link_embed' => $link_embed,
        );

        try {
            $model = new BaseModel();
            $lastInsertId = $model->insert('movies', $data);

            if ($lastInsertId) {
                $_SESSION['message_success'] = $this->HandleFunction->alertSuccess('Bạn đã công chiếu phim thành công');
                echo '<script>window.history.go(-2);</script>';
            } else {
                $_SESSION['message_error'] =  $this->HandleFunction->alertError('An error occurred while adding the movie. Please try again.');
                header('Location: /movie/');
            }
        } catch (Exception $e) {
            error_log("Error: " . $e->getMessage());
            $_SESSION['message_error'] =  $this->HandleFunction->alertError('An error occurred while adding the movie. Please try again.');
            header('Location: /movie/');
        }
    }

    public function editMovies($id, $name, $thumb_url, $origin_name, $content, $year, $time, $slug, $lang, $quality, $status, $category, $country, $link_embed)
    {
        $data = [
            'name' => $name,
            'thumb_url' => $thumb_url,
            'origin_name' => $origin_name,
            'content' => $content,
            'year' => $year,
            'time' => $time,
            'slug' => $slug,
            'lang' => $lang,
            'quality' => $quality,
            'status' => $status,
            'category' => $category,
            'country' => $country,
            'link_embed' => $link_embed,
        ];

        $cond = 'id';
        $condValue = $id;

        try {
            $model = new BaseModel();
            $result = $model->update('movies', $data, $cond, $condValue);

            if ($result) {
                $_SESSION['message_success'] = $this->HandleFunction->alertSuccess('Cập nhật phim thành công');
                echo '<script>window.history.go(-2);</script>';
            } else {
                $_SESSION['message_error'] = $this->HandleFunction->alertError('Có lỗi xảy ra khi cập nhật phim. Vui lòng thử lại.');
                header('Location: /movie/');
            }
        } catch (Exception $e) {
            error_log("Error: " . $e->getMessage());
            $_SESSION['message_error'] = $this->HandleFunction->alertError('Có lỗi xảy ra khi cập nhật phim. Vui lòng thử lại.');
            header('Location: /movie/');
        }
    }

    public function deleteMovies($movieId)
    {
        $data = ['is_deleted' => 1];
        $cond = 'id';
        $condValue = $movieId;

        try {
            $model = new BaseModel();
            $result = $model->update('movies', $data, $cond, $condValue);

            if ($result) {
                $_SESSION['message_success'] = $this->HandleFunction->alertSuccess('Xóa phim thành công');
            } else {
                $_SESSION['message_error'] = $this->HandleFunction->alertError('Có lỗi xảy ra khi xóa phim. Vui lòng thử lại.');
            }
        } catch (Exception $e) {
            error_log("Error: " . $e->getMessage());
            $_SESSION['message_error'] = $this->HandleFunction->alertError('Có lỗi xảy ra khi xóa phim. Vui lòng thử lại.');
        }
    }

    public function restoreMovies($movieId)
    {
        $data = ['is_deleted' => 0];
        $cond = 'id';
        $condValue = $movieId;

        try {
            $model = new BaseModel();
            $result = $model->update('movies', $data, $cond, $condValue);

            if ($result) {
                $_SESSION['message_success'] = $this->HandleFunction->alertSuccess('Phục hồi phim thành công');
            } else {
                $_SESSION['message_error'] = $this->HandleFunction->alertError('Có lỗi xảy ra khi xóa phim. Vui lòng thử lại.');
            }
        } catch (Exception $e) {
            error_log("Error: " . $e->getMessage());
            $_SESSION['message_error'] = $this->HandleFunction->alertError('Có lỗi xảy ra khi xóa phim. Vui lòng thử lại.');
        }
    }

    public function permanentlyDelete($movieId)
    {
        $cond = 'id';
        $condValue = $movieId;

        try {
            $model = new BaseModel();
            $result = $model->delete('movies', $cond, $condValue);

            if ($result) {
                $_SESSION['message_success'] = $this->HandleFunction->alertSuccess('Xóa vĩnh viễn phim thành công');
            } else {
                $_SESSION['message_error'] = $this->HandleFunction->alertError('Có lỗi xảy ra khi xóa vĩnh viễn phim. Vui lòng thử lại.');
            }
        } catch (Exception $e) {
            error_log("Error: " . $e->getMessage());
            $_SESSION['message_error'] = $this->HandleFunction->alertError('Có lỗi xảy ra khi xóa vĩnh viễn phim. Vui lòng thử lại.');
        }
    }
}
