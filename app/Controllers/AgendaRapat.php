<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AgendaRapatModel;
use Ramsey\Uuid\Uuid;


class AgendaRapat extends BaseController
{
    public function tambahAgenda()
    {
        session();
        $data = [
            'title' => 'Tambah Agenda Rapat',
            'validation' => \Config\Services::validation()
        ];

        return view('/dashboard/tambah_agenda', $data);
    }

    public function store()
    {
        // helper(['form', 'url']);
        helper('my_helper');
        $kodeRapat = kodeRapat();
        $agendaRapat = new AgendaRapatModel();
        $uuid = Uuid::uuid4()->toString();

        if (!$this->validate([
            'judul_rapat' => 'required',
            'tempat' => 'required',
            'tanggal' => 'required',
            'jam' => 'required',
            'agenda' => 'required',

        ])) {
            // $validation = \Config\Services::validation();
            return view('dashboard/tambah_agenda', ['validation' => $this->validator,]);
        }

        $agendaRapat->insert([
            'id' => $uuid,
            'kode_rapat' => $kodeRapat,
            'judul_rapat' => $this->request->getVar('judul_rapat'),
            'tempat' => $this->request->getVar('tempat'),
            'tanggal' => $this->request->getVar('tanggal'),
            'jam' => $this->request->getVar('jam'),
            'agenda' => $this->request->getVar('agenda'),
            'link_rapat' => 'https://us02web.zoom.us/j/' . $kodeRapat
        ]);
        //flash data
        session()->setFlashdata('Berhasil', 'Data berhasil ditambahkan.');
        return redirect('dashboard/agenda-rapat');
    }

    public function edit($id)
    {
        $agendaRapat = new AgendaRapatModel();
        $data = $agendaRapat->find($id);

        return view('dashboard/edit_agenda', ['data' => $data]);
    }

    public function update($id)
    {
        $agendaRapat = new AgendaRapatModel();
        $data = $agendaRapat->find($id);
        // $id = $this->request->getPost('id');
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'judul_rapat' => 'required',
            'tempat' => 'required',
            'tanggal' => 'required',
            'agenda' => 'required',
        ]);

        $valid = $validation->withRequest($this->request)->run();

        if (!$valid) {
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to('/dashboard');
        } else {
            $agendaRapat->update([
                'id' => $data->id,
                'judul_rapat' => $this->request->getVar('judul_rapat'),
                'tempat' => $this->request->getVar('tempat'),
                'tanggal' => $this->request->getVar('tanggal'),
                'agenda' => $this->request->getVar('agenda'),
            ]);
            return redirect()->to('dashboard/agenda_rapat');
        }

        return redirect()->to('/dashboard/agenda_rapat');
    }
}
