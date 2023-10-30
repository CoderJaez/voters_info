<section class="container">
    <div class="m-3 shadow-sm p-3 mb-5 bg-body-tertiary rounded">
        <h3>Voters</h3>
        <?php if (session()->getFlashdata("success")) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata("success") ?>
            </div>
        <?php endif ?>
        <div class="p-3 d-flex justify-content-between">
            <a href="<?= base_url('voters/new') ?>" class="btn btn-primary" tabindex="-1" role="button">Register new voter</a>
            <form action="<?= base_url('voters') ?>" method="get" class="w-25">
                <input type="text" name="search" id="search" value="<?= $_GET["search"] ?>" class="form-control" placeholder="Search user">
            </form>
        </div>
        <div class="d-flex p-2 flex-wrap">
            <?php foreach ($voters as $voter) : ?>

                <div class="card m-2" style="width: 18rem;">
                    <img src="<?= base_url('uploads/images/' . $voter->ImagePath) ?>" height="150px" class="rounded img-thumbnail" alt="Profile Image">
                    <div class="card-body ">
                        <h6 class="card-title fs-6"><?= ucwords($voter->Fullname) ?></h6>

                        <p class="card-text" style="font-size: .9rem"><?= "<span style='font-weight:bold'>Email: </span>{$voter->Email} <br/>
                    <span style='font-weight:bold'>Contact: </span> {$voter->PhoneNumber} <br/>
                    <span style='font-weight:bold'>Address: </span>$voter->Address" ?></p>


                    </div>
                    <div class="card-footer ">
                        <div class="btn-group">
                            <a href=" <?= base_url('voters/edit/' . $voter->Id) ?>" role="button" class="btn btn-warning btn-sm">Edit</a>
                            <form action="<?= base_url('voters/' . $voter->Id) ?>" method="post">
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</section>