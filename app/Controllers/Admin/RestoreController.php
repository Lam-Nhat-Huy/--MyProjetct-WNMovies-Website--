<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Core\HandleFunction;
use App\Models\PremiereModel;
use App\Models\MovieModel;
use App\Models\LoginModel;
use Exception;

class RestoreController extends BaseController
{
    protected $PremiereModel;
    protected $HandleFunction;
    protected $MovieModel;
    protected $LoginModel;


    public function __construct()
    {
        $this->PremiereModel = new PremiereModel();
        $this->MovieModel = new MovieModel();
        $this->LoginModel = new LoginModel();
        $this->HandleFunction = new HandleFunction();
        $this->HandleFunction->checkLoginAuthencation();
        $this->LoginModel->setTimeLogout();
    }

    public function index()
    {
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $result_per_page = 6;
        $number_of_results = $this->PremiereModel->displayHistoryMovies();
        $this_page_first_result = ($page - 1) * $result_per_page;
        $number_of_pages = ceil($number_of_results / $result_per_page);

        $historyDeletedMovies = $this->PremiereModel->historyDeletedMovies($this_page_first_result, $result_per_page);
        $this->view('AdminMasterView', [
            'pages' => '/admin/APremiereListView',
            'blocks' => '/apremiere/delete',
            'historyDeletedMovies' => $historyDeletedMovies,
            'number' => $number_of_pages,
        ]);
    }
}
