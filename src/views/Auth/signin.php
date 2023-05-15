<?php require_once APPROOT . '/src/views/include/header.php'; ?>
<main class="h-100 d-flex flex-column px-5 justify-content-center align-items-center">
    <h2 style="margin-bottom:10px">Paper-trail</h2>
    <h1>Sign in</h1>
    <form action="<?= URLROOT; ?>/auth/signin" method="post">
        <div style="margin: 10px;" class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email"
                name="email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                else. or can we?</small>
        </div>
        <div style="margin: 10px;" class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" placeholder="Password" name="password">
        </div>
        <div class="d-flex flex-column align-items-center">
            <button style="margin-top: 10px;" type="submit" class="btn btn-primary">Log in</button>
            <p>
                No account yet?
                <a href="<?= URLROOT; ?>/auth/signup">Register</a>
            </p>
        </div>
    </form>
</main>
<?php require_once APPROOT . '/src/views/include/footer.php'; ?>