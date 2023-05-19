<?php require_once APPROOT . '/src/views/include/header.php'; ?>

<main class="mx-5 my-3">
    <h1>Create Contact</h1>
    <form action="<?= URLROOT; ?>/contact/create-contact" method="POST">
        <div class="form-group">
            <label>First Name</label>
            <input type="text" class="form-control" name="first_name" placeholder="Enter first name of contact">
        </div>
        <div class="form-group">
            <label>Last Name</label>
            <input type="text" class="form-control" name="last_name" placeholder="Enter last name of contact">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email" placeholder="Enter email of contact">
        </div>
        <div class="form-group">
            <label>Contact Number</label>
            <input type="number" class="form-control" name="contact_no" placeholder="Enter contact number">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</main>
<?php require_once APPROOT . '/src/views/include/footer.php'; ?>