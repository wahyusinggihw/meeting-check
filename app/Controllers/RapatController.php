<?php

namespace App\Controllers;

use App\Models\DaftarHadirModel;
use App\Models\PesertaRapatModel;
use App\Models\PesertaUmumModel;
use App\Models\AgendaRapatModel;
use Cocur\Slugify\Slugify;
use PhpParser\Node\Expr\FuncCall;
use PhpParser\Node\Expr\Instanceof_;
use Ramsey\Uuid\Uuid;

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
        if ($this->request->is('post')) {
            $rules = $this->pesertaUmum->getValidationRules();
            $validate =  $this->validate($rules);

            if (!$validate) {
                return redirect()->back()->withInput();
            }
            // return 'ini post';
            $data = [
                'nama' => $this->request->getVar('nama'),
                'nohp' => $this->request->getVar('no_hp'),
                'instansi' => $this->request->getVar('asal_instansi'),
            ];
        } else {
            $instansi = $this->pesertaRapat->getInstansi();
            $instansiDecode = json_decode($instansi);

            $data = [
                'title' => 'Form Absensi',
                'instansi' => $instansiDecode,
            ];
            return view('form_pegawai', $data);
        }
    }

    // public function formTamu()
    // {

    //     if ($this->request->is('post')) {
    //     } else {

    //     }
    // }

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
        dd($data);

        $uuid = Uuid::uuid4()->toString();
        $uuid2 = Uuid::uuid4()->toString();
        $uuid4 = Uuid::uuid4()->toString();
        $rules = $this->pesertaUmum->getValidationRules();
        $validate =  $this->validate($rules);
        $kodeRapat = $this->request->getVar('kode_rapat');

        $userExist = $this->pesertaUmum->cekIfExist($this->request->getVar('nik'));
        $cekAbsen = $this->daftarHadir->where('NIK', $this->request->getVar('nik'))->first();

        // dd($userExist);
        $slugify = new Slugify();
        $slug = $slugify->slugify($kodeRapat);
        if (!$validate) {
            return redirect()->back()->withInput()->with('kode_valid', true);
        }
        if ($cekAbsen == null) {

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
                    'kode_rapat' => $slug,
                    'NIK' => $this->request->getVar('nik'),
                ]);
                $this->daftarHadir->insert([
                    'id_daftar_hadir' => $uuid2,
                    'slug' => $slug,
                    'kode_rapat' => $slug,
                    'NIK' => $this->request->getVar('nik'),
                    'nama' => $this->request->getVar('nama'),
                    'asal_instansi' => $this->request->getVar('asal_instansi'),
                    'ttd' => 'ttd'
                ]);

                session()->setFlashdata('berhasil', true);
                // session()->destroy('kode_valid');
                return redirect('berhasil')->with('kode_valid', true);
            }
            // return 'ada';
            $this->daftarHadir->insert([
                'id_daftar_hadir' => $uuid2,
                'slug' => $slug,
                'kode_rapat' => $slug,
                'NIK' => $this->request->getVar('nik'),
                'nama' => $this->request->getVar('nama'),
                'asal_instansi' => $this->request->getVar('asal_instansi'),
                'ttd' => 'ttd'
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
