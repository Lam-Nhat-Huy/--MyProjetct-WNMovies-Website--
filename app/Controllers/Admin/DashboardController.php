<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Core\HandleFunction;
use App\Models\LoginModel;
use App\Models\DashboardModel;

class DashboardController extends BaseController
{
    protected $HandleFunction;
    protected $LoginModel;
    protected $DashboardModel;

    public function __construct()
    {
        $this->HandleFunction = new HandleFunction();
        $this->LoginModel = new LoginModel();
        $this->DashboardModel = new DashboardModel();
        $this->HandleFunction->checkLoginAuthencation();
        $this->LoginModel->setTimeLogout();
    }

    public function index()
    {
        $countMovies = $this->DashboardModel->countMovies();
        $countUserAccount = $this->DashboardModel->countUsersAccount();
        $countAdminAccount = $this->DashboardModel->countAdminAccount();
        $getUsers = $this->DashboardModel->getUsers();
        $getMovies = $this->DashboardModel->getMovies();
        $getNewUsersCountWithinDay = $this->DashboardModel->getNewUsersCountWithinDay();
        $remainingTime = $this->DashboardModel->remainingTime();

        $this->view('AdminMasterView', [
            'pages' => 'admin/DashboardAdminView',
            'countMovies' => $countMovies,
            'countUserAccount' => $countUserAccount,
            'countAdminAccount' => $countAdminAccount,
            'getUsers' => $getUsers,
            'getMovies' => $getMovies,
            'getNewUsersCountWithinDay' => $getNewUsersCountWithinDay,
            'remainingTime' => $remainingTime,
        ]);
    }

    public function logout()
    {
        $this->LoginModel->logout();
    }
}
