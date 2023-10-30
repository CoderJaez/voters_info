<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class AddUser extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'Id' => [
                'type' => 'INT',
                'auto_increment' => true
            ],
            'Fullname' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'Email' => [
                'type' => 'VARCHAR',
                'constraint' => 200
            ],
            'Password' => [
                'type' => 'VARCHAR',
                'constraint' => 250

            ],
            'CreatedAt' => [
                'type' => 'DATETIME',
                'default' => new RawSql('CURRENT_TIMESTAMP')
            ],
            'UpdatedAt' => [
                'type' => 'DATETIME',
                'default' => new RawSql('CURRENT_TIMESTAMP')
            ]
        ]);

        $this->forge->addKey('Id', true);
        $this->forge->addUniqueKey('Email', 'Email');
        $this->forge->createTable('users', true);
    }

    public function down()
    {
        //
    }
}
