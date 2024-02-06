<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Core\HandleFunction;
use App\Models\MovieModel;
use App\Models\LoginModel;
use Exception;

class MoviesController extends BaseController
{
    protected $HandleFunction;
    protected $MovieModel;
    protected $LoginModel;


    public function __construct()
    {
        $this->HandleFunction = new HandleFunction();
        $this->HandleFunction->checkLoginAuthencation();
        $this->MovieModel = new MovieModel();
        $this->LoginModel = new LoginModel();
        $this->LoginModel->setTimeLogout();
    }

    public function index()
    {

        $i = [
            'page' => ''
        ];

        $o = [
            'getApiMovies' => ''
        ];

        if (isset($_GET['page'])) {
            $i['page'] = $_GET['page'];
        } else {
            $i['page'] = 1;
        }

        $o['getApiMovies'] =  $this->MovieModel->getApiMovies($i['page']);

        $this->view('AdminMasterView', [
            'pages' => 'admin/AMoviesListView',
            'blocks' => 'amovies/list',
            'getApiMovies' =>  $o['getApiMovies'],
        ]);
    }

    public function add()
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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
        } catch (Exception $e) {
            echo "Error" . $e->getMessage();
        }
    }

    public function detail()
    {
        $i = [
            'slug' => ''
        ];

        $o = [
            'getSlugMovies' => ''
        ];

        $i['slug'] = $_GET['slug'];

        $o['getSlugMovies'] = $this->MovieModel->getSlugMovies($i['slug']);

        $this->view('AdminMasterView', [
            'pages' => '/admin/AMoviesListView',
            'blocks' => '/amovies/detail',
            'getSlugMovies' => $o['getSlugMovies'],
        ]);
    }
}
