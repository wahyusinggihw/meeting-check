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

        $data = [
            [
                'id' => $uuid,
                'judul_rapat' => 'Rapat Koordinasi',
                'tempat' => 'Zoom',
                'tanggal' => '2021-10-01',
                'link_rapat' => 'https://us02web.zoom.us/j/88512345678?pwd=QWxhZGRpbjpvcGVuIHNlc2FtZQ==',
            ],
            [
                'id' => $uuid2,
                'judul_rapat' => 'Rapat Koordinasi',
                'tempat' => 'Zoom',
                'tanggal' => '2021-10-01',
                'link_rapat' => 'https://us02web.zoom.us/j/88512345678?pwd=QWxhZGRpbjpvcGVuIHNlc2FtZQ==',
            ],
            // [
            //     'id' => $uuid,
            //     'judul_rapat' => 'Rapat Koordinasi',
            //     'tempat' => 'Zoom',
            //     'tanggal' => '2021-10-01',
            //     'link_rapat' => 'https://us02web.zoom.us/j/88512345678?pwd=QWxhZGRpbjpvcGVuIHNlc2FtZQ==',
            // ],
            // [
            //     'id' => $uuid,
            //     'judul_rapat' => 'Rapat Koordinasi',
            //     'tempat' => 'Zoom',
            //     'tanggal' => '2021-10-01',
            //     'link_rapat' => 'https://us02web.zoom.us/j/88512345678?pwd=QWxhZGRpbjpvcGVuIHNlc2FtZQ==',
            // ],
            // [
            //     'id' => $uuid,
            //     'judul_rapat' => 'Rapat Koordinasi',
            //     'tempat' => 'Zoom',
            //     'tanggal' => '2021-10-01',
            //     'link_rapat' => 'https://us02web.zoom.us/j/88512345678?pwd=QWxhZGRpbjpvcGVuIHNlc2FtZQ==',
            // ],
        ];

        // Using Query Builder
        $this->forge->addKey('id', true);
        $this->db->table('agendarapats')->insertBatch($data);
    }
}
