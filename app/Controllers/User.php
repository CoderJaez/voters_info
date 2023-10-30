<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class User extends BaseController
{
    private $validationErrMessage;
    private $data = [];
    public function index()
    {
        $model = model(UserModel::class);
        $search = $this->request->getVar("search");
        $data['users'] = $model
            ->like('Fullname', "%$search%")
            ->orLike("Email", "%$search%")
            ->findAll();

        return view('shared/layouts/Header', $data)
            . view('shared/layouts/nav')
            . view('user/index',)
            . view('shared/layouts/footer');
    }

    public function new()
    {
        $this->data = ['title' => 'Create new user', 'errors' => $this->validationErrMessage];
        return view('shared/layouts/Header', $this->data)
            . view('shared/layouts/nav')
            . view('user/new')
            . view('shared/layouts/footer');
    }

    public function edit($id)
    {
        if (!$id)
            return $this->index();
        else {
            $model = model(UserModel::class);
            $user = $model->getUsers($id);

            $this->data = [
                'title' => 'Edit user',
                'user' => $user,
                'errors' => $this->validationErrMessage
            ];
        }
        return view('shared/layouts/Header', $this->data)
            . view('shared/layouts/nav')
            . view('user/edit')
            . view('shared/layouts/footer');
    }

    public function create()
    {
        try {
            $validation = \Config\Services::validation();
            $data = [
                'fullname' => $this->request->getVar('fullname'),
                'email' => $this->request->getVar('email'),
                'password' => $this->request->getVar('password'),
                'confirm_password' => $this->request->getVar('confirm_password'),
            ];
            if (!$validation->run($data, 'userRules')) {
                $this->validationErrMessage = $validation->getErrors();
                return $this->new();
            }
            $model = new UserModel();

            $model->save([
                'Fullname' => $this->request->getVar('fullname'),
                'Email' => $this->request->getVar('email'),
                'Password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT)
            ]);
            return redirect('users')->with('success', 'New user created successfully.');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function update($id)
    {
        try {
            $validation = \Config\Services::validation();
            $data = [
                'fullname' => $this->request->getVar('fullname'),
                'email' => $this->request->getVar('email'),
                'password' => $this->request->getVar('password'),
                'confirm_password' => $this->request->getVar('confirm_password'),
            ];
            if (!$validation->run($data, 'userRules')) {
                $this->validationErrMessage = $validation->getErrors();
                return $this->edit($id);
            }
            $model = new UserModel();

            $model
                ->where('Id', $id)
                ->set([
                    'Fullname' => $this->request->getVar('fullname'),
                    'Email' => $this->request->getVar('email'),
                    'Password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT)
                ])
                ->update();
            return redirect('users')->with('success', 'User updated successfully.');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function delete($id)
    {
        $model = new UserModel();
        $model->where("Id", $id)->delete();
        return redirect('users')->with('success', 'User deleted successfully.');
    }
}
