<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class AddTimesTampToVoter extends Migration
{
    public function up()
    {
        $this->forge->addColumn('voters', [
            'CreatedAt' => [
                'type' => 'DATETIME',
                'default' => new RawSql('CURRENT_TIMESTAMP')
            ],
            'UpdatedAt' => [
                'type' => 'DATETIME',
                'default' => new RawSql('CURRENT_TIMESTAMP'),
                'update' => true
            ]
        ]);
    }

    public function down()
    {
        //
    }
}
