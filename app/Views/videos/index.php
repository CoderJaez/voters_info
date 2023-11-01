<?php

use function PHPSTORM_META\type;
?>
<style>
    /* Style for the video container */
    .video-container {
        position: relative;
        padding-bottom: 56.25%;
        /* 16:9 aspect ratio */
        height: 0;
    }

    .video {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }

    li {
        list-style-type: none;
        margin: 10px
    }

    /* Style for sidebar */
    .sidebar {
        height: 500px;
        background-color: #333;
        color: #fff;
        padding: 20px;
        overflow-y: auto;
    }
</style>
<section class="container mt-5">
    <h3 class="title">Videos</h3>
    <?php if (session()->getFlashdata("success")) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata("success") ?>
        </div>
    <?php endif ?>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
        <div class="container">
            <a href="<?= base_url('videos/new') ?>" class="btn btn-primary">Upload new video</a>
            <!-- Search bar -->
            <form class="row g-2">
                <div class="col">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                </div>
                <div class="col">
                    <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
                </div>
            </form>
        </div>
    </nav>

    <div class="row">
        <!-- Video Player -->
        <div class="col-md-8">
            <div class="video-container">
                <video class="video" controls poster="<?= base_url('uploads/images/dummy.png') ?>">
                    <source src="<?= base_url('uploads/videos/demo.mp4') ?>">
                    <!-- Add more source elements for different video formats (WebM, Ogg, etc.) as needed -->
                </video>
            </div>
            <h2 class="mt-3">Video Title</h2>
            <p>Video description goes here.</p>
        </div>
        <!-- Sidebar -->
        <div class="col-md-4">
            <div class="sidebar">
                <ul>
                    <?php foreach ($videos as $video) : ?>
                        <li><a href="#">
                                <div>
                                    <img src="<?= base_url("uploads/thumbnails/$video->Thumbnail") ?>" width="100%" height="200px" alt="">
                                </div>
                            </a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
    </div>
</section>