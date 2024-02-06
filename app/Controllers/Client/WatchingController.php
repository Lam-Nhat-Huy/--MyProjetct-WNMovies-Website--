<?php

namespace App\Controllers\Client;

use App\Controllers\BaseController;
use App\Models\WatchingModel;

class WatchingController extends BaseController
{
    protected $WatchingModel;

    public function __construct()
    {
        $this->WatchingModel = new WatchingModel();
    }

    public function index()
    {
        $i = [
            'slug' => $_GET['slug']
        ];

        $getSlugMovies = $this->WatchingModel->getSlugMovies($i['slug']);
        $getAllMovies = $this->WatchingModel->getAllMovies();

        $this->view('ClientMasterView', [
            'pages' => 'client/WatchingClientView',
            'getSlugMovies' => $getSlugMovies,
            'getAllMovies' => $getAllMovies
        ]);
    }

    public function comment()
    {
    }
}
