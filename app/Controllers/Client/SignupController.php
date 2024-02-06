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
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $this->LoginModel->signup($username, $password, $email);
        }

        $this->view('ClientMasterView', [
            'pages' => 'client/SignupClientView',
        ]);
    }
}
