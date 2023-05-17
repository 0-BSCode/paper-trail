<?php require_once APPROOT . '/src/views/include/header.php'; ?>

<main>
    <h1>School Directory</h1>
    <p>
        <a href = "<?= URLROOT; ?>/contact/create" button class="btn btn-success">Add a new contact</button></a>
    </p>

    </div>

    <table class="table">
    <thead>
        <tr>
            <th scope="col">Contact ID</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Email Address</th>
            <th scope="col">Contact Number</th>
            <th scope="col">Action</th>>
        </tr>
    </thead>
    <tbody>
    <?php foreach($data['contacts'] as $i => $contact){?>
        <tr>
        <th scope="row">
      <?= $contact->contact_id;?>
        </th>
                <td scope="row"><?php echo $contact->first_name?></td>
            <td scope="row"><?php echo $contact->last_name?></td>
            <td scope="row"><?php echo $contact->email?></td>
            <td scope="row"><?php echo $contact->contact_no?></td>
            <td>
            <form method="post" action = "<?= URLROOT; ?>/contact/delete">
                <input type = "hidden" name="document_id" value="<?php echo $contact->contact_id?>">
                <button type = "submit" class="btn btn-sm btn-outline-danger">Delete</button>

                <!-- <button a href = "delete.php?id=<?php echo $record['ID']?>" class="btn btn-sm btn-outline-danger">Delete</button> -->

            </form>    
    </td>

        </tr>
    <?php }?>
    </tbody>
    </table>

</main>


<?php require_once APPROOT . '/src/views/include/footer.php'; ?>