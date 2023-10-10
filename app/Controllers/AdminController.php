<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdminModel;
use Ramsey\Uuid\Uuid;
use Cocur\Slugify\Slugify;

class AdminController extends BaseController
{
    protected $helpers = ['form'];
    protected $adminModel;
    public function __construct()
    {
        $this->adminModel = new AdminModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Kelola Admin',
            'admins' => $this->adminModel->findAll(),
        ];

        return view('dashboard/kelola_admin', $data);
    }

    public function tambahAdmin()
    {
        if ($this->request->is('post')) {

            $validate = $this->validate([
                'nama' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama harus diisi'
                    ]
                ],
                'username' => [
                    'rules' => 'required|is_unique[admins.username]',
                    'errors' => [
                        'required' => 'Username harus diisi',
                        'is_unique' => 'Username sudah terdaftar'
                    ]
                ],
                'password' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Password harus diisi'
                    ]
                ],
            ]);

            if (!$validate) {
                return redirect()->back()->withInput();
            }

            $slugify = new Slugify();

            $uuid = Uuid::uuid4()->toString();
            $slug = $slugify->slugify($this->request->getVar('nama'));

            $data = [
                'id_user' => $uuid,
                'slug' => $slug,
                'role' => 'admin',
                'nama' => $this->request->getVar('nama'),
                'username' => $this->request->getVar('username'),
                'password' => $this->request->getVar('password'),
                'created_at' => date('Y-m-d H:i:s'),
            ];

            // dd($data);

            $this->adminModel->insert($data);
            return redirect()->to('/dashboard/kelola-admin');
        } else {
            $data = [
                'title' => 'Tambah Admin',
                'validation' => \Config\Services::validation()
            ];
            return view('dashboard/tambah_admin', $data);
        }
    }

    public function edit($slug)
    {
        $data = [
            'title' => 'Edit Admin',
            'data' => $this->adminModel->where('slug', $slug)->first(),
            // 'validation' => \Config\Services::validation(),
        ];

        return view('dashboard/edit_admin', $data);
    }

    public function delete($id)
    {
        $query = $this->adminModel->find($id);
        if ($query) {
            $this->adminModel->delete($id);
            return redirect()->to('/dashboard/kelola-admin');
        }
    }
}
