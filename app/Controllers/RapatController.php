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

    public function gagal()
    {
        $data = [
            'title' => 'Gagal'
        ];
        return view('gagal', $data);
    }

    public function formPegawai()
    {
        $instansi = $this->pesertaRapat->getInstansi();
        $instansiDecode = json_decode($instansi);
        $validationRules = $this->pesertaRapat->getValidationRules();
        // dd($instansiDecode);

        $data = [
            'title' => 'Form Absensi',
            'instansi' => $instansiDecode,
        ];



        return view('form_pegawai', $data);
    }

    public function formPegawaiStore()
    {

        $data = [
            'nama' => $this->request->getVar('nama'),
            'nohp' => $this->request->getVar('no_hp'),
            'instansi' => $this->request->getVar('asal_instansi'),
        ];

        dd($data);
    }

    public function formTamu()
    {
        $data = [
            'title' => 'Form Absensi',
            'validation' => \Config\Services::validation()
        ];

        return view('form_tamu', $data);
    }

    public function formTamuStore()
    {
        $uuid = Uuid::uuid4()->toString();

        // dd($this->request->getVar('nik'));
        if (!$this->validate($this->pesertaUmum->getValidationRules())) {
            $validation = \Config\Services::validation();
            // return redirect('submit-kode/form-absensi/tamu')->withInput()->with('validation', $validation);
            return view('form_tamu', ['validation' => $this->validator]);
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

        return redirect('/berhasil', $data);
    }

    public function store()
    {
        $input = $this->request->getPost();
        if ($input = $this->request->getPost()) {
            d($input);
        }
    }
}
