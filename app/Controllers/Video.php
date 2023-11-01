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

    public function new()
    {
        $this->data = ['errors' => $this->validationErrMessage];
        return view('shared/layouts/Header', $this->data)
            . view('shared/layouts/nav')
            . view('videos/new',)
            . view('shared/layouts/footer');
    }
    public function edit($id)
    {
    }

    public function create()
    {
        try {
            $model = new VideoModel();
            $validation = \Config\Services::validation();
            $validateData = [
                'Title' => $this->request->getVar('title'),
                'Description' => $this->request->getVar('description'),
                'Image' => $this->request->getVar('image'),
                'Video' => $this->request->getVar('video'),
            ];

            // var_dump($validateData);
            // die();
            // if (!$validation->run($validateData, 'videoRules')) {
            //     $this->validationErrMessage = $validation->getErrors();
            //     return $this->new();
            // }
            if ($img = $this->request->getFile('image')) {
                if ($img->isValid() && !$img->hasMoved()) {
                    $imgName = $img->getRandomName();
                    $img->move('uploads/thumbnails', $imgName);
                }
            }

            if ($video = $this->request->getFile('video')) {
                if ($video->isValid() && !$video->hasMoved()) {
                    $videoName = $video->getRandomName();
                    $video->move('uploads/videos', $videoName);
                }
            }
            $result = $model->save([
                'Title' => $this->request->getVar('title'),
                'Description' => $this->request->getVar('description'),
                'Thumbnail' => $imgName,
                'VideoPath' => $videoName
            ]);

            var_dump($result);
            return redirect('videos')->with('success', 'Upload successfully.');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function update($id)
    {
    }

    public function delete($id)
    {
    }
}
