<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Ramsey\Uuid\Uuid;

class AgendaRapatSeed extends Seeder
{

    public function run()
    {
        $uuid = Uuid::uuid4()->toString();
        $uuid2 = Uuid::uuid4()->toString();

        // $length = 3; // Length of the random string
        // $randomString = bin2hex(random_bytes($length));
        $length = 6; // Length of the random string
        $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
        $randomString = substr(str_shuffle($characters), 0, $length);

        $data = [
            [
                'id' => $uuid,
                'kode_rapat' => $randomString,
                'judul_rapat' => 'Rapat Koordinasi',
                'tempat' => 'Ruang Rapat',
                'tanggal' => '2021-10-01',
                'waktu' => '14:30:00',
                'agenda' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quod omnis incidunt error commodi porro sit doloribus nemo esse accusantium? Voluptatem?',
                'link_rapat' => 'https://us02web.zoom.us/j/88512345678?pwd=asdasdadqrqwe==',
            ],
            [
                'id' => $uuid2,
                'kode_rapat' => $randomString,
                'judul_rapat' => 'Rapat Koordinasi',
                'tempat' => 'Lab Tata Kelola',
                'tanggal' => '2022-12-02',
                'waktu' => '14:00:00',
                'agenda' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quod omnis incidunt error commodi porro sit doloribus nemo esse accusantium? Voluptatem?',
                'link_rapat' => 'https://us02web.zoom.us/j/88512345678?pwd=QWxhZGRpbjpvcGVuIHNlc2FtZQ==',
            ],
        ];

        // Using Query Builder
        $this->forge->addKey('id', true);
        $this->db->table('agendarapats')->insertBatch($data);
    }
}
