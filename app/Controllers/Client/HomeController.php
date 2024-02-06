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

        $i = [
            'getAllMovies' => $this->HomeModel->getAllMovies(),
            'getNewMovies' => $this->HomeModel->getNewMovies(),
        ];

        $this->view('ClientMasterView', [
            'pages' => 'client/HomeClientView',
            'getAllMovies' => $i['getAllMovies'],
            'getNewMovies' => $i['getNewMovies'],
        ]);
    }
}
