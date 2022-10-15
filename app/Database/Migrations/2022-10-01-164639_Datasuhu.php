<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Datasuhu extends Migration
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
            'temp' => [
                'type' => 'FLOAT'
            ],
            'humi' => [
                'type' => 'FLOAT'

            ],
            'device_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned'       => true,
            ],
            'created_at timestamp DEFAULT current_timestamp ON UPDATE CURRENT_TIMESTAMP',
            'updated_at timestamp DEFAULT current_timestamp ON UPDATE CURRENT_TIMESTAMP',
        ]);
        $this->forge->addForeignKey('device_id','datadevice','id','CASCADE','CASCADE');

        $this->forge->addKey('id', true);
        $this->forge->createTable('datasuhu');
    }

    public function down()
    {
        $this->forge->dropTable('datasuhu');
    }
}
