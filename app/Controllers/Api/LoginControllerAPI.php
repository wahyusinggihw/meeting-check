<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\PesertaRapatModel;
use CodeIgniter\API\ResponseTrait;
use App\Models\UserModel;
// use \Firebase\JWT\JWT;

class LoginControllerAPI extends BaseController
{
    use ResponseTrait;

    public function Login()
    {
        $userAPI = new PesertaRapatModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $user = $userAPI->getInstansi();
        $userJson = json_decode($user);

        $userInAPI = $this->cariUser($userJson, $username);
        // dd($userInAPI->ket_ukerja);
        if (!$userInAPI) {
            $response = [
                'status' => false,
                'message' => 'Invalid username or password',

            ];
            return $this->respond($response, 200);
        }

        // dd($userExist->kode_instansi);
        $hash = password_hash($userInAPI->kode_instansi, PASSWORD_DEFAULT);
        $pwd_verify = password_verify($password, $hash);

        if (!$pwd_verify) {
            $response = [
                'status' => false,
                'message' => 'Invalid username or password',

            ];
            return $this->respond($response, 200);
        }

        $response = [
            'status' => true,
            'message' => 'Login Succesful',
            'data' => $userInAPI,
            // 'token' => 
        ];

        return $this->respond($response, 200);
    }

    function cariUser($json, $key)
    {
        foreach ($json->data as $item) {
            if ($item->kode_instansi === $key) {
                $result = $item;
                break;
            } else {
                $result = null;
            }
        }
        return $result;
    }
}
