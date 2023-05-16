<?php require_once APPROOT . '/src/views/include/header.php'; ?>
<main>
    <h1>School Memorandum and Significant Documents</h1>
    <p>
        <a href = "uploadDoc.php" button class="btn btn-success">Add a new document</button></a>
    </p>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Document ID</th>
      <th scope="col">Name</th>
      <th scope="col">Link to Document</th>
      <th scope="col">Description</th>
      <th scope="col">Date Created</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($documents as $i => $document){?>
    <tr>
      <th scope="row"><?php echo $i+1?></th>
      <td scope="row"><?php echo $document['name']?></td>
      <td scope="row"><?php echo $document['linktoDoc']?></td>
      <td scope="row"><?php echo $document['description']?></td>
      <td scope="row"><?php echo $document['date_created']?></td>
    </tr>
    <?php }?>
  </tbody>
</table>
  
</main>
<?php require_once APPROOT . '/src/views/include/footer.php'; ?>