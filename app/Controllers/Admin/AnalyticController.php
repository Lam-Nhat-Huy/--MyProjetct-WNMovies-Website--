<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use GeoIp2\Database\Reader;
use App\Core\HandleFunction;
use App\Models\DashboardModel;
use App\Models\LoginModel;

class AnalyticController extends BaseController
{

    protected $HandleFunction;
    protected $LoginModel;
    protected $DashboardModel;

    public function __construct()
    {
        $this->HandleFunction = new HandleFunction();
        $this->DashboardModel = new DashboardModel();
        $this->LoginModel = new LoginModel();
        $this->LoginModel->setTimeLogout();
        $this->HandleFunction->checkLoginAuthencation();
    }

    public function index()
    {
        $countMovies = $this->DashboardModel->countMovies();
        $countUserAccount = $this->DashboardModel->countUsersAccount();
        $countAdminAccount = $this->DashboardModel->countAdminAccount();
        $getUsers = $this->DashboardModel->getUsers();
        $getMovies = $this->DashboardModel->getMovies();
        $getNewUsersCountWithinDay = $this->DashboardModel->getNewUsersCountWithinDay();
        $getNewUsersCountWithinWeek = $this->DashboardModel->getNewUsersCountWithinWeek();
        $getNewUsersCountWithinMonth = $this->DashboardModel->getNewUsersCountWithinMonth();
        $remainingTime = $this->DashboardModel->remainingTime();

        $this->view('AdminMasterView', [
            'pages' => 'admin/AnalyticListView',
            'countMovies' => $countMovies,
            'countUserAccount' => $countUserAccount,
            'countAdminAccount' => $countAdminAccount,
            'getUsers' => $getUsers,
            'getMovies' => $getMovies,
            'getNewUsersCountWithinDay' => $getNewUsersCountWithinDay,
            'getNewUsersCountWithinWeek' => $getNewUsersCountWithinWeek,
            'getNewUsersCountWithinMonth' => $getNewUsersCountWithinMonth,
            'remainingTime' => $remainingTime,
            'userCountsByCountry' => $this->analyticCountry(),
        ]);
    }

    private function analyticCountry()
    {
        $users = $this->DashboardModel->getIpAddressInUsers();

        $databaseFile = './data/GeoLite2-Country.mmdb';

        try {
            $reader = new Reader($databaseFile);

            $userCountsByCountry = [];

            foreach ($users as $user) {
                $ipAddress = $user['ip_address'];

                $record = $reader->country($ipAddress);

                $countryCode = $record->country->isoCode;
                if (!isset($userCountsByCountry[$countryCode])) {
                    $userCountsByCountry[$countryCode] = [
                        'name' => $record->country->name,
                        'count' => 1
                    ];
                } else {
                    $userCountsByCountry[$countryCode]['count']++;
                }
            }

            return $userCountsByCountry;
        } catch (\Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}
