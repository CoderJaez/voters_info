<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddVoter extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'Id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' =>  true,
            ],
            'Fullname' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'Gender' => [
                'type' => 'VARCHAR',
                'constraint' => 5
            ],
            'Address' => [
                'type' => 'VARCHAR',
                'constraint' => '250',
            ],
            'PhoneNumber' => [
                'type' => 'VARCHAR',
                'constraint' => 11
            ],
            'Email' => [
                'type' => 'VARCHAR',
                'constraint' => 200
            ],
            'VoterRegNumber' => [
                'type' => 'VARCHAR',
                'constraint' => 250,
            ]
        ]);
        $this->forge->addKey('Id', true);
        $this->forge->addUniqueKey(['Email', 'VoterRegNumber'], 'KeyName');

        $this->forge->createTable('voters', true);
    }

    public function down()
    {
        //
    }
}
