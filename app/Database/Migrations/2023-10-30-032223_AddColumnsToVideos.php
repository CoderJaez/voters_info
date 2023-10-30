<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddColumnsToVideos extends Migration
{
    public function up()
    {
        $this->forge->addColumn("videos", [
            "Thumbnaill" => [
                "type" => "VARCHAR",
                'constraint' => 200,
            ],
            'Title' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
            ],
            'Description' => [
                'type' => 'TEXT',
            ]

        ]);
    }

    public function down()
    {
        //
    }
}
