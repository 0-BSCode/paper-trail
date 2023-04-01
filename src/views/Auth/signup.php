<?php require_once APPROOT . '/src/views/include/header.php'; ?>
<h1>Sign Up</h1>
<p>Create an Account</p>
<form action="<?= URLROOT; ?>/auth/register" method="post">
    <input type="text" name="username" placeholder="Username">
    <input type="email" name="email" placeholder="Email">
    <input type="password" name="password" placeholder="Password">
    <input type="submit" value="Register">
</form>
<?php require_once APPROOT . '/src/views/include/footer.php'; ?>