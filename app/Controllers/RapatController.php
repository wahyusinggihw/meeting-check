<?php

namespace App\Controllers;

use Ramsey\Uuid\Uuid;
use Cocur\Slugify\Slugify;
use App\Models\AgendaRapatModel;
use App\Models\DaftarHadirModel;
use App\Models\PesertaUmumModel;
use App\Models\PesertaRapatModel;

class RapatController extends BaseController
{
    protected $helpers = ['form'];
    protected $pesertaRapat;
    protected $pesertaUmum;
    protected $daftarHadir;
    protected $agendaRapat;
    public function __construct()
    {
        $this->pesertaRapat = new PesertaRapatModel();
        $this->pesertaUmum = new PesertaUmumModel();
        $this->daftarHadir = new DaftarHadirModel();
        $this->agendaRapat = new AgendaRapatModel();
    }


    public function berhasil()
    {
        $data = [
            'title' => 'Behasil'
        ];
        return view('berhasil', $data);
    }

    public function formAbsensi()
    {
        $instansi = $this->pesertaRapat->getInstansi(); // Akan diganti dengan api pegawai
        $instansiDecode = json_decode($instansi);

        $data = [
            'title' => 'Form Absensi',
            'instansi' => $instansiDecode,
        ];

        return view('form_absensi', $data);
    }

    protected function handleAbsen($idAgenda, $nip, $statusUser)
    {
        $uuid = Uuid::uuid4()->toString();
        $uuid2 = Uuid::uuid4()->toString();
        $kodeRapat = $this->request->getVar('kode_rapat');
        $slugify = new Slugify();
        $slug = $slugify->slugify($kodeRapat);

        // Handle the absen logic here
        $userExist = $this->pesertaUmum->cekIfExist($nip);
        if ($userExist == null && $statusUser == 'tamu') {
            $dataPesertaUmum = [
                'id_peserta_umum' => $uuid,
                'slug' => $slugify->slugify($this->request->getVar('nama')),
                'nik' => $this->request->getVar('nip'),
                'nama' => $this->request->getVar('nama'),
                'alamat' => $this->request->getVar('alamat'),
                'no_hp' => $this->request->getVar('no_hp'),
                'asal_instansi' => $this->request->getVar('asal_instansi'),
            ];

            $dataPesertaRapat = [
                'id_peserta_rapat' => $uuid,
                'slug' => $slugify->slugify($this->request->getVar('nama')),
                'id_agenda_rapat' => $idAgenda,
                'NIK' => $this->request->getVar('nip'),
            ];

            $dataDaftarHadir = [
                'id_daftar_hadir' => $uuid2,
                'slug' => $slug,
                'id_agenda_rapat' => $idAgenda,
                'NIK' => $this->request->getVar('nip'),
                'nama' => $this->request->getVar('nama'),
                'asal_instansi' => $this->request->getVar('asal_instansi'),
                'ttd' => 'ttd',
                'created_at' => date('Y-m-d H:i:s')
            ];


            $this->pesertaUmum->insertPesertaUmum($dataPesertaUmum);
            $this->pesertaRapat->insertPesertaRapat($dataPesertaRapat);
            $this->daftarHadir->insertDaftarHadir($dataDaftarHadir);

            session()->setFlashdata('berhasil', true);
            // session()->destroy('kode_valid');
            return redirect('berhasil')->with('kode_valid', true);
        } else {
            $dataDaftarHadir = [
                'id_daftar_hadir' => $uuid2,
                'slug' => $slug,
                'id_agenda_rapat' => $idAgenda,
                'NIK' => $this->request->getVar('nip'),
                'nama' => $this->request->getVar('nama'),
                'asal_instansi' => $this->request->getVar('asal_instansi'),
                'ttd' => 'ttd',
                'created_at' => date('Y-m-d H:i:s')
            ];
            $this->daftarHadir->insertDaftarHadir($dataDaftarHadir);
        }
    }


    public function absenStore()
    {
        $validate = $this->validateForm();
        $idAgenda = $this->session->get('id_agenda');
        $statusUser = $this->request->getVar('statusRadio');

        if (!$validate) {
            return redirect()->back()->withInput()->with('kode_valid', true);
        }
        $idAgenda = $this->session->get('id_agenda');
        $nip = $this->request->getVar('nip');

        if (!$this->daftarHadir->sudahAbsen($nip)) {

            $statusUser = $this->request->getVar('statusRadio');

            $this->handleAbsen($idAgenda, $nip, $statusUser);

            $this->session->remove('id_agenda');
            session()->setFlashdata('berhasil', true);
            return redirect('berhasil')->with('kode_valid', true);
        } else {
            return redirect('/')->with('error', 'Anda sudah melakukan absensi!');
        }
    }

    protected function validateForm()
    {
        $rules = [
            'nip' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Data harus diisi',
                    'numeric' => 'Data harus berupa angka'
                ]
            ],
            'no_hp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'No HP harus diisi',
                    'numeric' => 'No HP harus berupa angka'
                ]
            ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama harus diisi'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat harus diisi'
                ]
            ],
            'asal_instansi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih instansi terlebih dahulu'
                ]
            ],
            'signatureData' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanda tangan harus diisi'
                ]
            ]
        ];

        return $this->validate($rules);
    }
}
