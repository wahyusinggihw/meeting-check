<?php

namespace App\Controllers;

use App\Models\DaftarHadirModel;
use App\Models\PesertaRapatModel;
use App\Models\PesertaUmumModel;
use PhpParser\Node\Expr\Instanceof_;
use Ramsey\Uuid\Uuid;

class RapatController extends BaseController
{
    protected $helpers = ['form'];
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

    public function formTamu()
    {

        if ($this->request->is('post')) {

            $uuid = Uuid::uuid4()->toString();
            $rules = $this->pesertaUmum->getValidationRules();
            $validate =  $this->validate($rules);

            if (!$validate) {
                return redirect()->back()->withInput();
            }
            $userExist = $this->pesertaUmum->cekIfExist($this->request->getVar('nik'));
            // dd($cek);

            $this->pesertaUmum->save([
                'id_peserta_umum' => $uuid,
                'nik' => $this->request->getVar('nik'),
                'nama' => $this->request->getVar('nama'),
                'alamat' => $this->request->getVar('alamat'),
                'no_hp' => $this->request->getVar('no_hp'),
                'asal_instansi' => $this->request->getVar('asal_instansi'),
            ]);

            $this->pesertaRapat->save([
                'id_peserta_rapat' => Uuid::uuid4()->toString(),
                'id_peserta_umum' => $uuid,
                'id_agenda' => $this->request->getVar('id_agenda'),
                'peran' => 'tamu',
            ]);

            $this->daftarHadir->insert([
                'id_daftar_hadir' => Uuid::uuid4()->toString(),
                'id_peserta_umum' => $uuid,
                'id_peserta_rapat' => $this->request->getVar('id_peserta_rapat'),
                'tanda_tangan' => $this->request->getVar('tanda_tangan'),
            ]);



            session()->setFlashdata('berhasil', true);

            return redirect('berhasil');
        } else {
            $data = [
                'title' => 'Form Absensi',
                'validation' => \Config\Services::validation()
            ];

            return view('form_tamu', $data);
        }
    }
}
