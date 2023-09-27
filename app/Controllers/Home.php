<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('home');
    }

    public function formAbsensi()
    {
        return view('form_absensi');
    }
}
