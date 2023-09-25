<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }
}

class Login extends BaseController
{
    public function index(): string
    {
        return view('login');
    }
}
