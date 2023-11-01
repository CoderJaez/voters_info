<?php

namespace App\Controllers;

use App\Models\VideoModel;
use App\Models\VoterModel;

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
        $search = $this->request->getVar("search")  ?? "";

        $videos = $model->like("Title", "%$search%")->findAll();
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
        $model = model(VideoModel::class);
        if (!$id) {
            $this->data = ['message' => 'Video not found.', 'link' => 'videos'];
            return view('shared/layouts/Header', $this->data)
                . view('404',)
                . view('shared/layouts/footer');
        }
        $video = $model->where("Id", $id)->first();
        if (!$video) {
            $this->data = ['message' => 'Video not found.', 'link' => 'videos'];
            return view('shared/layouts/Header', $this->data)
                . view('404',)
                . view('shared/layouts/footer');
        }
        $this->data = ["video" => $video];
        return view('shared/layouts/Header', $this->data)
            . view('shared/layouts/nav')
            . view('videos/edit')
            . view('shared/layouts/footer');
    }

    public function create()
    {
        try {
            $model = new VideoModel();
            $validation = \Config\Services::validation();
            $validateData = [
                'title' => $this->request->getVar('title'),
                'desc' => $this->request->getVar('desc'),
                'image' => $this->request->getFile('image'),
                'video' => $this->request->getFile('video'),
            ];

            if (!$validation->run($validateData, 'videoRules')) {
                $this->validationErrMessage = $validation->getErrors();
                return $this->new();
            }
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
            $model->save([
                'Title' => $this->request->getVar('title'),
                'Description' => $this->request->getVar('desc'),
                'Thumbnail' => $imgName,
                'VideoPath' => $videoName
            ]);

            return redirect('videos')->with('success', 'Upload successfully.');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function update($id)
    {
        $model = new VideoModel();
        $db = db_connect();
        $prev = $model->where("Id", $id)->first();

        $validation = \Config\Services::validation();
        $validateData = [
            'title' => $this->request->getVar('title'),
            'desc' => $this->request->getVar('desc'),
        ];

        if (!$validation->run($validateData, 'updateVideoRules')) {
            $this->validationErrMessage = $validation->getErrors();
            return $this->new();
        }
        if ($img = $this->request->getFile('image')) {
            if ($img->isValid() && !$img->hasMoved()) {
                $imgName = $img->getRandomName();
                $img->move('uploads/thumbnails', $imgName);
            }
        }

        if ($video = $this->request->getFile('video')) {
            if ($video->isValid() && !$video->hasMoved()) {
                $videoName = $video->getRandomName();
                $video->move('uploads/videos/', $videoName);
            }
        }
        if (!empty($_FILES['image']['name'])) {
            if (file_exists("uploads/thumbnails/$prev->Thumbnail") && !is_null($prev->Thumbnail)) {
                unlink("uploads/thumbnails/$prev->Thumbnail");
            }
            $db->query("UPDATE videos SET Thumbnail = '$imgName' WHERE Id = $id");
        }


        if (!empty($_FILES['video']['name'])) {
            if (file_exists("uploads/videos/$prev->VideoPath") && !is_null($prev->VideoPath)) {
                unlink("uploads/videos/$prev->VideoPath");
            }
            $db->query("UPDATE videos SET VideoPath = '$videoName' WHERE Id = $id");
        }

        $model->update($id, [
            'Title' => $this->request->getVar('title'),
            'Description' => $this->request->getVar('desc'),
        ]);
        return redirect('videos')->with('success', 'Videos updated successfully.');
    }

    public function delete($id)
    {
        $model = model(VideoModel::class);
        $video = $model->where("Id", $id)->first();
        if ($video) {
            unlink("uploads/thumbnails/$video->Thumbnail");
            unlink("uploads/videos/$video->VideoPath");
            $model->delete($id);
        }
        return redirect('videos')->with('success', 'Videos deleted successfully.');
    }

    public function watch($id = null)
    {
        $model = new VideoModel();
        if (!$id) {
            $this->data = ['message' => 'Video not found.', 'link' => 'videos'];
            return view('shared/layouts/Header', $this->data)
                . view('404',)
                . view('shared/layouts/footer');
        }

        $watch_video = $model->where('Id', $id)->first();
        if (!$watch_video) {
            $this->data = ['message' => 'Video not found.', 'link' => 'videos'];
            return view('shared/layouts/Header', $this->data)
                . view('404',)
                . view('shared/layouts/footer');
        }
        $videos = $model->where('Id !=', $id)->find();
        $this->data = ['watch' => $watch_video, 'videos' => $videos];

        return view('shared/layouts/Header', $this->data)
            . view('shared/layouts/nav')
            . view('videos/watch',)
            . view('shared/layouts/footer');
    }
}
