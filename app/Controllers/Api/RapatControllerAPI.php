<?php

namespace App\Controllers\Api;

use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;
use App\Models\PesertaRapatModel;
use App\Models\DaftarHadirModel;
use App\Models\AgendaRapatModel;
use Ramsey\Uuid\Uuid;
use Cocur\Slugify\Slugify;



class RapatControllerAPI extends ResourceController
{
    use ResponseTrait;
    protected $helpers = ['form'];
    protected $pesertaRapat;
    protected $daftarHadir;
    protected $instansiAPI;
    protected $agendaRapat;
    public function __construct()
    {
        $this->instansiAPI = new PesertaRapatModel();
        $this->daftarHadir = new DaftarHadirModel();
        $this->agendaRapat = new AgendaRapatModel();
    }

    public function create()
    {
        // $data = $this->request->getPost();
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
        $uuid2 = Uuid::uuid4()->toString();
        $slugify = new Slugify();
        $kodeRapat = $this->request->getVar('kode_rapat');
        $id_agenda = $this->agendaRapat->getAgendaRapatByKode($kodeRapat);
        $validate =  $this->validate($rules);

        if (!$validate) {
            return $this->failValidationErrors($this->validator->getErrors());
        }
        $slug = $slugify->slugify($kodeRapat);

        $cekAbsen = $this->daftarHadir->sudahAbsenAPI($this->request->getVar('nip'), $id_agenda['id_agenda']);
        if (!$cekAbsen) {
            $this->daftarHadir->insert([
                'id_daftar_hadir' => $uuid2,
                'slug' => $slug,
                'id_agenda_rapat' => $id_agenda['id_agenda'],
                'NIK' => $this->request->getVar('nip'),
                'nama' => $this->request->getVar('nama'),
                'asal_instansi' => $this->request->getVar('asal_instansi'),
                'ttd' => 'ttd',
                'created_at' => date('Y-m-d H:i:s')
            ]);

            $response = [
                'status' => true,
                'message' => 'Berhasil melakukan absen.'
            ];
            return $this->respond($response);
        } else {
            $response = [
                'status' => true,
                'message' => 'Anda sudah melakukan absen.'
            ];
            return $this->respond($response);
        }
    }
}
