<?php require_once APPROOT . '/src/views/include/header.php'; ?>

<main class = "mx-5 my-3">
<h1>Create Contact</h1>
<p>
    <a href="<?=URLROOT; ?>/contact/create" button class="btn btn-success">Create contact</button></a>
</p>
<<<<<<< HEAD

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

=======
<form action = "<?= URLROOT; ?>/contact/create-contact" method = "POST">
    <div class="form-group">
        <label>First Name</label>
        <input type ="text" class="form-control" name = "first_name" placeholder="Enter first name of contact">
    </div>
    <div class="form-group">
        <label>Last Name</label>
        <input type ="text" class="form-control" name = "last_name" placeholder="Enter last name of contact">
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type ="email" class="form-control" name = "email" placeholder="Enter email of contact">
    </div>
    <div class="form-group">
        <label>Contact Number</label>
        <input type ="number" class="form-control" name = "contact_no" placeholder="Enter contact number">
    </div>
    <br>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
>>>>>>> 09dd06044518e9327c0afc59d6e2d2354e59220c
</main>
<?php require_once APPROOT . '/src/views/include/footer.php'; ?>