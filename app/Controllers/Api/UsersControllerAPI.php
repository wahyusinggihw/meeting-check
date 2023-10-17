<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\PesertaRapatModel;
use App\Models\PesertaUmumModel;
use CodeIgniter\API\ResponseTrait;

class UsersControllerAPI extends BaseController
{
    use ResponseTrait;
    protected $pesertaUmum;
    protected $instansiAPI;
    public function __construct()
    {
        $this->pesertaUmum = new PesertaUmumModel();
        $this->instansiAPI = new PesertaRapatModel();
    }

    public function getPeserta($nik)
    {
        // $nik = $this->request->getVar('nip');
        $data = $this->pesertaUmum->cariUser($nik);
        // check if not null
        if ($data == null) {
            $response = [
                'status' => false,
                'error' => true,
                'messages' => 'User not found'
            ];
            return $this->respond($response, 200);
        }
        return $this->respond($data, 200);
    }

    public function getPegawai($nip)
    {
        $pegawai = $this->instansiAPI->getInstansi();
        $pegawaiJSON = json_decode($pegawai);
        foreach ($pegawaiJSON->data as $item) {
            if ($item->kode_instansi == $nip) {
                $result = [
                    'status' => true,
                    'data' => $item
                ];
                break;
            } else {
                $result = [
                    'status' => false,
                    'data' => null
                ];
            }
        }
        return $this->respond($result);
    }
}
