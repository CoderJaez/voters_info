<section class="container mt-5 d-flex justify-content-center">
    <form action="<?= base_url('videos') ?>" method="POST" class="col-md-5 col-sm col-xs p-5 bg-body-tertiary rounded shadow" enctype="multipart/form-data">
        <h3>Upload video</h3>
        <div class="mb-3">
            <label for="title" class="for-label">Title</label>
            <input type="text" name="title" id="title" value="<?= set_value('title') ?>" class="form-control <?= !$errors['Title'] ?: "is-invalid" ?>">
            <?php if ($errors['Title']) : ?>
                <div class="invalid-feedback">
                    <?= $errors['Title'] ?>
                </div>
            <?php endif ?>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" cols="30" rows="5" class="form-control <?= !$errors['Description'] ?: "is-invalid" ?>">
                <?= set_value("description") ?>
        </textarea>

            <?php if ($errors['Description']) : ?>
                <div class="invalid-feedback">
                    <?= $errors['Description'] ?>
                </div>
            <?php endif ?>
        </div>
        <div class="mb-3">
            <label for="thumbnail" class="form-label">Thumbnail</label>
            <input type="file" name="image" id="thumbnail" value="<?= set_value('thumbnail') ?>" class="form-control <?= !$errors['Thumbnail'] ?: "is-invalid" ?>">
            <?php if ($errors['Thumbnail']) : ?>
                <div class="invalid-feedback">
                    <?= $errors['Thumbnail'] ?>
                </div>
            <?php endif ?>
        </div>
        <div class="mb-3">
            <label for="file" class="form-label">Video</label>
            <input type="file" name="video" id="video" value="<?= set_value("video") ?>" class="form-control <?= !$errors['Video'] ?: "is-invalid" ?>">
            <?php if ($errors['Video']) : ?>
                <div class="invalid-feedback">
                    <?= $errors['Video'] ?>
                </div>
            <?php endif ?>
        </div>
        <button type="submit" class="btn btn-primary float-end">Submit</button>

    </form>
</section>