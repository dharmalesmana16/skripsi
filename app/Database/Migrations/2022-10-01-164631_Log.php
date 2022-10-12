<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Log extends Migration
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
            'action' => [
                'type' => 'TEXT',
               
            ],
           
            
        
            'created_at timestamp DEFAULT current_timestamp ON UPDATE CURRENT_TIMESTAMP',
            'updated_at timestamp DEFAULT current_timestamp ON UPDATE CURRENT_TIMESTAMP',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('log');
    }

    public function down()
    {
        $this->forge->dropTable('log');
    }
}
