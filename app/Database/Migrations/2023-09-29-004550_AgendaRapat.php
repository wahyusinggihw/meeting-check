<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AgendaRapat extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'judul_rapat' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'tempat' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'tanggal' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'link_rapat' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('agendarapats');
    }

    public function down()
    {
        $this->forge->dropTable('agendarapats');
    }
}
