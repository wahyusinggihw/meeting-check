<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
// use CodeIgniter\RESTful\ResourceController;
use App\Models\PesertaRapatModel;
use App\Models\DaftarHadirModel;
use App\Models\AgendaRapatModel;
use Ramsey\Uuid\Uuid;
use Cocur\Slugify\Slugify;



class RapatControllerAPI extends BaseController
{
    use ResponseTrait;
    protected $helpers = ['form'];
    protected $daftarHadir;
    protected $instansiAPI; // Akan diganti dengan api pegawai
    protected $agendaRapat;
    public function __construct()
    {
        $this->instansiAPI = new PesertaRapatModel();
        $this->daftarHadir = new DaftarHadirModel();
        $this->agendaRapat = new AgendaRapatModel();
    }

    protected function  validateForm()
    {
        $rules = [
            'kode_rapat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kode rapat harus diisi',
                ]
            ],
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

        return $this->validate($rules);
    }

    public function absenStore()
    {
        helper('my_helper');

        $kodeRapat = $this->request->getVar('kode_rapat');
        $idRapat = $this->agendaRapat->getAgendaRapatByKode($kodeRapat);

        $validate = $this->validateForm();

        if (!$validate) {
            return $this->response(false, 'Validasi gagal', $this->validator->getErrors());
        }

        $slug = (new Slugify())->slugify($kodeRapat);
        $currentTime = date('H:i');

        $detailRapat = $this->agendaRapat->select()->where('kode_rapat', $kodeRapat)->first();

        if ($detailRapat == null) {
            return $this->response(false, 'Kode rapat tidak ditemukan.');
        }

        $expirationTime = expiredTime($detailRapat['jam']);

        if ($expirationTime < $currentTime) {
            return $this->response(false, 'Rapat kadaluarsa');
        }

        $riwayatKehadiran = $this->daftarHadir->sudahAbsenAPI($this->request->getVar('nip'), $idRapat['id_agenda']);

        if (!$riwayatKehadiran) {
            $dataDaftarHadir = [
                'id_daftar_hadir' => Uuid::uuid4()->toString(),
                'slug' => $slug,
                'id_agenda_rapat' => $idRapat['id_agenda'],
                'NIK' => $this->request->getVar('nip'),
                'nama' => $this->request->getVar('nama'),
                'asal_instansi' => $this->request->getVar('asal_instansi'),
                'ttd' => 'ttd',
                'created_at' => date('Y-m-d H:i:s')
            ];

            $this->daftarHadir->insertDaftarHadir($dataDaftarHadir);
            return $this->response(true, 'Berhasil melakukan absen.');
        } else {
            return $this->response(true, 'Anda sudah melakukan absen.');
        }
    }

    protected function response($status, $message, $data = [])
    {
        $response = [
            'status' => $status,
            'message' => $message,
            'data' => $data
        ];

        return $this->respond($response, 200);
    }
}
