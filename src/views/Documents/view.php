<?php require_once APPROOT . '/src/views/include/header.php'; ?>
<main>
    <h1>School Memorandum and Significant Documents</h1>
    <p>
        <a href = "<?= URLROOT; ?>/document/create" button class="btn btn-success">Add a new document</button></a>
    </p>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Document ID</th>
      <th scope="col">Name</th>
      <th scope="col">Link to Document</th>
      <th scope="col">Description</th>
      <th scope="col">Date Created</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
    <?php foreach($data['documents'] as $i => $document){?>
    <tr>
    <th scope="row"><?php echo $i+1?></th>
      <td scope="row"><?php echo $document->name?></td>
      <td scope="row"><?php echo $document->link?></td>
      <td scope="row"><?php echo $document->description?></td>
      <td scope="row"><?php echo $document->date_created?></td>
      <td>
        <form method="post" action = "<?= URLROOT; ?>/document/delete">
          <input type = "hidden" name="document_id" value="<?php echo $document->document_id?>">
          <button type = "submit" class="btn btn-sm btn-outline-danger">Delete</button>
        </form>
      </td>

    </tr>
    <?php }?>
    </tbody>
    </table>
</main>
<?php require_once APPROOT . '/src/views/include/footer.php'; ?>