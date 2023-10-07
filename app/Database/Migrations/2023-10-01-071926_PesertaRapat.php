<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PesertaRapat extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_peserta_rapat' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'kode_rapat' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'NIK' => [
                'type' => 'VARCHAR',
                'constraint' => 16,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id_peserta_rapat', true);
        $this->forge->addForeignKey('kode_rapat', 'agendarapats', 'kode_rapat', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_peserta_rapat', 'pesertaumums', 'id_peserta_umum', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('NIK', 'pesertaumums', 'NIK', 'CASCADE', 'CASCADE');
        $this->forge->createTable('pesertarapats');
    }

    public function down()
    {
        $this->forge->dropTable('pesertarapats');
    }
}
