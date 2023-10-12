<?php

namespace App\Controllers;

use App\Models\AgendaRapatModel;

class Dashboard extends BaseController
{
    // public function __construct()
    // {
    //     $this->$agendaRapat = new AgendaRapat();
    // }

    public function index()
    {
        $data = [
            'title' => 'Home'
        ];

        return view('dashboard/home_dashboard', $data);
    }
    public function agenda()
    {
        $agendaRapat = new AgendaRapatModel();
        $data = [
            'title' => 'Agenda Rapat',
            'agenda' => $agendaRapat->findAll(),
        ];

        return view('dashboard/agenda_rapat', $data);
    }

    public function daftarPeserta(): string
    {
        $data = [
            'title' => 'Daftar Peserta Rapat'
        ];

        return view('dashboard/daftar_peserta', $data);
    }

    public function agendaKosong(): string
    {
        $data = [
            'title' => 'Agenda Kosong'
        ];

        return view('dashboard/agenda_kosong', $data);
    }
}
