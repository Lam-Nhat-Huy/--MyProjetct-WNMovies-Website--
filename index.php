<?php
require_once "vendor/autoload.php";
require_once './app/Core/Function.php';

session_start();

date_default_timezone_set('Asia/Ho_Chi_Minh');


// setup để chạy file mô trường env
$dotenv = Dotenv\Dotenv::createUnsafeImmutable(__DIR__);
$dotenv->safeLoad();

use App\routes;

$routes = new routes();
