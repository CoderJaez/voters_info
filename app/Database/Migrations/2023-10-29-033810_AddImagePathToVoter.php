<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddImagePathToVoter extends Migration
{
    public function up()
    {
        //
        $this->forge->addColumn("voters", [
            'ImagePath' => [
                'type' => 'VARCHAR',
                'constraint' => 250
            ]
        ]);
    }

    public function down()
    {
        //
    }
}
