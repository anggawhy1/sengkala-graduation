<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateFotograferTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'        => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'nama'      => ['type' => 'VARCHAR', 'constraint' => 100],
            'whatsapp'  => ['type' => 'VARCHAR', 'constraint' => 20],
            'email'     => ['type' => 'VARCHAR', 'constraint' => 100],
            'status'    => ['type' => 'ENUM', 'constraint' => ['Aktif', 'Tidak Aktif'], 'default' => 'Aktif'],
            'alamat'    => ['type' => 'TEXT'],
            'foto'      => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('fotografer');
    }

    public function down()
    {
        $this->forge->dropTable('fotografer');
    }
}
