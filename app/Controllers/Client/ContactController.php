<?php

namespace App\Controllers\Client;

use App\Core\HandleFunction;
use App\Controllers\BaseController;
use App\Models\ContactModel;


class ContactController extends BaseController
{
    protected $HandleFunction;
    protected $ContactModel;

    public function __construct()
    {
        $this->HandleFunction = new HandleFunction();
        $this->ContactModel = new ContactModel();
    }

    public function index()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $content = $_POST['content'];
            if (!empty($content) && !empty($username) && !empty($email)) {
                $this->ContactModel->sendContactEmail($email, $username, $content);
            }
        }

        $this->view('ClientMasterView', [
            'pages' => 'client/ContactClientView',
        ]);
    }
}
