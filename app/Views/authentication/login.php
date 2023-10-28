<section class="container w-25 mt-5 shadow p-3 mb-5 bg-body-tertiary rounded">
    <h1>Sign in</h1>
    <form action="<?= base_url('auth/login') ?>" method="post">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email address</label>
            <input type="email" class="form-control" name="email" />
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" />
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <input type="submit" value="Submit" class="btn btn-primary">
        </div>

    </form>
</section>