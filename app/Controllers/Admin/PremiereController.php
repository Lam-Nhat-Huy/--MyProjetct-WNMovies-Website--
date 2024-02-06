<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Core\HandleFunction;
use App\Models\MovieModel;
use App\Models\PremiereModel;
use Exception;

class PremiereController extends BaseController
{
    protected $HandleFunction;
    protected $PremiereModel;
    protected $MovieModel;

    public function __construct()
    {
        $this->PremiereModel = new PremiereModel();
        $this->MovieModel = new MovieModel();
        $this->HandleFunction = new HandleFunction();
        $this->HandleFunction->checkLoginAuthencation();
    }

    public function index()
    {
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $result_per_page = 6;
        $number_of_results = $this->PremiereModel->displayMoviesList();
        $this_page_first_result = ($page - 1) * $result_per_page;
        $number_of_pages = ceil($number_of_results / $result_per_page);

        $o = [
            'displayMoviesList' => '',
        ];

        $o['displayMoviesList'] = $this->PremiereModel->displayMoviesList();

        $this->view('AdminMasterView', [
            'pages' => 'admin/APremiereListView',
            'blocks' => 'apremiere/list',
            'displayMoviesList' => $o['displayMoviesList'],
            'movies' => $this->PremiereModel->getMoviesLimit($this_page_first_result, $result_per_page),
            'number' => $number_of_pages,
        ]);
    }

    public function add()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
            $thumb_url = filter_input(INPUT_POST, 'thumb_url', FILTER_SANITIZE_URL);
            $origin_name = filter_input(INPUT_POST, 'origin_name', FILTER_SANITIZE_SPECIAL_CHARS);
            $content = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_SPECIAL_CHARS);
            $year = filter_input(INPUT_POST, 'year', FILTER_SANITIZE_SPECIAL_CHARS);
            $time = filter_input(INPUT_POST, 'time', FILTER_SANITIZE_SPECIAL_CHARS);
            $slug = filter_input(INPUT_POST, 'slug', FILTER_SANITIZE_SPECIAL_CHARS);
            $lang = filter_input(INPUT_POST, 'lang', FILTER_SANITIZE_SPECIAL_CHARS);
            $quality = filter_input(INPUT_POST, 'quality', FILTER_SANITIZE_SPECIAL_CHARS);
            $status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_SPECIAL_CHARS);
            $category = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_SPECIAL_CHARS);
            $country = filter_input(INPUT_POST, 'country', FILTER_SANITIZE_SPECIAL_CHARS);
            $link_embed = filter_input(INPUT_POST, 'link_embed', FILTER_SANITIZE_SPECIAL_CHARS);
            $this->MovieModel->addNewMovies($name, $thumb_url, $origin_name, $content, $year, $time, $slug, $lang, $quality, $status, $category, $country, $link_embed);
        }

        $this->view('AdminMasterView', [
            'pages' => 'admin/APremiereListView',
            'blocks' => 'apremiere/add',
        ]);
    }

    public function edit()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_POST['id'];
            $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
            $thumb_url = filter_input(INPUT_POST, 'thumb_url', FILTER_SANITIZE_URL);
            $origin_name = filter_input(INPUT_POST, 'origin_name', FILTER_SANITIZE_SPECIAL_CHARS);
            $content = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_SPECIAL_CHARS);
            $year = filter_input(INPUT_POST, 'year', FILTER_SANITIZE_SPECIAL_CHARS);
            $time = filter_input(INPUT_POST, 'time', FILTER_SANITIZE_SPECIAL_CHARS);
            $slug = filter_input(INPUT_POST, 'slug', FILTER_SANITIZE_SPECIAL_CHARS);
            $lang = filter_input(INPUT_POST, 'lang', FILTER_SANITIZE_SPECIAL_CHARS);
            $quality = filter_input(INPUT_POST, 'quality', FILTER_SANITIZE_SPECIAL_CHARS);
            $status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_SPECIAL_CHARS);
            $category = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_SPECIAL_CHARS);
            $country = filter_input(INPUT_POST, 'country', FILTER_SANITIZE_SPECIAL_CHARS);
            $link_embed = filter_input(INPUT_POST, 'link_embed', FILTER_SANITIZE_SPECIAL_CHARS);
            $this->MovieModel->editMovies($id, $name, $thumb_url, $origin_name, $content, $year, $time, $slug, $lang, $quality, $status, $category, $country, $link_embed);
        }

        $this->view('AdminMasterView', [
            'pages' => 'admin/APremiereListView',
            'blocks' => 'apremiere/edit',
            'getOneMovies' => $this->PremiereModel->getOneMovies()
        ]);
    }

    public function delete()
    {
        try {
            $movieId = $_GET['id'];
            $this->MovieModel->deleteMovies($movieId);
            header("Location: {$_SERVER['HTTP_REFERER']}");
        } catch (Exception $e) {
            echo "Errors" . $e->getMessage();
        }
    }

    public function restore()
    {
        try {
            $movieId = $_GET['id'];
            $this->MovieModel->restoreMovies($movieId);
            header("Location: {$_SERVER['HTTP_REFERER']}");
        } catch (Exception $e) {
            echo "Errors" . $e->getMessage();
        }
    }

    public function permanently()
    {
        try {
            $movieId = $_GET['id'];
            $this->MovieModel->permanentlyDelete($movieId);
            header("Location: {$_SERVER['HTTP_REFERER']}");
        } catch (Exception $e) {
            echo "Errors" . $e->getMessage();
        }
    }
}
