<?php require_once APPROOT . '/src/views/include/header.php'; ?>
<main class="h-100 d-flex flex-column px-5 justify-content-center align-items-center">
    <h1>Sign in</h1>
    <form action="<?= URLROOT; ?>/auth/signin" method="post">
        <div class="form-group mb-3">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email"
                name="email">
        </div>
        <div class="form-group mb-3">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" placeholder="Password" name="password">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                else.</small>
        </div>
        <div class="d-flex flex-column align-items-center">
            <button type="submit" class="btn btn-primary mb-1">Log in</button>
            <p>
                No account yet?
                <a href="<?= URLROOT; ?>/auth/signup">Register</a>
            </p>
        </div>
    </form>
</main>
<?php require_once APPROOT . '/src/views/include/footer.php'; ?>