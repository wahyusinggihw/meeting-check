<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Ramsey\Uuid\Uuid;

class AdminSeed extends Seeder
{
    public function run()
    {
        $uuid = Uuid::uuid4()->toString();
        $uuid2 = Uuid::uuid4()->toString();
        $uuid3 = Uuid::uuid4()->toString();
        // user

        $data = [
            [
                'id_admin' => $uuid,
                'slug' => 'super-admin',
                'nama' => 'Super Admin',
                'role' => 'superadmin',
                'username' => 'super',
                'password' => password_hash('super', PASSWORD_DEFAULT),
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id_admin' => $uuid2,
                'slug' => 'admin1',
                'nama' => 'Admin Satu',
                'role' => 'admin',
                'username' => 'admin1',
                'password' => password_hash('admin1', PASSWORD_DEFAULT),
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id_admin' => $uuid3,
                'slug' => 'admin2',
                'nama' => 'Admin Dua',
                'role' => 'admin',
                'username' => 'admin2',
                'password' => password_hash('admin2', PASSWORD_DEFAULT),
                'created_at' => date('Y-m-d H:i:s'),
            ],
        ];


        $this->forge->addKey('id_admin', true);
        $this->db->table('admins')->insertBatch($data);

        // uuid

    }
}
