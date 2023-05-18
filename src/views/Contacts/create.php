<?php require_once APPROOT . '/src/views/include/header.php'; ?>

<main class = "mx-5 my-3">
<h1>Create Contact</h1>
<p>
    <a href="<?=URLROOT; ?>/contact/create" button class="btn btn-success">Create contact</button></a>
</p>

    <form action = "<?= URLROOT; ?>/contact/create-contact" method = "POST">
        <div class="form-group mb-3 w-50">
            <label>First Name</label>
            <input type ="text" class="form-control" name = "first_name" placeholder="Enter first name of contact">
        </div>
        <div class="form-group mb-3 w-50">
            <label>Last Name</label>
            <input type ="text" class="form-control" name = "last_name" placeholder="Enter last name of contact">
        </div>
        <div class="form-group mb-3 w-50">
            <label>Email</label>
            <input type ="email" class="form-control" name = "email" placeholder="Enter email of contact">
        </div>
        <div class="form-group mb-3 w-50">
            <label>Contact Number</label>
            <input type ="number" class="form-control" name = "contact_no" placeholder="Enter contact number">
        </div>
        <div>
        <button type="submit" class="btn btn-primary h-25">Submit</button>
        </div>

</main>

<?php require_once APPROOT . '/src/views/include/footer.php'; ?>