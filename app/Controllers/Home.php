<?php

namespace App\Controllers;

use App\Models\AgendaRapatModel;

class Home extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'Home',
            'validation' => \Config\Services::validation()
        ];
        // d($data['validation']);

        return view('home', $data);
    }

    public function submitKode()
    {
        $agendaRapat = new AgendaRapatModel();
        $kode = $this->request->getVar('inputAlphanumeric');

        if ($this->validate([
            'inputAlphanumeric' => 'required'
        ])) {
            $data = [
                'title' => 'Submit Kode',
                'data' => $agendaRapat->select()->where('kode_rapat', $kode)->first(),
                'kode_rapat' => $kode

            ];
            return view('peran', $data);
        } else {
            return view('home', ['validation' => $this->validator,]);
        }
        // d($data['data']);
        // return view('peran', $data);
    }
}
