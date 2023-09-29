<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index(): string
    {
        return view('dashboard/home');
    }

    public function agenda(): string
    {
        return view('dashboard/agenda_rapat');
    }

    public function saveAgenda()
    {

        return view('dashboard/agenda_rapat');
    }
}
