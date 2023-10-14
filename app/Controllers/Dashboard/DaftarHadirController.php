<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use App\Models\DaftarHadirModel;
use App\Models\AgendaRapatModel;

class DaftarHadirController extends BaseController
{
    protected $daftarhadir;
    protected $agendaRapat;
    public function __construct()
    {
        $this->daftarhadir = new DaftarHadirModel();
        $this->agendaRapat = new AgendaRapatModel();
    }
    public function index()
    {

        $data = [
            'title' => 'Daftar Hadir',
            'data' => $this->daftarhadir->getDaftarHadir()

        ];
        return view('dashboard/daftar_hadir', $data);
    }

    public function cariDaftarHadir()
    {
        // dd($this->request->getVar('daftar_agenda'));
        $id_agenda = $this->request->getVar('daftar_agenda');

        $data = [
            'title' => 'Daftar Hadir',
            // 'data' => $this->daftarhadir->getDaftarHadirByID($id_agenda)
            'agenda_rapat' => $this->agendaRapat->getAgendaRapatByID(),
            'daftar_hadir' => $this->daftarhadir->getDaftarHadirByID($id_agenda),
            'pager' => $this->daftarhadir->pager,

        ];

        return view('dashboard/daftar_hadir', $data);
    }
}
