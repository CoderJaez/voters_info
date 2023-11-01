<section class="container w-25 mt-5 shadow p-3 mb-5 bg-body-tertiary rounded">
    <?php if (session()->getFlashdata("error")) : ?>
        <div class="alert alert-danger" role="alert">
            <?= session()->getFlashdata("error") ?>
        </div>
    <?php endif ?>
    <h1>Sign in</h1>
    <form action="<?= base_url('/auth/login') ?>" method="post">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email address</label>
            <input type="email" class="form-control" value="<?= set_value("email") ?>" name="email" />
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" value="<?= set_value("password") ?>" />
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <input type="submit" value="Submit" class="btn btn-primary">
        </div>

    </form>
</section>