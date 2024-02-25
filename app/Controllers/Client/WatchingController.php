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
            'pages' => 'client/WatchingClientView',
            'getSlugMovies' => $getSlugMovies,
            'getAllMovies' => $getAllMovies,
            'getCommentsById' => $getCommentsById,
        ]);
    }

    public function comment()
    {
        try {
            $url = $_GET['slug'];
            $query = parse_url($url, PHP_URL_QUERY);
            parse_str($query, $params);
            $movie_id = intval($params['movie_id']);
        } catch (\Exception $e) {
            echo "Errors" . $e->getMessage();
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $comment = $_POST['comment'];
            $user_id = $_SESSION['client_user_id'];
            $movie_id = $movie_id;
            $rating = $_POST['rate'];

            if (!empty($comment)) {
                $this->WatchingModel->addComment($comment, $user_id, $movie_id, $rating);
                exit;
            }
        }
    }

    public function delete()
    {
        try {
            $movie_id = $_GET['id'];

            $this->WatchingModel->deleteComment($movie_id);
            header("Location: {$_SERVER['HTTP_REFERER']}");
        } catch (\Exception $e) {
            echo "Errors" . $e->getMessage();
        }
    }
}
