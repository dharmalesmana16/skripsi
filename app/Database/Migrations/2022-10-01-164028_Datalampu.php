<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Datalampu extends Migration
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
            'nama_lampu' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'brand' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'brand' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['ACTIVE','NOT ACTIVE'],
                'default' => 'NOT ACTIVE',
            ],
            'type' => [
                'type'       => 'ENUM',
                'constraint' => ['LED','NON LED'],
                'default' => 'LED'
            ],
            'device_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned'       => true,

            ],
            'meta' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            
        
            'created_at timestamp DEFAULT current_timestamp ON UPDATE CURRENT_TIMESTAMP',
            'updated_at timestamp DEFAULT current_timestamp ON UPDATE CURRENT_TIMESTAMP',
        ]);
        $this->forge->addForeignKey('device_id','datadevice','id','CASCADE','CASCADE');
        $this->forge->addKey('id', true);
        $this->forge->createTable('datalampu');
    }

    public function down()
    {
        $this->forge->dropTable('datalampu');
    }
}
