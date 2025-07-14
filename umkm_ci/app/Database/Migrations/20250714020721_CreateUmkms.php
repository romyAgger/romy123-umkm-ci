<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUmkms extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'alamat' => [
                'type' => 'TEXT',
            ],
            'tanggal_lahir_pemilik' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'jenis_usaha' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'produk' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'foto' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('umkms');
    }

    public function down()
    {
        $this->forge->dropTable('umkms');
    }
}
