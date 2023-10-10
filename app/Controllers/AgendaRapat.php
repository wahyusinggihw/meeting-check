<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AgendaRapatModel;
use Ramsey\Uuid\Uuid;
use Cocur\Slugify\Slugify;
use chillerlan\QRCode\{QRCode, QROptions};


class AgendaRapat extends BaseController
{
    protected $helpers = ['form'];
    protected $agendaRapat;
    public function __construct()
    {
        $this->agendaRapat = new AgendaRapatModel();
        helper('my_helper');
    }


    public function tambahAgenda()
    {


        $data = [
            'title' => 'Tambah Agenda Rapat',
            'validation' => \Config\Services::validation()
        ];

        return view('dashboard/tambah_agenda', $data);
    }

    public function view($slug)
    {
        $kodeRapat = $this->agendaRapat->where('slug', $slug)->first()['kode_rapat'];

        $data = [
            'title' => 'View Agenda Rapat',
            'qrCode' => generateQrCode($kodeRapat),
            'data' => $this->agendaRapat->where('slug', $slug)->first(),
        ];

        return view('dashboard/view_agenda', $data);
    }

    public function store()
    {
        $slugify = new Slugify();
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
            'id_agenda' => $uuid,
            'slug' => $slugify->slugify($this->request->getVar('judul_rapat')),
            'kode_rapat' => $kodeRapat,
            'judul_rapat' => $this->request->getVar('judul_rapat'),
            'tempat' => $this->request->getVar('tempat'),
            'tanggal' => $this->request->getVar('tanggal'),
            'jam' => $this->request->getVar('jam'),
            'agenda' => $this->request->getVar('agenda'),
            'link_rapat' => base_url() . '?kode_rapat=' . $kodeRapat,
        ]);


        // Save the link of the file in the database

        // generateQrCode($kodeRapat, base_url() . '?kode_rapat=' . $kodeRapat);

        session()->setFlashdata('Berhasil', 'Data berhasil ditambahkan.');
        return redirect('dashboard/agenda-rapat');
    }

    public function edit($slug)
    {
        $data = [
            'title' => 'Edit Agenda Rapat',
            'data' => $this->agendaRapat->where('slug', $slug)->first(),
            'validation' => \Config\Services::validation(),
        ];

        return view('dashboard/edit_agenda', $data);
    }

    public function update($id)
    {
        $slugify = new Slugify();
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
            'slug' => $slugify->slugify($this->request->getVar('judul_rapat')),
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
