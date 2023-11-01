<section class="container mt-5 d-flex justify-content-center">
    <form action="<?= base_url('videos') ?>" method="POST" class="col-md-5 col-sm col-xs p-5 bg-body-tertiary rounded shadow" enctype="multipart/form-data">
        <h3>Upload video</h3>
        <div class="mb-3">
            <label for="title" class="for-label">Title</label>
            <input type="text" name="title" id="title" value="<?= set_value('title') ?>" class="form-control <?= !$errors['title'] ?: "is-invalid" ?>">
            <?php if ($errors['title']) : ?>
                <div class="invalid-feedback">
                    <?= $errors['title'] ?>
                </div>
            <?php endif ?>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="desc" id="desc" cols="30" rows="5" class="form-control <?= !$errors['desc'] ?: "is-invalid" ?>"><?= set_value("desc") ?></textarea>

            <?php if ($errors['desc']) : ?>
                <div class="invalid-feedback">
                    <?= $errors['desc'] ?>
                </div>
            <?php endif ?>
        </div>
        <div class="mb-3">
            <label for="thumbnail" class="form-label">Thumbnail</label>
            <input type="file" name="image" id="image" value="<?= set_value('thumbnail') ?>" class="form-control <?= !$errors['image'] ?: "is-invalid" ?>">
            <?php if ($errors['image']) : ?>
                <div class="invalid-feedback">
                    <?= $errors['image'] ?>
                </div>
            <?php endif ?>
        </div>
        <div class="mb-3">
            <label for="file" class="form-label">Video</label>
            <input type="file" name="video" id="video" value="<?= set_value("video") ?>" class="form-control <?= !$errors['video'] ?: "is-invalid" ?>">
            <?php if ($errors['video']) : ?>
                <div class="invalid-feedback">
                    <?= $errors['video'] ?>
                </div>
            <?php endif ?>
        </div>
        <button type="submit" class="btn btn-primary float-end">Submit</button>

    </form>
</section>