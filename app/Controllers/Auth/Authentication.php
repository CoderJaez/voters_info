<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\UserModel;

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
        $model = new UserModel();
        $result = $model->where("Email", $this->request->getVar('email'))->first();
        if (!$result || !password_verify($this->request->getVar('password'), $result->Password)) {
            return redirect()->to('/')->with('error', 'Invalid email or password.');
        }
        session()->start();
        session()->set(["isLoggedIn" => true, "fullname" => $result->Fullname]);
        return redirect('voters');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
