<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class User extends BaseController
{
    public function index()
    {
        //
        return view('shared/layouts/Header')
            . view('shared/layouts/nav')
            . view('user/index')
            . view('shared/layouts/footer');
    }

    public function new()
    {
    }
}
