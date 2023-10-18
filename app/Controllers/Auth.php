<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\UserModel;

class Auth extends BaseController
{
    protected $adminModel;
    protected $helpers = ['form'];
    public function __construct()
    {
        $this->adminModel = new AdminModel();
    }

    // public function index()
    // {
    //     $data = [
    //         'title' => 'Log In',
    //     ];
    //     return view('auth/login_view', $data);
    // }

    public function login()
    {
        if ($this->request->is('post')) {
            // $nip = $this->request->getVar('username');
            // $password = $this->request->getVar('password');
            // dd($nip, $password);
            $rules = [
                'username' => 'required',
                'password' => 'required',
            ];

            $username = $this->request->getVar('username');
            $password = $this->request->getVar('password');

            if (!$this->validate($rules)) {
                return redirect()->back()->withInput();
            }

            $admin = $this->adminModel->where('username', $username)->first();
            // dd($user);
            if (!$admin) {
                return redirect()->to('/auth/login')->with('error', 'Username atau Password Salah');
            }
            if (password_verify($password, $admin['password'])) {
                $data = [
                    'id_admin' => $admin['id_admin'],
                    'username' => $admin['username'],
                    'nama' => $admin['nama'],
                    'role' => $admin['role'],
                    'logged_in' => TRUE
                ];
                session()->set($data);
                return redirect()->to('/dashboard');
            } else {
                // session()->setFlashdata('error', 'Username atau Password Salah');
                return redirect()->to('/auth/login')->with('error', 'Username atau Password Salah');
            }
        } else {
            $data = [
                'title' => 'Log In',
            ];
            return view('auth/login_view', $data);
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }

    public function tester()
    {
        $data = [
            'title' => 'Tester'
        ];
        return view('auth/tester.php', $data);
    }

    public function informasiRapat()
    {
        $data = [
            'title' => 'Tester'
        ];
        return view('informasi_rapat.php', $data);
    }
}
