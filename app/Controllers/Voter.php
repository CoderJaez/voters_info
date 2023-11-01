<?php

namespace App\Controllers;

use App\Models\VoterModel;

class Voter extends BaseController
{

  private $data = [];
  private $validationErrMessage = [];

  public function __construct()
  {
  }

  public function index()
  {
    $model = new VoterModel();
    $search = $this->request->getVar("search")  ?? "";
    $this->data["voters"] = $model
      ->like("Fullname", "%$search%")
      ->orLike("Address", "%$search%")
      ->orLike("Email", "%$search%")
      ->findAll();

    return view('shared/layouts/Header')
      . view('shared/layouts/Nav')
      . view('voters/index', $this->data)
      . view('shared/layouts/Footer');
  }



  public function new()
  {
    $this->data = ['title' => 'Register new voter', 'errors' => $this->validationErrMessage, 'VoterRegNumber' => date('YmdHis') . uniqid()];
    return view('shared/layouts/Header', $this->data)
      . view('shared/layouts/Nav')
      . view('voters/new')
      . view('shared/layouts/Footer');
  }

  public function create()
  {
    try {
      $validation = \Config\Services::validation();
      $data = [
        'fullname' => $this->request->getVar('fullname'),
        'email' => $this->request->getVar('email'),
        'voter_reg_number' => $this->request->getVar('voter_reg_number'),
        'gender' => $this->request->getVar('gender'),
        'phone_number' => $this->request->getVar('phone_number'),
        'address' => $this->request->getVar('address'),
        'image' => $this->request->getVar('image'),
      ];
      // var_dump($data);
      // die();
      if (!$validation->run($data, 'voterRules')) {
        $this->validationErrMessage = $validation->getErrors();
        return $this->new();
      }
      $model = new VoterModel();
      if ($img = $this->request->getFile('image')) {
        if ($img->isValid() && !$img->hasMoved()) {
          $imgName = $img->getRandomName();
          $img->move('uploads/images', $imgName);
        }
      }
      $model->save([
        'VoterRegNumber' => $this->request->getVar('voter_reg_number'),
        'Fullname' => $this->request->getVar('fullname'),
        'Email' => $this->request->getVar('email'),
        'PhoneNumber' => $this->request->getVar('phone_number'),
        'Gender' => $this->request->getVar('gender'),
        'Address' => $this->request->getVar('address'),
        'ImagePath' => $imgName,
      ]);

      return redirect('voters')->with('success', 'New voter registered successfully.');
    } catch (\Exception $e) {
      return $e->getMessage();
    }
  }

  public function edit($id = null)
  {
    if (!$id)
      return redirect('index');
    $model = new VoterModel();
    $data = $model->where('Id', $id)->first();
    $this->data = ['title' => 'Update voter info', 'errors' => $this->validationErrMessage, 'voter' => $data];
    return view('shared/layouts/Header', $this->data)
      . view('shared/layouts/Nav')
      . view('voters/edit')
      . view('shared/layouts/Footer');
  }

  public function update($id = null)
  {
    try {
      if (!$id) return redirect('index');
      $db = db_connect();
      $model = new VoterModel();
      $validation = \Config\Services::validation();

      $data = [
        'fullname' => $this->request->getVar('fullname'),
        'email' => $this->request->getVar('email'),
        'voter_reg_number' => $this->request->getVar('voter_reg_number'),
        'gender' => $this->request->getVar('gender'),
        'phone_number' => $this->request->getVar('phone_number'),
        'address' => $this->request->getVar('address'),
      ];

      if (!$validation->run($data, 'voterRules')) {
        $this->validationErrMessage = $validation->getErrors();
        return $this->edit($id);
      }
      if ($img = $this->request->getFile('image')) {
        if ($img->isValid() && !$img->hasMoved()) {
          $imgName = $img->getRandomName();
          $img->move('uploads/images', $imgName);
        }
      }
      if (!empty($_FILES['image']['name'])) {
        $prev = $model->select('ImagePath')->find($id);
        if (file_exists("uploads/images/$prev->ImagePath") && !is_null($prev->ImagePath)) {
          unlink("uploads/images/$prev->ImagePath");
        }
        $db->query("UPDATE voters SET ImagePath = '$imgName' WHERE Id = $id");
      }

      $model->update($id, [
        'VoterRegNumber' => $this->request->getVar('voter_reg_number'),
        'Fullname' => $this->request->getVar('fullname'),
        'Email' => $this->request->getVar('email'),
        'PhoneNumber' => $this->request->getVar('phone_number'),
        'Gender' => $this->request->getVar('gender'),
        'Address' => $this->request->getVar('address'),
      ]);

      return redirect('voters')->with('success', 'Voter updated successfully.');
    } catch (\Exception $e) {
      return $e->getMessage();
    }
  }

  public function delete($id = null)
  {
    $model = model(VoterModel::class);
    $model->delete($id);
    return redirect('voters')->with('success', 'Voter deleted successfully.');
  }
}
