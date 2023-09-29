<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Ramsey\Uuid\Uuid;

class AgendaRapatSeed extends Seeder
{
    public function run()
    {
        $uuid = Uuid::uuid4();

        $data = [
            [
                'id' => $uuid->toString(),
                'judul_rapat' => 'Rapat Koordinasi',
                'tempat' => 'Zoom',
                'tanggal' => '2021-10-01',
                'link_rapat' => 'https://us02web.zoom.us/j/88512345678?pwd=QWxhZGRpbjpvcGVuIHNlc2FtZQ==',
            ],
            [
                'id' => '2',
                'judul_rapat'    => 'Rapat Koordinasi',
                'tempat' => 'Zoom',
                'tanggal' => '2021-10-02',
                'link_rapat' => 'https://us02web.zoom.us/j/88512345678?pwd=QWxhZGRpbjpvcGVuIHNlc2FtZQ==',
            ],
            [
                'id' => '3',
                'judul_rapat'    => 'Rapat Koordinasi',
                'tempat' => 'Zoom',
                'tanggal' => '2021-10-03',
                'link_rapat' => 'https://us02web.zoom.us/j/88512345678?pwd=QWxhZGRpbjpvcGVuIHNlc2FtZQ==',
            ],
            [
                'id' => '4',
                'judul_rapat'    => 'Rapat Koordinasi',
                'tempat' => 'Zoom',
                'tanggal' => '2021-10-04',
                'link_rapat' => 'https://us02web.zoom.us/j/88512345678?pwd=QWxhZGRpbjpvcGVuIHNlc2FtZQ==',
            ],
            [
                'id' => '5',
                'judul_rapat'    => 'Rapat Koordinasi',
                'tempat' => 'Zoom',
                'tanggal' => '2021-10-05',
                'link_rapat' => 'https://us02web.zoom.us/j/88512345678?pwd=QWxhZGRpbjpvcGVuIHNlc2FtZQ==',
            ],
        ];

        // Using Query Builder
        $this->db->table('agendarapats')->insertBatch($data);
    }
}
