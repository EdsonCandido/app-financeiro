<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddClient extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nome' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => false
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => false,
                'unique' => false
            ],
            'documento' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => false,
                'unique' => true
            ],
            'cep' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            'telefone' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            'rua' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            'bairro' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            'cidade' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            'estado' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            'ativo' => [
                'type' => 'INT',
                'constraint' => 5,
                'default' => 1
            ],
            'updated_at' => [
                'type' => 'datetime',
                'null' => true,
            ],
            'created_at datetime default current_timestamp',
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('client');
    }

    public function down()
    {
        //
        $this->forge->dropTable('client');
    }
}
