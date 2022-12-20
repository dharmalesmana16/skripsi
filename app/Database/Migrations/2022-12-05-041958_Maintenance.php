<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Maintenance extends Migration
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
            'action' => [
                'type' => 'FLOAT'
            ],
            'jenis_kerusakan' => [
                'type' => 'ENUM',
                'constraint' => ['KERUSAKAN KOMPONEN LAMPU','KERUSAKAN KOMPONEN SISTEM IOT','PEMADAMAN LISTRIK DARI PLN','KERUSAKAN JALUR LISTRIK','DLL'],
            ],
            'jenis_penanganan' => [
                'type' => 'ENUM',
                'constraint' => ['PERBAIKAN ','PERAWATAN ','PENGGANTIAN'],
            ],
            'id_user'=>[
                'type' => 'INT',
                'unsigned' => true,

            ],
            'created_at timestamp DEFAULT current_timestamp ON UPDATE CURRENT_TIMESTAMP',
            'updated_at timestamp DEFAULT current_timestamp ON UPDATE CURRENT_TIMESTAMP',
        ]);
        $this->forge->addForeignKey('id_user','user','id','CASCADE','CASCADE');

        $this->forge->addKey('id', true);
        $this->forge->createTable('datamaintenance');
    }

    public function down()
    {
        $this->forge->dropTable('datamaintenance');

    }
}
