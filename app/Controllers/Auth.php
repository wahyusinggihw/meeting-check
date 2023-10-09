<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    protected $userModel;
    protected $helpers = ['form'];
    public function __construct()
    {
        $this->userModel = new UserModel();
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
                'nip' => 'required|numeric',
                'password' => 'required',
            ];

            $nip = $this->request->getVar('username');
            $password = $this->request->getVar('password');

            $rules = [
                'username' => 'required',
                'password' => 'required',
            ];

            if (!$this->validate($rules)) {
                return redirect()->back()->withInput();
            }

            $user = $this->userModel->where('username', $nip)->first();
            // dd($user);
            if (!$user) {
                return redirect()->to('/auth/login')->with('error', 'Username atau Password Salah');
            }
            if (password_verify($password, $user['password'])) {
                $data = [
                    'username' => $user['username'],
                    'role' => $user['role'],
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
}
