<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;

class Authentication extends BaseController
{
    public function index()
    {
        return view('shared/layouts/header')
            . view('authentication/login')
            . view('shared/layouts/footer');
    }

    public function login()
    {
        return json_encode(['Email' => $this->request->getVar('email'), 'Password' => $this->request->getVar('password')]);
    }
}
    