<?php

namespace App\Controllers\Client;

use App\Controllers\BaseController;
use App\Models\DetailModel;
use App\Models\WatchingModel;

class DetailController extends BaseController
{

    protected $DetailModel;
    protected $WatchingModel;

    public function __construct()
    {
        $this->DetailModel = new DetailModel();
        $this->WatchingModel = new WatchingModel();
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

        $getCommentsById = $this->WatchingModel->getCommentsById($o['movie_id']);
        $getSlugMovies = $this->WatchingModel->getSlugMovies($i['slug']);
        $getAllMovies = $this->WatchingModel->getAllMovies();

        $this->view('ClientMasterView', [
            'pages' => 'client/DetailClientView',
            'getSlugMovies' => $getSlugMovies,
            'getAllMovies' => $getAllMovies,
            'getCommentsById' => $getCommentsById,
        ]);
    }
}
