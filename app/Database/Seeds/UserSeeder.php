<?php

namespace App\Database\Seeds;

use App\Models\UserModel;
use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        //
        $model = new UserModel();

        $model->save([
            'Fullname' => "Jason Doe",
            'Email' => "admin@gmail.com",
            'Password' => password_hash("1234", PASSWORD_BCRYPT)
        ]);
    }
}
