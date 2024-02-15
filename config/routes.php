<?php

namespace App;

use AccountModel;
use App\Core\Route;
use App\Controllers\Admin\LoginController as LoginAdminController;
use App\Controllers\Client\HomeController as HomeClientController;
use App\Controllers\Admin\DashboardController as DashboardController;
use App\Controllers\Admin\MoviesController as MoviesController;
use App\Controllers\Admin\PremiereController as PremiereController;
use App\Controllers\Admin\RestoreController as RestoreController;
use App\Controllers\Client\SignupController as SignupClientController;
use App\Controllers\Client\SigninController as SigninClientController;
use App\Controllers\Client\ContactController as ContactClientController;
use App\Controllers\Client\WatchingController as WatchingClientController;
use App\Controllers\Admin\AnalyticController as AnalyticAdminController;


class routes
{
    public function __construct()
    {
        // Khi nào liên quan tới form thì dùng post còn get trên url thì dùng get
        $route = new Route;

        // Xử lý đăng nhập admin
        $route->get('/admin', [LoginAdminController::class, 'index']);
        $route->post('/admin', [LoginAdminController::class, 'index']);
        $route->get('/dashboard', [DashboardController::class, 'index']);
        $route->get('/logout', [DashboardController::class, 'logout']);

        $route->get('/movie', [MoviesController::class, 'index']);
        $route->get('/movie/detail', [MoviesController::class, 'detail']);
        $route->post('/movie/add', [MoviesController::class, 'add']);

        $route->get('/premiere', [PremiereController::class, 'index']);
        $route->get('/premiere/add', [PremiereController::class, 'add']);
        $route->post('/premiere/create', [PremiereController::class, 'add']);

        $route->get('/premiere/edit', [PremiereController::class, 'edit']);
        $route->post('/premiere/edit', [PremiereController::class, 'edit']);

        $route->get('/premiere/delete', [PremiereController::class, 'delete']);

        $route->get('/restore', [RestoreController::class, 'index']);
        $route->get('/premiere/restore', [PremiereController::class, 'restore']);
        $route->get('/premiere/permanently', [PremiereController::class, 'permanently']);

        // Xử lý route phía client
        $route->get('', [HomeClientController::class, 'index']);
        $route->get('/home', [HomeClientController::class, 'index']);

        $route->get('/signup', [SignupClientController::class, 'index']);
        $route->post('/signup', [SignupClientController::class, 'index']);

        $route->get('/signin', [SigninClientController::class, 'index']);
        $route->post('/signin', [SigninClientController::class, 'index']);
        $route->get('/logout-client', [SigninClientController::class, 'logout']);

        $route->get('/contact', [ContactClientController::class, 'index']);
        $route->post('/contact', [ContactClientController::class, 'index']);

        $route->get('/watching', [WatchingClientController::class, 'index']);
        $route->post('/watching', [WatchingClientController::class, 'comment']);

        $route->get('/watching/delete', [WatchingClientController::class, 'delete']);

        $route->get('/analytics', [AnalyticAdminController::class, 'index']);






        try {
            $route->resolve($_SERVER['REQUEST_URI'], strtolower($_SERVER['REQUEST_METHOD']));
        } catch (\Exception $e) {
            echo "Error" . $e->getMessage();
        }
    }
}
