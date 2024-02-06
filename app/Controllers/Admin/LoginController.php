<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\LoginModel;

class LoginController extends BaseController
{
    protected $LoginModel;

    public function __construct()
    {
        $this->LoginModel = new LoginModel();
    }

    public function index()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $usernameRegex = '/^[a-zA-Z0-9_]{3,20}$/';
            $passwordRegex = '/^.{4,}$/';

            if (!preg_match($usernameRegex, $username)) {
                $usernameError = 'Vui lòng nhập username hợp lệ';
            }

            if (!preg_match($passwordRegex, $password)) {
                $passwordError = 'Vui lòng nhập mật khẩu hợp lệ';
            }

            if (isset($usernameError) || isset($passwordError)) {
                $this->view('AuthMasterView', [
                    'pages' => 'admin/AuthLoginView',
                    'auth' => $this->LoginModel->getAll('users'),
                    'usernameError' => $usernameError ?? '',
                    'passwordError' => $passwordError ?? '',
                ]);
                return;
            }

            $this->LoginModel->login($username, $password);
        }

        $this->view('AuthMasterView', [
            'pages' => 'admin/AuthLoginView',
            'auth' => $this->LoginModel->getAll('users'),
        ]);
    }
}
