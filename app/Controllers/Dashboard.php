<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index(): string
    {
        return view('dashboard/homedash');
    }

    public function agenda(): string
    {
        return view('dashboard/agenda_rapat');
    }
}
