<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Diskon extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'tanggal' => [
                'type' => 'DATE',
                'null' => FALSE,
                'unique' => TRUE
            ],
            'nominal' => [
                'type' => 'DOUBLE',
                'null' => FALSE
            ],
            'created_at' => [
                'type' => 'datetime',
                'null' => TRUE
            ],
            'updated_at' => [
                'type' => 'datetime',
                'null' => TRUE
            ]
        ]);

        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('diskon');
    }

    public function down()
    {
        $this->forge->dropTable('diskon');
    }
}