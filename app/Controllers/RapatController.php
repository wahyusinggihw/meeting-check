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
        helper('my_helper');
        $instansi = $this->pesertaRapat->getInstansi();
        $instansiDecode = json_decode($instansi);

        $idAgenda = $this->session->get('id_agenda');

        $url = current_url();

        if ($url == site_url('submit-kode/form-absensi')) {
            $idAgenda = $this->session->get('id_agenda');
        } elseif (strpos($url, site_url('submit-kode/form-absensi/qr/')) === 0) {
            $idAgenda = $this->request->getUri()->getSegment(4);
            $rapat = $this->agendaRapat->select()->where('id_agenda', $idAgenda)->first();
            $expiredTime = expiredTime($rapat['tanggal'], $rapat['jam']);
            // dd($expiredTime);
            if ($expiredTime) {
                return redirect()->to('/')->with('error', 'Rapat Sudah Berakhir');
            }
        } else {
            // Handle the case where the URL doesn't match either pattern
            return redirect()->to('/');
        }

        $rapat = $this->agendaRapat->getAgendaRapatByField($idAgenda);
        session()->setFlashdata('kode_valid', $rapat['kode_rapat']);
        $this->session->set('id_agenda', $rapat['id_agenda']);
        $data = [
            'title' => 'Form Absensi',
            'instansi' => $instansiDecode,
            'rapat' => $rapat,
        ];

        return view('form_absensi', $data);
    }

    public function saveSignature($kodeRapat)
    {
        helper('filesystem');

        $signatureData = $this->request->getPost('signatureData');

        // Validate and process the uploaded data (convert Data URL to image file)

        // Get the writable path from the configuration
        $writablePath = WRITEPATH . 'uploads/signatures/';

        // Create a unique file name, e.g., using a timestamp
        $fileName = 'signature_' . $kodeRapat . time() . '.png';

        if (!is_dir($writablePath)) {
            mkdir($writablePath, 0777);
        }

        // Save the file to the writable directory
        if (write_file($writablePath . $fileName, base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $signatureData)))) {
            // Move the file to the public folder
            $publicPath = FCPATH . 'uploads/signatures/';
            if (!is_dir($publicPath)) {
                mkdir($publicPath, 0777, true);
            }

            rename($writablePath . $fileName, $publicPath . $fileName);

            // Respond with a success message or other data
            $response = [
                'status' => 'success',
                'message' => 'Tanda tangan berhasil disimpan.',
                'publicPath' => base_url('uploads/signatures/' . $fileName)
            ];

            return $this->response->setJSON($response);
        } else {
            // Handle the error if the file couldn't be saved
            return $this->response->setJSON(['message' => 'Failed to save the signature.']);
        }
    }


    protected function handleAbsen($idAgenda, $nip, $statusUser)
    {
        $uuid = Uuid::uuid4()->toString();
        $uuid2 = Uuid::uuid4()->toString();
        $kodeRapat = $this->request->getVar('kode_rapat');
        $slugify = new Slugify();
        $slug = $slugify->slugify($kodeRapat);

        $saveTandaTangan = $this->saveSignature($kodeRapat)->getBody();
        $tandaTanganDecode = json_decode($saveTandaTangan, true);
        $tandaTangan = $tandaTanganDecode['publicPath'];

        $dataDaftarHadir = [
            'id_daftar_hadir' => $uuid2,
            'slug' => $slug,
            'id_agenda_rapat' => $idAgenda,
            'NIK' => $this->request->getVar('nip'),
            'nama' => $this->request->getVar('nama'),
            'asal_instansi' => $this->request->getVar('asal_instansi'),
            'ttd' => $tandaTangan,
            'created_at' => date('Y-m-d H:i:s')
        ];

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

            $this->pesertaUmum->insertPesertaUmum($dataPesertaUmum);
            $this->pesertaRapat->insertPesertaRapat($dataPesertaRapat);
            $this->daftarHadir->insertDaftarHadir($dataDaftarHadir);

            session()->setFlashdata('berhasil', true);
            // session()->destroy('kode_valid');
            return redirect('berhasil')->with('kode_valid', true);
        } else {
            // insert ke daftar hadir jika peserta sudah ada di database / peserta adalah pegawai
            $this->daftarHadir->insertDaftarHadir($dataDaftarHadir);
        }
    }


    public function absenStore()
    {
        // dd($this->request->getVar('g-recaptcha-response'));
        // dd($this->request->getPost());
        // $tandaTangan = $this->request->getVar('signatureData');
        // $tandaTangan = $this->saveSignature()->getBody();
        // $tandaTangan = json_decode($tandaTangan, true);
        // dd();
        helper('my_helper');

        $validate = $this->validateForm();
        $idAgenda = $this->session->get('id_agenda');
        $statusUser = $this->request->getVar('statusRadio');
        $token = $this->request->getVar('g-recaptcha-response');
        $validateCaptcha  = verifyCaptcha($token);
        // dd($validateCaptcha);
        if (!$validateCaptcha->success) {
            $this->session->setFlashdata('error', 'Terdapat aktifitas tidak wajar, mohon coba lagi.');
            return redirect()->back()->withInput()->with('kode_valid', true);
        }

        if (!$validate) {
            return redirect()->back()->withInput()->with('kode_valid', true);
        }

        $idAgenda = $this->session->get('id_agenda');
        $nip = $this->request->getVar('nip');

        if (!$this->daftarHadir->sudahAbsen($nip)) {

            $statusUser = $this->request->getVar('statusRadio');

            $this->handleAbsen($idAgenda, $nip, $statusUser);

            // $this->session->remove('id_agenda');
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
                'rules' => 'required|numeric|min_length[15]|max_length[18]',
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
            ],
        ];

        return $this->validate($rules);
    }
}
