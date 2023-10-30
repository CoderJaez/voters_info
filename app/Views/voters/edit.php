<section class="container mt-5 d-flex justify-content-center">
    <form class="col-md-5 col-sm col-xs p-5 bg-body-tertiary rounded shadow " method="post" action="<?= base_url('voters/' . $voter->Id) ?>" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="PUT">

        <h3><?= $title ?></h3>
        <div class="mb-3">
            <label for="voter_reg_number" class="form-label">Regisraion Number:</label>
            <input type="text" readonly name="voter_reg_number" value="<?= set_value('voter_reg_number', $voter->VoterRegNumber) ?>" class="form-control <?= !$errors['voter_reg_number'] ?: "is-invalid" ?>" />
            <?php if ($errors['voter_reg_number']) : ?>
                <div class="invalid-feedback">
                    <?= $errors['voter_reg_number'] ?>
                </div>
            <?php endif ?>
        </div>
        <div class="mb-3">
            <label for="fullname" class="form-label">Fullname:</label>
            <input type="text" name="fullname" value="<?= set_value('fullname', $voter->Fullname) ?>" class="form-control <?= !$errors['fullname'] ?: "is-invalid" ?>" />
            <?php if ($errors['fullname']) : ?>
                <div class="invalid-feedback">
                    <?= $errors['fullname'] ?>
                </div>
            <?php endif ?>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" value="<?= set_value('email', $voter->Email) ?>" class="form-control <?= !$errors['email'] ?: "is-invalid" ?>" id="email" name="email" />
            <?php if ($errors['email']) : ?>
                <div class="invalid-feedback">
                    <?= $errors['email'] ?>
                </div>
            <?php endif ?>
        </div>

        <div class="mb-3">
            <label for="gender" class="form-label">Gender:</label>
            <select name="gender" id="gender" class="form-control <?= !$errors['gender'] ?: "is-invalid" ?>">
                <option value="" selected disabled>Select Gender</option>
                <option value="Male" <?= $voter->Gender == "Malle" ?? "selected" ?>>Male</option>
                <option value="Female" <?= $voter->Gender == "Female" ?? "selected" ?>>Female</option>
            </select>
            <?php if ($errors['gender']) : ?>
                <div class="invalid-feedback">
                    <?= $errors['gender'] ?>
                </div>
            <?php endif ?>

        </div>

        <div class="mb-3">
            <label for="phone_number" class="form-label">Phone Numner</label>
            <input type="text" placeholder="09234556777" name="phone_number" value="<?= set_value('phone_number', $voter->PhoneNumber) ?>" id="phone_number" class="form-control <?= !$errors['phone_number'] ?: "is-invalid" ?>">
            <?php if ($errors['phone_number']) : ?>
                <div class="invalid-feedback">
                    <?= $errors['phone_number'] ?>
                </div>
            <?php endif ?>
        </div>

        <div class="mb-3">
            <label for="Address" class="form-label">Address:</label>
            <textarea name="address" id="address" cols="30" rows="5" class="form-control <?= !$errors['address'] ?: "is-invalid" ?>">
            <?= set_value('address', $voter->Address) ?></textarea>
            <?php if ($errors['address']) : ?>
                <div class="invalid-feedback">
                    <?= $errors['address'] ?>
                </div>
            <?php endif ?>
        </div>

        <div class="mb-3"><label for="image" class="form-label">Upload image</label>
            <input type="file" name="image" value="<?= set_value('image') ?>" id="imageg" class="form-control <?= !$errors['image'] ?: "is-invalid" ?>">
            <?php if ($errors['image']) : ?>
                <div class="invalid-feedback">
                    <?= $errors['image'] ?>
                </div>
            <?php endif ?>
        </div>

        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</section>