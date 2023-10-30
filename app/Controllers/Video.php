<?php

namespace App\Controllers;

use App\Models\VideoModel;

class Video extends BaseController
{
    private $validationErrMessage;
    private $data = [];
    public  function  __construct()
    {
    }

    public function index()
    {
        $model = model(VideoModel::class);
        $videos = $model->findAll();
        $this->data = ["videos" => $videos];
        return view('shared/layouts/Header', $this->data)
            . view('shared/layouts/nav')
            . view('videos/index',)
            . view('shared/layouts/footer');
    }
}
