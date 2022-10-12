<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Datadevice extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
                // 'null' => false,
            ],
            'nama_device' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'brand' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'tipekoneksi' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['ACTIVE','NOT ACTIVE'],
                'default' => 'NOT ACTIVE',
            ],
            'ipaddress' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'mac' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'meta' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'gambar' => [
                'type' => 'TEXT',
                
            ],
            'created_at timestamp DEFAULT current_timestamp ON UPDATE CURRENT_TIMESTAMP',
            'updated_at timestamp DEFAULT current_timestamp ON UPDATE CURRENT_TIMESTAMP',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('datadevice');
    }

    public function down()
    {
        $this->forge->dropTable('datadevice');
    }
}
