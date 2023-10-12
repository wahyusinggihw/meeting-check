<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Ramsey\Uuid\Uuid;
// fake
use Faker\Factory;

class AgendaRapatSeed extends Seeder
{

    public function run()
    {
        $uuid = Uuid::uuid4()->toString();
        $uuid2 = Uuid::uuid4()->toString();
        $faker = Factory::create();
        helper('my_helper');

        for ($i = 1; $i < 20; $i++) {
            # code...
            $data = [
                'id_agenda' => $faker->uuid(),
                'slug' => $faker->slug(),
                'id_admin' => '8e6a28e3-6b1d-430e-86cd-cfa7435cd843',
                'kode_rapat' => kodeRapat(),
                'judul_rapat' => $faker->sentence(3),
                'tempat' => $faker->address(),
                'tanggal' => $faker->date(),
                'jam' => $faker->time(),
                'agenda' => $faker->sentence(10),
                'link_rapat' => $faker->url(),
            ];
            $this->forge->addKey('id_agenda', true);
            $this->db->table('agendarapats')->insertBatch($data);
        }

        // Using Query Builder
    }
}
