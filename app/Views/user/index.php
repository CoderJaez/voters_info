<section class="container">
    <div class="m-3 shadow-sm p-3 mb-5 bg-body-tertiary rounded">
        <div class="p-3 d-flex justify-content-between">
            <a href="<?= base_url('users/new') ?>" class="btn btn-primary">New User</a>
            <form action="" method="post" class="w-25">
                <input type="text" name="search" id="search" class="form-control" placeholder="Search user">
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
            <tbody></tbody>
        </table>
    </div>
</section>