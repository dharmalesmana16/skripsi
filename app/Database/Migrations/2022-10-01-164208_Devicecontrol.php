<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Devicecontrol extends Migration
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
            'nama_state' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'mode' => [
                'type' => 'ENUM',
                'constraint' => ['AUTO','MANUAL'],
                'default' => 'MANUAL',
            ],
            'state' => [
                'type' => 'ENUM',
                'constraint' => ['ON','OFF'],
            ],  
            'started_at' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'ended_at' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
          
            'datadevice_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned'       => true,

            ],
            'datalampu_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned'       => true,
            ],
            'port' => [
                'type' => 'ENUM',
                'constraint' => ["PORT1","PORT2","PORT3","PORT4"],
            ],
            'created_at timestamp DEFAULT current_timestamp ON UPDATE CURRENT_TIMESTAMP',
            'updated_at timestamp DEFAULT current_timestamp ON UPDATE CURRENT_TIMESTAMP',
        ]);
        $this->forge->addForeignKey('datadevice_id','datadevice','id','CASCADE','CASCADE');
        $this->forge->addForeignKey('datalampu_id','datalampu','id','CASCADE','CASCADE');
        $this->forge->addKey('id', true);
        $this->forge->createTable('devicecontrol');
    }
    
    public function down()
    {
        //
        $this->forge->dropTable('devicecontrol');
    }
}
