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

    public function daftarpeserta(): string
    {
        return view('dashboard/daftar_peserta');
    }

    public function formagenda(): string
    {
        return view('dashboard/formagenda');
    }
}
