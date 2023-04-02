<?php require_once APPROOT . '/src/views/include/header.php'; ?>
<h1>Search User</h1>
<form action="<?= URLROOT; ?>/auth/signin" method="post">
    <input type="text" name="email" placeholder="Email">
    <input type="password" name="password" placeholder="Password">
    <input type="submit" value="Sign in">
</form>
<div>
    <?php if ($data): ?>
        <?php print_r($data); ?>
        <p>
            <b>Name: </b>
            <?= $data['username']; ?>
        </p>
        <p>
            <b>Email: </b>
            <?= $data['email']; ?>
        </p>
    <?php else: ?>
        <p>No user with those credentials</p>
    <?php endif; ?>
</div>