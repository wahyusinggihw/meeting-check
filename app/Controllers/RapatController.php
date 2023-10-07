<?php

namespace App\Controllers;

use App\Models\DaftarHadirModel;
use App\Models\PesertaRapatModel;
use App\Models\PesertaUmumModel;
use PhpParser\Node\Expr\Instanceof_;
use Ramsey\Uuid\Uuid;

class RapatController extends BaseController
{
    protected $pesertaRapat;
    protected $pesertaUmum;
    protected $daftarHadir;
    public function __construct()
    {
        $this->pesertaRapat = new PesertaRapatModel();
        $this->pesertaUmum = new PesertaUmumModel();
        $this->daftarHadir = new DaftarHadirModel();
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

    public function formPegawai()
    {
        $instansi = $this->pesertaRapat->getInstansi();
        $instansiDecode = json_decode($instansi);
        // dd($instansiDecode);

        $data = [
            'title' => 'Form Absensi',
            'instansi' => $instansiDecode,
        ];



        return view('form_pegawai2', $data);
    }

    public function formPegawaiStore()
    {

        $data = [
            'nama' => $this->request->getVar('nama'),
            'nohp' => $this->request->getVar('nohp'),
            'instansi' => $this->request->getVar('selectInstansi')
        ];

        dd($data);
    }

    public function formTamu()
    {
        $data = [
            'title' => 'Form Absensi',
            'validation' => \Config\Services::validation()
        ];

        return view('form_tamu2', $data);
    }

    public function formTamuStore()
    {
        $uuid = Uuid::uuid4()->toString();

        // dd($this->request->getVar('nik'));
        if (!$this->validate([
            'nik' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'asal_instansi' => 'required',

        ])) {
            $validation = \Config\Services::validation();
            // return redirect()->to('dashboard/tambah-agenda')->withInput()->with('validation', $validation);
            return view('form_tamu2', ['validation' => $this->validator,]);
        }

        $this->pesertaUmum->insert([
            'id_peserta_umum' => $uuid,
            'nik' => $this->request->getVar('nik'),
            'nama' => $this->request->getVar('nama'),
            'alamat' => $this->request->getVar('alamat'),
            'no_hp' => $this->request->getVar('no_hp'),
            'asal_instansi' => $this->request->getVar('asal_instansi'),
        ]);
        session()->setFlashdata('berhasil', true);

        $data = [
            'berhasil' => true
        ];

        return redirect('/', $data);
    }

    public function store()
    {
        $input = $this->request->getPost();
        if ($input = $this->request->getPost()) {
            d($input);
        }
    }
}
