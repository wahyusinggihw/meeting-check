<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use App\Models\AdminModel;
use App\Models\PesertaRapatModel;
use App\Models\PesertaUmumModel;
use Ramsey\Uuid\Uuid;
use Cocur\Slugify\Slugify;

class AdminController extends BaseController
{
    protected $helpers = ['form'];
    protected $adminModel;
    protected $pesertaUmum;
    protected $pesertaRapat;
    protected $slugify;
    public function __construct()
    {
        $this->adminModel = new AdminModel();
        $this->pesertaUmum = new PesertaUmumModel();
        $this->pesertaRapat = new PesertaRapatModel();
        $this->slugify = new Slugify();
    }

    public function index()
    {
        $currentRole = session()->get('role');
        if ($currentRole != 'superadmin') {
            $data = [
                'title' => 'Kelola Operator',
                'active' => 'kelola_operator',
                'role' => $currentRole,
                'admins' => $this->adminModel->getAdminByRole(),
            ];

            return view('dashboard/kelola_admin', $data);
        } else {
            $data = [
                'title' => 'Kelola Admin',
                'active' => 'kelola_peserta',
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
            // dd($this->request->getPost());
            $validate = $this->validate([
                'nama' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama harus diisi'
                    ]
                ],
                'username' => [
                    'rules' => 'required|is_unique[admins.username]|alpha_dash',
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

            $instansi = $this->request->getVar('asal_instansi');
            $sections = explode('-', $instansi);



            if (!$validate) {
                return redirect()->back()->withInput();
            }

            $uuid = Uuid::uuid4()->toString();
            $slug = $this->slugify->slugify($this->request->getVar('nama'));
            $role = session()->get('role');
            if ($role == 'superadmin') {
                $id_instansi = $sections[0];
                $nama_instansi = $sections[1];

                $data = [
                    'id_admin' => $uuid,
                    'slug' => $slug,
                    'role' =>  $role == 'admin' ? 'operator' : 'admin',
                    'id_instansi' => $id_instansi,
                    'nama_instansi' => $nama_instansi,
                    'nama' => $this->request->getVar('nama'),
                    'username' => $this->request->getVar('username'),
                    'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                    'created_at' => date('Y-m-d H:i:s'),
                ];
            } else {
                $data = [
                    'id_admin' => $uuid,
                    'slug' => $slug,
                    'role' =>  $role == 'admin' ? 'operator' : 'admin',
                    'id_instansi' => session()->get('id_instansi'),
                    'nama_instansi' => session()->get('nama_instansi'),
                    'nama' => $this->request->getVar('nama'),
                    'username' => $this->request->getVar('username'),
                    'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                    'created_at' => date('Y-m-d H:i:s'),
                ];
            }

            // dd($data);

            $this->adminModel->insert($data);
            return redirect()->to('/dashboard/kelola-admin')->with('success', 'Data berhasil ditambahkan');
        } else {
            $instansi = $this->pesertaRapat->getInstansi();
            $instansiDecode = json_decode($instansi);
            $data = [
                'title' => 'Tambah Admin',
                'validation' => \Config\Services::validation(),
                'instansi' => $instansiDecode
            ];
            return view('dashboard/tambah_admin', $data);
        }
    }

    public function edit($slug)
    {

        // $password = $this->adminModel->where('slug', $slug)->first()['password'];
        // $password2 = password_hash($password, PASSWORD_DEFAULT);

        $data = [
            'title' => 'Edit Admin',
            'data' => $this->adminModel->where('slug', $slug)->first(),
            // 'validation' => \Config\Services::validation(),
            // 'password' => $password2
        ];

        return view('dashboard/edit_admin', $data);
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
                'rules' => 'required|alpha_dash',
                'errors' => [
                    'required' => 'Username harus diisi',
                    'is_unique' => 'Username sudah terdaftar'
                ]
            ],
            'new-password' => [
                // 'rules' => 'required',
                // 'errors' => [
                //     'required' => 'Password harus diisi'
                // ]
            ],
            'confirm-password' => [
                'rules' => 'matches[new-password]',
                'errors' => [
                    'required' => 'Konfirmasi password harus diisi',
                    'matches' => 'Konfirmasi password tidak sesuai'
                ]
            ]

        ]);

        if (!$validate) {
            return redirect()->back()->withInput();
        }

        $slug = $this->slugify->slugify($this->request->getVar('nama'));
        $this->adminModel->update($id, [
            'id_admin' => $id,
            'slug' => $slug,
            'nama' => $this->request->getVar('nama'),
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('new-password'), PASSWORD_DEFAULT)
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
