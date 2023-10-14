<?php

namespace App\Controllers;

use Ramsey\Uuid\Uuid;
use Cocur\Slugify\Slugify;
use App\Models\AgendaRapatModel;
use App\Models\DaftarHadirModel;
use App\Models\PesertaUmumModel;
use App\Models\PesertaRapatModel;
use PhpParser\Node\Expr\FuncCall;
use PhpParser\Node\Expr\Instanceof_;

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

    public function peran(): string
    {
        $data = [
            'title' => 'Pemilihan Peran'
        ];

        return view('peran', $data);
    }

    public function berhasil()
    {
        $data = [
            'title' => 'Behasil'
        ];
        return view('berhasil', $data);
    }

    public function gagal()
    {
        $data = [
            'title' => 'Gagal'
        ];
        return view('gagal', $data);
    }

    public function search()
    {
        $nik = $this->request->getVar('nik');
        $cek = $this->pesertaUmum->cekIfExist($nik);
        $data = [
            'title' => 'Search',
            'data' => $cek
        ];
        return view('search', $data);
    }

    public function formPegawai()
    {
        $instansi = $this->pesertaRapat->getInstansi();
        $instansiDecode = json_decode($instansi);

        $data = [
            'title' => 'Form Absensi',
            'instansi' => $instansiDecode,
        ];

        return view('form_pegawai', $data);
    }

    public function pegawaiStore()
    {
        $rules = [
            'nip' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'NIK harus diisi',
                    'numeric' => 'NIK harus berupa angka'
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

        // return 'ini post';
        // $data = [
        //     'nip' => $this->request->getVar('nip'),
        //     'no_hp' => $this->request->getVar('no_hp'),
        //     'nama' => $this->request->getVar('nama'),
        //     'alamat' => $this->request->getVar('alamat'),
        //     'instansi' => $this->request->getVar('asal_instansi'),
        //     'signature' => $this->request->getVar('signatureData'),
        // ];

        $uuid2 = Uuid::uuid4()->toString();
        $kodeRapat = $this->request->getVar('kode_rapat');
        $validate =  $this->validate($rules);
        $slugify = new Slugify();
        $slug = $slugify->slugify($kodeRapat);

        if (!$validate) {
            return redirect()->back()->withInput()->with('kode_valid', true);
        }
        $idAgenda = session()->get('id_agenda');
        $cekAbsen = $this->daftarHadir->sudahAbsen($this->request->getVar('nip'));
        if (!$cekAbsen) {
            // return 'ada';
            $this->daftarHadir->insert([
                'id_daftar_hadir' => $uuid2,
                'slug' => $slug,
                'id_agenda_rapat' => $idAgenda,
                'NIK' => $this->request->getVar('nip'),
                'nama' => $this->request->getVar('nama'),
                'asal_instansi' => $this->request->getVar('asal_instansi'),
                'ttd' => 'ttd',
                'created_at' => date('Y-m-d H:i:s')
            ]);
        } else {
            // session()->setFlashdata('gagal', true);
            return redirect('/')->with('error', 'Anda sudah melakukan absensi!');
        }

        session()->setFlashdata('berhasil', true);
        // session()->destroy('kode_valid');
        return redirect('berhasil')->with('kode_valid', true);
    }


    public function formTamu()
    {
        $data = [
            'title' => 'Form Absensi',
            'validation' => \Config\Services::validation()
        ];

        return view('form_tamu', $data);
    }

    public function tamuStore()
    {

        $data = [
            'nik' => $this->request->getVar('nik'),
            'no_hp' => $this->request->getVar('no_hp'),
            'nama' => $this->request->getVar('nama'),
            'alamat' => $this->request->getVar('alamat'),
            'asal_instansi' => $this->request->getVar('asal_instansi'),
            'signature' => $this->request->getVar('signatureData'),
        ];
        // dd($data);
        // $cekAbsen = $this->daftarHadir->where('NIK', $this->request->getVar('nik'))->first();
        // // dd($cekAbsen['id_agenda_rapat']);
        // // dd(session()->get('id_agenda'));
        // if ($cekAbsen['id_agenda_rapat'] == session()->get('id_agenda')) {
        //     return 'sudah absen';
        //     // return redirect('/')->with('error', 'Anda sudah melakukan absensi!');
        // } else {
        //     return 'belom';
        // }
        // die;

        $uuid = Uuid::uuid4()->toString();
        $uuid2 = Uuid::uuid4()->toString();
        $uuid4 = Uuid::uuid4()->toString();
        $rules = $this->pesertaUmum->getValidationRules();
        $validate =  $this->validate($rules);
        $kodeRapat = $this->request->getVar('kode_rapat');

        $userExist = $this->pesertaUmum->cekIfExist($this->request->getVar('nik'));


        // dd($userExist);
        $slugify = new Slugify();
        $slug = $slugify->slugify($kodeRapat);
        if (!$validate) {
            return redirect()->back()->withInput()->with('kode_valid', true);
        }
        $idAgenda = session()->get('id_agenda');
        $cekAbsen = $this->daftarHadir->sudahAbsen($this->request->getVar('nik'));
        if (!$cekAbsen) {

            if ($userExist == null) {
                // return 'tidak ada';
                $this->pesertaUmum->insert([
                    'id_peserta_umum' => $uuid,
                    'slug' => $slugify->slugify($this->request->getVar('nama')),
                    'nik' => $this->request->getVar('nik'),
                    'nama' => $this->request->getVar('nama'),
                    'alamat' => $this->request->getVar('alamat'),
                    'no_hp' => $this->request->getVar('no_hp'),
                    'asal_instansi' => $this->request->getVar('asal_instansi'),
                ]);
                $this->pesertaRapat->insert([
                    'id_peserta_rapat' => $uuid,
                    'slug' => $slugify->slugify($this->request->getVar('nama')),
                    'id_agenda_rapat' => $idAgenda,
                    'NIK' => $this->request->getVar('nik'),
                ]);
                $this->daftarHadir->insert([
                    'id_daftar_hadir' => $uuid2,
                    'slug' => $slug,
                    'id_agenda_rapat' => $idAgenda,
                    'NIK' => $this->request->getVar('nik'),
                    'nama' => $this->request->getVar('nama'),
                    'asal_instansi' => $this->request->getVar('asal_instansi'),
                    'ttd' => 'ttd',
                    'created_at' => date('Y-m-d H:i:s')
                ]);

                session()->setFlashdata('berhasil', true);
                // session()->destroy('kode_valid');
                return redirect('berhasil')->with('kode_valid', true);
            }
            // return 'ada';
            $this->daftarHadir->insert([
                'id_daftar_hadir' => $uuid2,
                'slug' => $slug,
                'id_agenda_rapat' => $idAgenda,
                'NIK' => $this->request->getVar('nik'),
                'nama' => $this->request->getVar('nama'),
                'asal_instansi' => $this->request->getVar('asal_instansi'),
                'ttd' => 'ttd',
                'created_at' => date('Y-m-d H:i:s')
            ]);
        } else {
            // session()->setFlashdata('gagal', true);
            return redirect('/')->with('error', 'Anda sudah melakukan absensi!');
        }


        session()->setFlashdata('berhasil', true);
        // session()->destroy('kode_valid');
        return redirect('berhasil')->with('kode_valid', true);
    }
}
