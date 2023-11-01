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
            <a href="<?= base_url('videos/new') ?>" class="btn btn-primary">Upload video</a>
            <!-- Search bar -->
            <form class="row g-2" action="<?= base_url('videos') ?>">
                <div class="col">
                    <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
                </div>

            </form>
        </div>
    </nav>

    <div class="row">
        <!-- Video Player -->
        <div class="col-md-8">
            <div class="video-container">
                <video class="video" controls poster="<?= base_url("uploads/thumbnails/$watch->Thumbnail") ?>">
                    <source src="<?= base_url("uploads/videos/$watch->VideoPath") ?>">
                    <!-- Add more source elements for different video formats (WebM, Ogg, etc.) as needed -->
                </video>
            </div>
            <h2 class="mt-3"><?= $watch->Title ?></h2>
            <p><?= $watch->Description ?></p>
        </div>
        <!-- Sidebar -->
        <div class="col-md-4">
            <div class="sidebar">
                <ul>
                    <?php foreach ($videos as $video) : ?>
                        <li>
                            <div class="d-flex justify-content">
                                <a href="<?= base_url("videos/watch/$video->Id") ?>">
                                    <img src="<?= base_url("uploads/thumbnails/$video->Thumbnail") ?>" width="100px" height="100px" alt="">
                                </a><span class="p-3 fw-bold text-md-end text-wrap"><?= $video->Title ?></span>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
    </div>
</section>