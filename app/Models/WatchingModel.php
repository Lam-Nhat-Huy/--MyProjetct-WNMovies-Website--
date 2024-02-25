<?php

namespace App\Models;

use App\Models\BaseModel;
use PDO;

class WatchingModel extends BaseModel
{
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

    public function getSlugMovies($slug)
    {
        $i = [
            'slug' => "https://ophim1.com/phim/" . $slug,
            'data' => ''
        ];

        $i['data'] = $this->getApiCache($i['slug']);
        return $i['data'];
    }

    public function getAllMovies()
    {
        try {
            $sql = "SELECT * FROM movies WHERE is_deleted = 0 LIMIT 4";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function getOneMovies($movieId)
    {
        try {
            $table = 'movies';
            $cond = 'id';
            return $this->getOne($table, $cond, $movieId);
        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }


    public function addComment($comment, $user_id, $movie_id, $rating)
    {
        try {
            $sql = "INSERT INTO comments (user_id, movie_id, comment, rating) VALUES (:user_id, :movie_id, :comment, :rating)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':user_id', $user_id);
            $stmt->bindParam(':movie_id', $movie_id);
            $stmt->bindParam(':comment', $comment);
            $stmt->bindParam(':rating', $rating);

            if ($stmt->execute()) {
                header("Location: {$_SERVER['HTTP_REFERER']}");
                exit;
            }
        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function getCommentsById($movie_id)
    {
        try {
            $sql = "SELECT u.username, cm.id , cm.user_id, cm.comment, cm.movie_id, cm.created_at 
                    FROM comments cm, users u 
                    WHERE cm.user_id = u.id 
                    AND cm.is_deleted = 0 
                    AND cm.movie_id = :movie_id
                    ORDER BY cm.created_at DESC"; // Order by created_at in descending order

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':movie_id', $movie_id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function deleteComment($movie_id)
    {
        $data = ['is_deleted' => 1];
        $cond = 'id';
        $condValue = $movie_id;

        try {
            $model = new BaseModel();
            $result = $model->update('comments', $data, $cond, $condValue);

            if ($result) {
                return true;
            } else {
                return false;
            }
        } catch (\Exception $e) {
            error_log("Error: " . $e->getMessage());
            die;
        }
    }
}
