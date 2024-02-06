<?php

namespace App\Controllers;

class BaseController
{
    public function model($model)
    {
        require_once '/app/Models/' . $model . '.php';
    }

    public function view($view, $data = [])
    {
        require_once './app/Views/' . $view . '.php';
    }
}