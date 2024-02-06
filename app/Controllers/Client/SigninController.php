<?php

namespace App\Controllers\Client;

use App\Controllers\BaseController;
use App\Models\LoginModel;

class SigninController extends BaseController
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
            $password = $_POST['password'];

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailError = 'Vui lòng nhập địa chỉ email hợp lệ';
            }

            $passwordRegex = '/^.{4,}$/';

            if (!preg_match($passwordRegex, $password)) {
                $passwordError = 'Vui lòng nhập mật khẩu hợp lệ';
            }

            if (isset($emailError) || isset($passwordError)) {
                $this->view('ClientMasterView', [
                    'pages' => 'client/SigninClientView',
                    'emailError' => $emailError ?? '',
                    'passwordError' => $passwordError ?? '',
                ]);
                return;
            }

            $loginResult = $this->LoginModel->signin($email, $password);

            if (!$loginResult) {
                $passwordError = 'Sai tên đăng nhập hoặc mật khẩu';
                $this->view('ClientMasterView', [
                    'pages' => 'client/SigninClientView',
                    'emailError' => $emailError ?? '',
                    'passwordError' => $passwordError ?? '',
                ]);
                return;
            }

            exit;
        }

        $this->view('ClientMasterView', [
            'pages' => 'client/SigninClientView',
        ]);
    }

    public function logout()
    {
        $this->LoginModel->logoutClient();
    }
}
