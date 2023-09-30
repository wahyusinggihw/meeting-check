<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AgendaRapatModel;
use Ramsey\Uuid\Uuid;


class AgendaRapat extends BaseController
{
    protected $agendaRapat;
    public function __construct()
    {
        $this->agendaRapat = new AgendaRapatModel();
    }

    public function tambahAgenda()
    {

        $data = [
            'title' => 'Tambah Agenda Rapat',
            'validation' => \Config\Services::validation()
        ];

        return view('dashboard/tambah_agenda', $data);
    }

    public function store()
    {
        // helper(['form', 'url']);
        helper('my_helper');
        $kodeRapat = kodeRapat();
        $uuid = Uuid::uuid4()->toString();

        if (!$this->validate([
            'judul_rapat' => 'required',
            'tempat' => 'required',
            'tanggal' => 'required',
            'jam' => 'required',
            'agenda' => 'required',

        ])) {
            $validation = \Config\Services::validation();
            // return redirect()->to('dashboard/tambah-agenda')->withInput()->with('validation', $validation);
            return view('dashboard/tambah_agenda', ['validation' => $this->validator,]);
        }

        $this->agendaRapat->insert([
            'id' => $uuid,
            'kode_rapat' => $kodeRapat,
            'judul_rapat' => $this->request->getVar('judul_rapat'),
            'tempat' => $this->request->getVar('tempat'),
            'tanggal' => $this->request->getVar('tanggal'),
            'jam' => $this->request->getVar('jam'),
            'agenda' => $this->request->getVar('agenda'),
            'link_rapat' => 'https://meeting-check/?kode_rapat=' . $kodeRapat
        ]);
        //flash data
        session()->setFlashdata('Berhasil', 'Data berhasil ditambahkan.');
        return redirect('dashboard/agenda-rapat');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Agenda Rapat',
            'data' => $this->agendaRapat->find($id),
            'validation' => \Config\Services::validation(),
        ];

        return view('dashboard/edit_agenda', $data);
    }

    public function update($id)
    {
        // $id = $this->agendaRapat->find($id);
        // $id = $this->request->getPost('id');
        if (!$this->validate([
            'judul_rapat' => 'required',
            'tempat' => 'required',
            'tanggal' => 'required',
            'jam' => 'required',
            'agenda' => 'required',

        ])) {
            $validation = \Config\Services::validation();
            // return redirect()->to('dashboard/tambah-agenda')->withInput()->with('validation', $validation);
            return view('dashboard/edit_agenda', [
                'data' => $this->agendaRapat->find($id),
                'validation' => $this->validator,
            ]);
        }
        $this->agendaRapat->update($id, [
            'judul_rapat' => $this->request->getVar('judul_rapat'),
            'tempat' => $this->request->getVar('tempat'),
            'tanggal' => $this->request->getVar('tanggal'),
            'jam' => $this->request->getVar('jam'),
            'agenda' => $this->request->getVar('agenda'),
        ]);
        return redirect()->to('dashboard/agenda-rapat');
    }

    public function delete($id)
    {
        $query = $this->agendaRapat->find($id);
        if ($query) {
            $this->agendaRapat->delete($id);
            return redirect()->to('/dashboard/agenda-rapat');
        }
    }
}
