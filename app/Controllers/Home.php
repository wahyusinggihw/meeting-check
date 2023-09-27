<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('home');
    }

<<<<<<< HEAD
    public function formAbsensi()
=======
class Login extends BaseController
{
    public function about(): string
>>>>>>> 4c54e295d507b47f357f5c2d771ad9181147190a
    {
        return view('form_absensi');
    }
}
