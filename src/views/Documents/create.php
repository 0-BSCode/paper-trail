<?php require_once APPROOT . '/src/views/include/header.php'; ?>
<main class="mx-5 my-3">
    <h1>Add New Document</h1>
    <form action="<?= URLROOT; ?>/document/create-document" method="POST">
        <div class="form-group mb-3">
            <label>Document Name</label>
            <input type="text" class="form-control" name="name" placeholder="Enter title of document">
        </div>
        <div class="form-group mb-3">
            <label>Link to announcement</label>
            <input type="url" class="form-control" name="link" placeholder="Enter link where you found the post">
        </div>
        <div class="form-group mb-3">
            <label>Description</label>
            <textarea class="form-control" name="description" placeholder="Enter short description"></textarea>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</main>
<?php require_once APPROOT . '/src/views/include/footer.php'; ?>