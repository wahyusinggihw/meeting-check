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
        $uuid4 = Uuid::uuid4()->toString();
        $uuid5 = Uuid::uuid4()->toString();

        // user

        $data = [
            [
                'id_admin' => $uuid,
                'slug' => 'super-admin',
                'nama' => 'Super Admin',
                'role' => 'superadmin',
                'id_instansi' => 'superadmin',
                'username' => 'super',
                'password' => password_hash('super', PASSWORD_DEFAULT),
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id_admin' => $uuid2,
                'slug' => 'admin1',
                'nama' => 'Admin Satu',
                'role' => 'admin',
                'id_instansi' => 'instansi1',
                'username' => 'admin1',
                'password' => password_hash('admin1', PASSWORD_DEFAULT),
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id_admin' => $uuid3,
                'slug' => 'operator1',
                'nama' => 'Operator Satu',
                'role' => 'operator',
                'id_instansi' => 'instansi1',
                'username' => 'operator1',
                'password' => password_hash('operator1', PASSWORD_DEFAULT),
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id_admin' => $uuid4,
                'slug' => 'admin2',
                'nama' => 'Admin Dua',
                'role' => 'admin',
                'id_instansi' => 'instansi2',
                'username' => 'admin2',
                'password' => password_hash('admin2', PASSWORD_DEFAULT),
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id_admin' => $uuid5,
                'slug' => 'operator2',
                'nama' => 'Operator Dua',
                'role' => 'operator',
                'id_instansi' => 'instansi2',
                'username' => 'operator2',
                'password' => password_hash('operator2', PASSWORD_DEFAULT),
                'created_at' => date('Y-m-d H:i:s'),
            ],
        ];


        $this->forge->addKey('id_admin', true);
        $this->db->table('admins')->insertBatch($data);

        // uuid

    }
}
