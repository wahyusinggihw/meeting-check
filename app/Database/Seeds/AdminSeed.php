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
        // user

        $data = [
            [
                'id_admin' => $uuid,
                'slug' => 'super-admin',
                'name' => 'Super Admin',
                'role' => 'superadmin',
                'username' => 'super',
                'password' => password_hash('super', PASSWORD_DEFAULT),
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id_admin' => $uuid2,
                'slug' => 'admin',
                'name' => 'Admin',
                'role' => 'admin',
                'username' => 'admin',
                'password' => password_hash('admin', PASSWORD_DEFAULT),
                'created_at' => date('Y-m-d H:i:s'),
            ],
        ];


        $this->forge->addKey('id_admin', true);
        $this->db->table('admins')->insertBatch($data);

        // uuid

    }
}
