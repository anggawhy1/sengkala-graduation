<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePesanan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'                => [
                'type'           => 'VARCHAR',
                'constraint'     => 20,
                'primary'        => true,
            ],
            'nama_lengkap'      => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
            ],
            'paket'             => [
                'type'           => 'VARCHAR',
                'constraint'     => 50,
            ],
            'tanggal_pesan'     => [
                'type'           => 'DATE',
            ],
            'tanggal_sesi'      => [
                'type'           => 'DATE',
            ],
            'waktu'             => [
                'type'           => 'TIME',
            ],
            'lokasi'            => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
            ],
            'no_hp'             => [
                'type'           => 'VARCHAR',
                'constraint'     => 20,
            ],
            'email'             => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
                'null'           => true,
            ],
            'additional'        => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
                'null'           => true,
            ],
            'catatan'           => [
                'type'           => 'TEXT',
                'null'           => true,
            ],
            'status_pesanan'    => [
                'type'           => 'VARCHAR',
                'constraint'     => 30,
                'default'        => 'Menunggu Konfirmasi',
            ],
            'created_at'        => [
                'type'           => 'DATETIME',
                'null'           => true,
            ],
            'updated_at'        => [
                'type'           => 'DATETIME',
                'null'           => true,
            ],
        ]);

        $this->forge->createTable('pesanan');
    }

    public function down()
    {
        $this->forge->dropTable('pesanan');
    }
}
