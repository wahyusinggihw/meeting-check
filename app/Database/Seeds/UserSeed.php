<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeed extends Seeder
{
    public function run()
    {
        // user

        $data = [
            'user_id' => '1',
            'role' => 'admin',
            'username' => 'admin',
            'password' => password_hash('admin', PASSWORD_DEFAULT),
        ];
        $this->db->table('users')->insert($data);

        // uuid

    }
}
