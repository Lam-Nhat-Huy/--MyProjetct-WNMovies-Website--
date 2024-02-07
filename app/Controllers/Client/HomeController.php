<?php

namespace App\Controllers\Client;

use App\Controllers\BaseController;
use App\Models\HomeModel;

class HomeController extends BaseController
{
    protected $HomeModel;

    public function __construct()
    {
        $this->HomeModel = new HomeModel();
    }

    public function index()
    {
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $result_per_page = 6;
        $number_of_results = $this->HomeModel->displayMoviesList();
        $this_page_first_result = ($page - 1) * $result_per_page;
        $number_of_pages = ceil($number_of_results / $result_per_page);

        $i = [
            'getNewMovies' => $this->HomeModel->getNewMovies(),
            'displayMoviesList' => $this->HomeModel->displayMoviesList()
        ];

        $this->view('ClientMasterView', [
            'pages' => 'client/HomeClientView',
            'displayMoviesList' => $i['getNewMovies'],
            'getNewMovies' => $i['getNewMovies'],
            'movies' => $this->HomeModel->getMoviesLimit($this_page_first_result, $result_per_page),
            'number' => $number_of_pages,
        ]);
    }
}
