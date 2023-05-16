<?php require_once APPROOT . '/src/views/include/header.php'; ?>

<main>
<h1>Add New Document</h1>
    <?php if (empty(!$errors)): ?>
    <div class = "alert alert-danger">
        <?php foreach($errors as $error): ?>
            <div><?php echo $error?></div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
    <form action = "" method = "post">
        <div class="form-group">
            <label>First Name</label>
            <input type ="text" class="form-control" name = "fname" placeholder="Enter first name of contact">
        </div>
        <div class="form-group">
            <label>Last Name</label>
            <input type ="text" class="form-control" name = "lname" placeholder="Enter last name of contact">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type ="email" class="form-control" name = "email" placeholder="Enter email of contact">
        </div>
        <div class="form-group">
            <label>Contact Number</label>
            <input type ="number" class="form-control" name = "contactNum" placeholder="Enter contact number">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>

</main>

<?php require_once APPROOT . '/src/views/include/footer.php'; ?>