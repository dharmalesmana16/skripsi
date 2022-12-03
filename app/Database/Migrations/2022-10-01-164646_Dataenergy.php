<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Dataenergy extends Migration
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
            'kwh' => [
                'type' => 'FLOAT'
            ],
            'volt' => [
                'type' => 'FLOAT'
            ],
            'power' => [
                'type' => 'FLOAT'
            ],
            'current' => [
                'type' => 'FLOAT'
            ],
            'id_lamp'=>[
                'type' => 'INT'
            ],
            'created_at timestamp DEFAULT current_timestamp ON UPDATE CURRENT_TIMESTAMP',
            'updated_at timestamp DEFAULT current_timestamp ON UPDATE CURRENT_TIMESTAMP',
        ]);
        $this->forge->addForeignKey('id_lamp','datalampu','id','CASCADE','CASCADE');

        $this->forge->addKey('id', true);
        $this->forge->createTable('dataenergy');
    }

    public function down()
    {
        $this->forge->dropTable('dataenergy');

    }
}
