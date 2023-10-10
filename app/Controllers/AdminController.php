<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdminModel;
use App\Models\PesertaUmumModel;
use Ramsey\Uuid\Uuid;
use Cocur\Slugify\Slugify;
use PhpParser\Node\Stmt\Else_;

class AdminController extends BaseController
{
    protected $helpers = ['form'];
    protected $adminModel;
    protected $pesertaUmum;
    public function __construct()
    {
        $this->adminModel = new AdminModel();
        $this->pesertaUmum = new PesertaUmumModel();
    }

    public function index()
    {
        $currentRole = session()->get('role');
        if ($currentRole != 'superadmin') {
            $data = [
                'title' => 'Kelola Peserta',
                'role' => $currentRole,
                'admins' => $this->pesertaUmum->findAll(),
            ];

            return view('dashboard/kelola_admin', $data);
        } else {
            $data = [
                'title' => 'Kelola Admin',
                'role' => $currentRole,
                'admins' => $this->adminModel->where('role', 'admin')->findAll(),
            ];
            return view('dashboard/kelola_admin', $data);
        }


        // dd($data);
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
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'created_at' => date('Y-m-d H:i:s'),
            ];

            // dd($data);

            $this->adminModel->insert($data);
            return redirect()->to('/dashboard/kelola-admin')->with('success', 'Data berhasil ditambahkan');
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

    public function update($id)
    {
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
        $slug = $slugify->slugify($this->request->getVar('nama'));
        $this->adminModel->update($id, [
            'id_admin' => $id,
            'slug' => $slug,
            'nama' => $this->request->getVar('nama'),
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
        ]);

        return redirect()->to('/dashboard/kelola-admin')->with('success', 'Data berhasil diubah');
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
