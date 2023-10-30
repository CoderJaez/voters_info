<section class="container mt-5 d-flex justify-content-center">
    <form class="col-md-5 col-sm col-xs p-5 bg-body-tertiary rounded shadow " method="post" action="<?= base_url('users/' . $user->Id) ?>">
        <input type="hidden" name="_method" value="PUT">
        <h3><?= $title ?></h3>
        <div class="mb-3">
            <label for="fullname" class="form-label">Fullname:</label>
            <input type="text" name="fullname" value="<?= set_value('fullname', $user->Fullname) ?>" class="form-control <?= !$errors['fullname'] ?: "is-invalid" ?>" />
            <?php if ($errors['fullname']) : ?>
                <div class="invalid-feedback">
                    <?= $errors['fullname'] ?>
                </div>
            <?php endif ?>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" value="<?= set_value('email', $user->Email) ?>" class="form-control <?= !$errors['email'] ?: "is-invalid" ?>" id="email" name="email" />
            <?php if ($errors['email']) : ?>
                <div class="invalid-feedback">
                    <?= $errors['email'] ?>
                </div>
            <?php endif ?>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" value="<?= set_value('password') ?>" class="form-control <?= !$errors['password'] ?: "is-invalid" ?>" id="exampleInputPassword1" />
            <?php if ($errors['password']) : ?>
                <div class="invalid-feedback">
                    <?= $errors['password'] ?>
                </div>
            <?php endif ?>
        </div>
        <div class="mb-3">
            <label for="confirm_password" class="form-label">Confirm Password:</label>
            <input type="password" name="confirm_password" value="<?= set_value('confirm_password') ?>" class="form-control <?= !$errors['confirm_password'] ?: "is-invalid" ?>" name="confirm_password" id="confirm_password">
            <?php if ($errors['confirm_password']) : ?>
                <div class="invalid-feedback">
                    <?= $errors['confirm_password'] ?>
                </div>
            <?php endif ?>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</section>