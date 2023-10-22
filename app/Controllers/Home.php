<?php

namespace App\Controllers;

use App\Models\AgendaRapatModel;
use App\Models\PesertaRapatModel;

class Home extends BaseController
{
    protected $pesertaRapat;
    protected $helpers = ['form'];
    public function __construct()
    {
        $this->pesertaRapat = new PesertaRapatModel();
    }

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
        $instansi = $this->pesertaRapat->getInstansi();
        $instansiDecode = json_decode($instansi);

        if (!$this->validate([
            'inputAlphanumeric' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kode Rapat Harus Diisi',
                ]
            ]
        ])) {

            return view('home', ['validation' => $this->validator,]);
        }

        $rapat = $agendaRapat->select()->where('kode_rapat', $kode)->first();
        if ($rapat == null) {
            return redirect()->to('/')->with('error', 'Kode Rapat Tidak Ditemukan');
        } else {

            $expiredTime = expiredTime($rapat['tanggal'], $rapat['jam']);
            // dd($expiredTime);
            if ($expiredTime) {
                return redirect()->to('/')->with('error', 'Rapat Sudah Berakhir');
            }

            $data = [
                'title' => 'Submit Kode',
                'rapat' => $rapat,
                'kode_rapat' => $kode,
                'instansi' => $instansiDecode,
                'id_agenda' => $rapat['id_agenda'],

            ];

            // session();
            session()->setFlashdata('kode_valid', $kode);
            $this->session->set('id_agenda', $rapat['id_agenda']);
            // session()->set($data);
        }
        // return redirect('submit-kode/form-absensi');
        return view('form_absensi', $data);
    }
}
