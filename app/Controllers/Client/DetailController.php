<?php

namespace App\Controllers\Client;

use App\Controllers\BaseController;
use App\Models\DetailModel;
use App\Models\WatchingModel;
use App\Models\HomeModel;

class DetailController extends BaseController
{

    protected $DetailModel;
    protected $WatchingModel;
    protected $HomeModel;

    public function __construct()
    {
        $this->DetailModel = new DetailModel();
        $this->WatchingModel = new WatchingModel();
        $this->HomeModel = new HomeModel();
    }

    public function index()
    {
        $i = [
            'slug' => $_GET['slug']
        ];

        $url = $_GET['slug'];
        $query = parse_url($url, PHP_URL_QUERY);
        parse_str($query, $params);

        $o = [
            'movie_id' => intval($params['movie_id'])
        ];

        $getRecommendMovies = $this->DetailModel->getRecommendMovies($o['movie_id']);

        foreach ($getRecommendMovies as $item) {
            $recommand_movies = $this->DetailModel->recommendMovieApi($item['vote_average'], $item['vote_count']);
        }

        $getCommentsById = $this->WatchingModel->getCommentsById($o['movie_id']);
        $getSlugMovies = $this->WatchingModel->getSlugMovies($i['slug']);
        $getAllMovies = $this->WatchingModel->getAllMovies();

        $this->view('ClientMasterView', [
            'pages' => 'client/DetailClientView',
            'getSlugMovies' => $getSlugMovies,
            'getAllMovies' => $getAllMovies,
            'getCommentsById' => $getCommentsById,
            'recommendMovies' => $recommand_movies
        ]);
    }

    public function addFavourite()
    {
        $i = [
            'slug' => $_GET['slug']
        ];

        $url = $i['slug'];

        $query = parse_url($url, PHP_URL_QUERY);

        parse_str($query, $params);

        $o = [
            'movie_id' => intval($params['movie_id']),
            'user_id' => $_SESSION['client_user_id']
        ];

        try {
            $this->DetailModel->addFavoriteMovie($o['user_id'], $o['movie_id']);
        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
