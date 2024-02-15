<?php

namespace App\Controllers\Client;

use App\Controllers\BaseController;
use App\Models\LoginModel;

class SignupController extends BaseController
{
    protected $LoginModel;

    public function __construct()
    {
        $this->LoginModel = new LoginModel();
    }

    public function index()
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $email = $_POST['email'];
                $username = $_POST['username'];
                $password = $_POST['password'];
                $ipAddress = $this->getRemoteAddresses();
                $this->LoginModel->signup($username, $password, $email, $ipAddress);
            }

            $this->view('ClientMasterView', [
                'pages' => 'client/SignupClientView',
            ]);
        } catch (\Exception $e) {
            echo "Có lỗi xảy ra: " . $e->getMessage();
        }
    }

    private function getRemoteAddresses()
    {
        try {
            if ($_SERVER['REMOTE_ADDR'] == '::1') {
                $userIP = '116.111.186.45';
                return $userIP;
            } else {
                $userIP = $_SERVER['REMOTE_ADDR'];
                return $userIP;
            }
        } catch (\Exception $e) {
            echo "Có lỗi xảy ra: " . $e->getMessage();
        }
    }
}
