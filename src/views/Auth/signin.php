<?php require_once APPROOT . '/src/views/include/header.php'; ?>
<h1>Search User</h1>
<form action="<?= URLROOT; ?>/auth/signin" method="post">
    <input type="text" name="email" placeholder="Email">
    <input type="password" name="password" placeholder="Password">
    <input type="submit" value="Sign in">
</form>

<?php require_once APPROOT . '/src/views/include/footer.php'; ?>