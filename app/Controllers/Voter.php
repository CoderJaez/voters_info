<?php

namespace App\Controllers;

class Voter extends BaseController
{

  public function __construct()
  {
  }

  public function index()
  {
    return view('shared/layouts/Header')
      . view('shared/layouts/Nav')
      . view('voters/index')
      . view('shared/layouts/Footer');
  }

  public function show($id = null)
  {
  }

  public function new()
  {
  }

  public function create()
  {
  }

  public function edit($id = null)
  {
  }

  public function update($id = null)
  {
  }

  public function delete($id = null)
  {
  }
}