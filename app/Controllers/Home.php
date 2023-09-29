<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('home');
    }
}

class Login extends BaseController
{
    public function about(): string
    {
        return view('form_absensi');
    }
}
