<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    // public function __construct()
    // {
    //     helper(['form']);
    // }

    // public function index()
    // {
    //     $data = [
    //         'title' => 'Log In',
    //     ];
    //     return view('auth/login_view', $data);
    // }

    public function login()
    {
        if ($this->request->getMethod() == 'POST') {
            return 'proses login';
        }

        return view('auth/login_view');
        // $data = [];
        // $userModel = new UserModel();

        // $username = $this->request->getPost('username');
        // $password = $this->request->getPost('password');
        // $user = $userModel->where('username', $username)->first();
        // Check if the form was submitted
        // if ($this->request->getPost()) {
        //     // Validate the form inputs
        //     $rules = [
        //         'username' => 'required',
        //         'password' => 'required',
        //     ];

        //     if ($this->validate($rules)) {

        //         // Authenticate user (implement your own authentication logic)
        //         if ($user && password_verify($password, $user['password'])) {

        //             // Login successful
        //             // Redirect or perform other actions
        //         } else {
        //             // Login failed, show error message
        //             $data['error_message'] = 'Invalid username or password';
        //         }
        //     }
        // }

        // Load the login form view

    }
}
