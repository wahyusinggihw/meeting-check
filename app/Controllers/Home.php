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

        return view('home', $data);
    }

    public function submitKode()
    {
        // session()->destroy();
        helper('my_helper');

        $dateNow = date('Y-m-d');
        $timeNow = date('H:i');

        $agendaRapat = new AgendaRapatModel();
        $kode = $this->request->getVar('inputAlphanumeric');

        if (!$this->validate([
            'inputAlphanumeric' => 'required'
        ])) {

            return view('home', ['validation' => $this->validator,]);
        }

        $rapat = $agendaRapat->select()->where('kode_rapat', $kode)->first();
        if ($rapat == null) {
            return redirect()->to('/')->with('error', 'Kode Rapat Tidak Ditemukan');
        } else {

            $expiredTime = expiredTime($rapat['jam']);
            if ($expiredTime < $timeNow) {
                return redirect()->to('/')->with('error', 'Rapat Sudah Berakhir');
            }

            $data = [
                'title' => 'Submit Kode',
                'rapat' => $rapat,
                'kode_rapat' => $kode,
                'id_agenda' => $rapat['id_agenda'],

            ];

            session();
            session()->setFlashdata('kode_valid', $kode);
            session()->set($data);
        }

        return view('peran', $data);
    }
}
