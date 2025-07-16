<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePembayaran extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'auto_increment' => true],
            'pesanan_id' => ['type' => 'INT', 'unsigned' => true],
            'status_pembayaran' => ['type' => 'VARCHAR', 'constraint' => 50, 'default' => 'Belum Bayar'],
            'metode' => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => true],
            'total_tagihan' => ['type' => 'INT', 'null' => false],
            'dp_dibayar' => ['type' => 'INT', 'default' => 0],
            'sisa_tagihan' => ['type' => 'INT', 'default' => 0],
            'tanggal_konfirmasi' => ['type' => 'DATE', 'null' => true],
            'deadline_pelunasan' => ['type' => 'DATE', 'null' => true],
            'bukti_pembayaran' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);

        $this->forge->addKey('id', true); // Primary Key
        $this->forge->addForeignKey('pesanan_id', 'pesanan', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('pembayaran');
    }

    public function down()
    {
        $this->forge->dropTable('pembayaran');
    }
}
