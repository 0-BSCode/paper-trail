<?php require_once APPROOT . '/src/views/include/header.php'; ?>
<h1>Search User</h1>
<form action="<?= URLROOT; ?>/auth/signin" method="post">
    <input type="text" name="email" placeholder="Email">
    <input type="password" name="password" placeholder="Password">
    <input type="submit" value="Sign in">
</form>
<div>
    <?php if ($data): ?>
        <p>
            <b>Name: </b>
            <?= $data['username']; ?>
        </p>
        <p>
            <b>Email: </b>
            <?= $data['email']; ?>
        </p>
    <?php endif; ?>
</div>
<div class="dropdown show">
    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        Dropdown link
    </a>

    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
        <a class="dropdown-item" href="#">Action</a>
        <a class="dropdown-item" href="#">Another action</a>
        <a class="dropdown-item" href="#">Something else here</a>
    </div>
</div>

<?php require_once APPROOT . '/src/views/include/footer.php'; ?>