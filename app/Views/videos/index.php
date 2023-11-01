<section class="container mt-5">
    <h3 class="title">Videos</h3>
    <?php if (session()->getFlashdata("success")) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata("success") ?>
        </div>
    <?php endif ?>
    <div class="p-3 d-flex justify-content-between">
        <a href="<?= base_url('videos/new') ?>" class="btn btn-primary" tabindex="-1" role="button">Upload video</a>
        <form action="<?= base_url('videos') ?>" method="get" class="w-25">
            <input type="search" name="search" id="search" value="<?= $_GET["search"] ?>" class="form-control" placeholder="Search user">
        </form>
    </div>
    <div class="d-flex p-2 flex-wrap">
        <?php foreach ($videos as $video) : ?>
            <div class="w-25 p-2">
                <a href="<?= base_url("videos/watch/$video->Id") ?>" class="fw-light text-secondary text-wrap" style=" text-decoration:none">
                    <video class="object-fit-fill" width="100%" height="100%" controls poster=" <?= base_url("uploads/thumbnails/$video->Thumbnail") ?>">
                        <source src="<?= base_url("uploads/videos/$video->VideoPath") ?>">
                        <!-- Add more source elements for different video formats (WebM, Ogg, etc.) as needed -->
                    </video>
                    <h5 class="mt-3"><?= $video->Title ?></h5>
                </a>
                <div class="btn-group">
                    <a href=" <?= base_url('videos/edit/' . $video->Id) ?>" role="button" class="btn btn-warning btn-sm">Edit</a>
                    <form action="<?= base_url('videos/' . $video->Id) ?>" method="post">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </div>
            </div>

        <?php endforeach ?>

    </div>
</section>