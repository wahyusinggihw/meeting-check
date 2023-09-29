<?php

namespace App\Controllers;

use App\Models\AgendaRapatModel;

class Dashboard extends BaseController
{
    // public function __construct()
    // {
    //     $this->$agendaRapat = new AgendaRapat();
    // }

    public function index(): string
    {
        return view('dashboard/homedash');
    }

    public function agenda()
    {
        $agendaRapat = new AgendaRapatModel();
        $data = $agendaRapat->findAll();
        return view('dashboard/agenda_rapat', ['data' => $data]);
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
