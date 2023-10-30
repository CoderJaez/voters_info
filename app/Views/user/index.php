<section class="container">
    <div class="m-3 shadow-sm p-3 mb-5 bg-body-tertiary rounded">
        <h3>Users</h3>
        <?php if (session()->getFlashdata("success")) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata("success") ?>
            </div>
        <?php endif ?>
        <div class="p-3 d-flex justify-content-between">
            <a href="<?= base_url('users/new') ?>" class="btn btn-primary">New User</a>
            <form action="<?= base_url('users') ?>" method="get" class="w-25">
                <input type="text" name="search" value="<?= $_GET["search"] ?>" id="search" class="form-control" placeholder="Search user">
            </form>
        </div>
        <table class="table table-stripped mt-3">
            <thead>
                <th>Fullname</th>
                <th>Email</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php foreach ($users as $user) : ?>
                    <tr>
                        <td><?= ucwords($user->Fullname) ?></td>
                        <td><?= $user->Email ?></td>
                        <td><?= $user->CreatedAt ?></td>
                        <td><?= $user->UpdatedAt ?></td>
                        <td>
                            <div class="btn-group">
                                <a href="<?= base_url('users/edit/' . $user->Id) ?>" class="btn btn-warning btn-sm">Edit</a>
                                <form action="<?= base_url('users/' . $user->Id) ?>" method="post">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</section>