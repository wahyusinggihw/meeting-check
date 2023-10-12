<?php

namespace App\Controllers;

use App\Models\AgendaRapatModel;
use App\Models\DaftarHadirModel;

class Dashboard extends BaseController
{
    protected $agendaRapat;
    protected $daftarhadir;
    public function __construct()
    {
        $this->agendaRapat = new AgendaRapatModel();
        $this->daftarhadir = new DaftarHadirModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Home'
        ];

        return view('dashboard/home_dashboard', $data);
    }
    public function agenda()
    {
        $data = [
            'title' => 'Agenda Rapat',
            'agenda' => $this->agendaRapat->getAgendaByRole(),
            'pager' => $this->agendaRapat->pager
        ];

        return view('dashboard/agenda_rapat', $data);
    }

    public function daftarHadir()
    {
        $data = [
            'title' => 'Daftar Peserta Rapat',
            'data' => $this->daftarhadir->getDaftarHadir()
        ];
        // dd($data);

        return view('dashboard/daftar_peserta', $data);
    }
}
