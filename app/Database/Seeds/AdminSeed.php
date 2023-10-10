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
                'id_user' => $uuid,
                // 'nip' => '123',
                'role' => 'superadmin',
                'username' => 'wahyusinggih',
                'password' => password_hash('wahyusinggih', PASSWORD_DEFAULT),
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id_user' => $uuid2,
                // 'nip' => '2015',
                'role' => 'admin',
                'username' => '2015',
                'password' => password_hash('2015', PASSWORD_DEFAULT),
                'created_at' => date('Y-m-d H:i:s'),
            ],
        ];


        $this->forge->addKey('id_user', true);
        $this->db->table('admins')->insertBatch($data);

        // uuid

    }
}
