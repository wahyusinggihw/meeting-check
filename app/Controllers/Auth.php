<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function __construct()
    {
        helper(['form']);
    }

    public function index()
    {
        $data = [
            'title' => 'Log In',
        ];
        return view('auth/login_view', $data);
    }

    public function login()
    {
        $data = [];
        $userModel = new UserModel();

        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $user = $userModel->where('username', $username)->first();
        // Check if the form was submitted
        if ($this->request->getPost()) {
            // Validate the form inputs
            $rules = [
                'username' => 'required',
                'password' => 'required',
            ];

            if ($this->validate($rules)) {

                // Authenticate user (implement your own authentication logic)
                if ($user && password_verify($password, $user['password'])) {

                    // Login successful
                    // Redirect or perform other actions
                } else {
                    // Login failed, show error message
                    $data['error_message'] = 'Invalid username or password';
                }
            }
        }

        // Load the login form view
        return redirect()->to('/dashboard');
    }

    // sign in function
    public function signin()
    {
        $data = [
            'title' => 'Sign In',
            'validation' => \Config\Services::validation()
        ];

        return view('Auth/signin_view', $data);
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
