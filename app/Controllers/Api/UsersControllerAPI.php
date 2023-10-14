<?php

namespace App\Controllers\Api;

use App\Models\PesertaRapatModel;
use App\Models\PesertaUmumModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class UsersControllerAPI extends ResourceController
{
    use ResponseTrait;

    protected $instansiAPI;
    public function __construct()
    {
        $this->instansiAPI = new PesertaRapatModel();
    }

    public function show($id = null)
    {
        $pegawai = $this->instansiAPI->getInstansi();
        $pegawaiJSON = json_decode($pegawai);
        foreach ($pegawaiJSON->data as $item) {
            if ($item->kode_instansi == $id) {
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
