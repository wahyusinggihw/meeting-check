<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
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
        helper('my_helper');
    }

    public function index()
    {
        $agendaRapat = $this->agendaRapat->getAllAgenda();
        $belumBerjalan = $this->agendaRapat->getAgendaByStatus('belum-berjalan');
        $selesai = $this->agendaRapat->getAgendaByStatus('selesai');
        // count
        $count = count($agendaRapat);
        $data = [
            'title' => 'Home',
            'active' => 'home',
            'agenda' => $agendaRapat,
            'totalagenda' => count($agendaRapat),
            'totalAgendaBelumBerjalan' => count($belumBerjalan),
            'totalAgendaSelesai' => count($selesai),
        ];

        return view('dashboard/home_dashboard', $data);
    }
    public function agenda()
    {
        $data = [
            'title' => 'Agenda Rapat',
            'active' => 'agenda',
            'agenda' => $this->agendaRapat->getAgendaByRole2(),
        ];

        return view('dashboard/agenda_rapat', $data);
    }

    public function daftarHadir()
    {
        $id_agenda = $this->request->getVar('daftar_agenda');

        $data = [
            'title' => 'Daftar Peserta Rapat',
            'active' => 'daftar_hadir',
            'agenda_rapat' => $this->agendaRapat->getAgendaRapatByID(),
            'daftar_hadir' => $this->daftarhadir->getDaftarHadirByID($id_agenda)
        ];
        // dd($data['daftar_hadir']);

        return view('dashboard/daftar_hadir', $data);
    }
}
