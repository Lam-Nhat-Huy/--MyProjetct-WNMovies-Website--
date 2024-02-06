<?php

namespace App\Core;

use App\Controllers\BaseController;
use Exception;

class RouteNotFoundException extends BaseController
{
    public function __construct()
    {
        parent::view('AuthMasterView', [
            'pages' => 'errors/404',
        ]);
    }
}
