<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Precos extends Migration
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
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'price' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'benefits' => [
                'type' => 'TEXT',
            ],
            'highlight' => [
                'type' => 'TINYINT',
                'constraint' => 1,
                'default' => 0,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('precos');
    }
    public function down()
    {
        $this->forge->dropTable("precos");
    }
}
