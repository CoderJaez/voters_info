<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= base_url('voters') ?>">IVoterHub</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?= base_url('voters') ?>">Voters</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('videos') ?>">Videos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="<?= base_url('users') ?>">Users</a>
                </li>
            </ul>
            <div class="d-flex">
                <span class="fw-bold text-primary pe-3"><?= session()->get("fullname") ?></span>
                <a class="nav-link pe-3" href="<?= base_url("auth/logout") ?>">Logout</a>
            </div>
        </div>
    </div>
</nav>