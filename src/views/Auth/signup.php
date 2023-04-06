<?php require_once APPROOT . '/src/views/include/header.php'; ?>
<h1>Sign Up</h1>
<p>Create an Account</p>
<form action="<?= URLROOT; ?>/auth/register" method="post">
    <input type="text" name="username" placeholder="Username">
    <input type="email" name="email" placeholder="Email">
    <input type="password" name="password" placeholder="Password">
    <input type="submit" value="Register">
</form>
<main class="h-100 d-flex flex-column px-5 justify-content-center align-items-center">
    <h1>Search User</h1>
    <form action="<?= URLROOT; ?>/auth/register" method="post">
        <div class="d-flex gap-3 justify-content-between">
            <div class="form-group">
                <label for="first_name">First name</label>
                <input type="text" class="form-control" id="first_name" aria-describedby="firstNameHelp"
                    placeholder="Enter first name" name="first_name">
            </div>
            <div class="form-group">
                <label for="last_name">Last name</label>
                <input type="text" class="form-control" id="last_name" aria-describedby="lastNameHelp"
                    placeholder="Enter last name" name="last_name">
            </div>
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email"
                name="email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                else.</small>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" placeholder="Password" name="password">
        </div>
        <div class="d-flex flex-column align-items-center">
            <button type="submit" class="btn btn-primary">Log in</button>
            <p>
                Already have an account?
                <a href="<?= URLROOT; ?>/auth/signin">Register</a>
            </p>
        </div>
    </form>
</main>
<?php require_once APPROOT . '/src/views/include/footer.php'; ?>