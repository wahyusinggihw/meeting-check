<?php

namespace App\Controllers\Dashboard;

use Ramsey\Uuid\Uuid;
use App\Models\AdminModel;
use Cocur\Slugify\Slugify;
use App\Controllers\BaseController;

class UsersController extends BaseController
{
    protected $helpers = ['form'];
    protected $slugify;
    protected $users;
    public function __construct()
    {
        $this->users = new AdminModel();
        $this->slugify = new Slugify();
    }

    public function index()
    {
        $profile = $this->users->getAdminByID();
        $data = [
            'title' => 'Profile',
            'active' => 'profile',
            'profile' => $profile
        ];
        return view('dashboard/profile', $data);
    }

    public function edit($slug)
    {
        $profile = $this->users->where('slug', $slug)->first();
        $data = [
            'title' => 'Edit Password',
            'data' => $profile,
            // 'validation' => \Config\Services::validation(),
            // 'password' => $password2
        ];


        return view('dashboard/edit_profile', $data);
    }

    public function editPassword($slug)
    {
        $profile = $this->users->where('slug', $slug)->first();
        // dd($profile['id_admin']);
        $data = [
            'title' => 'Edit Password',
            'data' => $profile,
            // 'validation' => \Config\Services::validation(),
            // 'password' => $password2
        ];

        return view('dashboard/edit_profilepassword', $data);
    }



    public function updatePassword($id)
    {
        $profile = $this->users->where('id_admin', $id)->first();
        // dd($this->request->getPost());
        $validate = $this->validate([

            'old-password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password baru harus diisi'
                ]
            ],
            'new-password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password baru harus diisi'
                ]
            ],
            'confirm-password' => [
                'rules' => 'required|matches[new-password]',
                'errors' => [
                    'required' => 'Konfirmasi password harus diisi',
                    'matches' => 'Konfirmasi password tidak sesuai'
                ]
            ]

        ]);
        if (!password_verify($this->request->getVar('old-password'), $profile['password'])) {
            // Old password doesn't match, return an error
            return redirect()->back()->withInput()->with('error', 'Password lama tidak cocok');
        }

        if (!$validate) {
            return redirect()->back()->withInput();
        }

        // $slug = $this->slugify->slugify($this->request->getVar('nama'));
        $this->users->update($id, [
            'id_admin' => $id,
            'password' => password_hash($this->request->getVar('new-password'), PASSWORD_DEFAULT)
        ]);
        session()->setFlashdata('success', 'Data berhasil diubah.');
        return redirect()->to('/dashboard/profile')->with('success', 'Data berhasil diubah');
    }

    public function update($id)
    {
        // dd($this->request->getPost());
        $validate = $this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama harus diisi'
                ]
            ],
            'username' => [
                'rules' => 'required|alpha_dash|is_unique[admins.username]',
                'errors' => [
                    'required' => 'Username harus diisi',
                    'is_unique' => 'Username tidak boleh sama dengan sebelumnya'
                ]
            ],
            // 'confirm-password' => [
            //     'rules' => 'matches[new-password]',
            //     'errors' => [
            //         'required' => 'Konfirmasi password harus diisi',
            //         'matches' => 'Konfirmasi password tidak sesuai'
            //     ]
            // ]

        ]);

        if (!$validate) {
            return redirect()->back()->withInput();
        }

        $slug = $this->slugify->slugify($this->request->getVar('nama'));
        $this->users->update($id, [
            'id_admin' => $id,
            'slug' => $slug,
            'nama' => $this->request->getVar('nama'),
            'username' => $this->request->getVar('username'),
            // 'password' => password_hash($this->request->getVar('new-password'), PASSWORD_DEFAULT)
        ]);

        return redirect()->to('/dashboard/profile')->with('success', 'Data berhasil diubah');
    }
}
