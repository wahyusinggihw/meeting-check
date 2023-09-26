<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login(): string
    {
        return view('Auth/login_view');
    }

    public function register()
    {
        $userModel = new UserModel();
        $data = [
            'role' => 'admin',
            'username' => 'admin',
            'password' => password_hash('admin', PASSWORD_DEFAULT),
        ];
        $userModel->insert($data);

        return view('admin\register_view');
    }
}
