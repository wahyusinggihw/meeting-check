<?php

namespace App\Controllers;

use App\Models\AgendaRapatModel;

class Home extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'Home'
        ];

        return view('home', $data);
    }

    public function submitKode()
    {
        session();
        $agendaRapat = new AgendaRapatModel();
        $kode = $this->request->getVar('inputAlphanumeric');
        $data = [
            'title' => 'Submit Kode',
            'data' => $agendaRapat->select()->where('kode_rapat', $kode)->first(),
            'kode_rapat' => $kode

        ];
        // d($data['data']);
        return view('peran', $data);
    }
}
