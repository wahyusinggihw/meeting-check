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

    public function cariDaftarHadir($slug)
    {
        // dd($this->request->getVar('daftar_agenda'));
        $id_agenda = $this->agendaRapat->where('slug', $slug)->first()['id_agenda'];
        // $id_agenda = $this->request->getVar('daftar_agenda');

        $data = [
            'title' => 'Daftar Hadir',
            // 'data' => $this->daftarhadir->getDaftarHadirByID($id_agenda)
            'daftar_hadir' => $this->daftarhadir->getDaftarHadirByID($id_agenda),

        ];

        return view('dashboard/daftar_hadir', $data);
    }
}
