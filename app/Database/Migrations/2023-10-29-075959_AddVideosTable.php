<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class AddVideosTable extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'Id' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
            ],
            'Path' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
            ],
            'CreatedAt' => [
                'type' => 'DATETIME',
                'default' => new RawSql('CURRENT_TIMESTAMP'),
            ],
            'UpdatedAt' => [
                'type' => 'DATETIME',
                'default' => new RawSql('CURRENT_TIMESTAMP'),
            ],

        ]);
        $this->forge->addKey('Id', true);
        $this->forge->createTable('videos', true);
    }

    public function down()
    {
        //
    }
}
