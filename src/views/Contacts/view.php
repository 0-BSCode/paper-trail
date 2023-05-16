<?php require_once APPROOT . '/src/views/include/header.php'; ?>

<main>
    <h1>School Directory</h1>

    <div class="btn-group">
        <p>
            <a href = "<?= URLROOT; ?>/Contacts/create" button class="btn btn-success">Add a new contact</button></a>
        </p>
        <div class="input-group">
            <div class="form-outline">
                <input type="search" id="form1" class="form-control" placeholder="Search contact" />
                <!-- <label class="form-label" for="form1">Search</label> -->
            </div>
            <button type="button" class="btn btn-primary">
                <i class="fas fa-search">Go</i>
            </button>
        </div>


    </div>

    <table class="table">
    <thead>
    <tr>
    <th scope="col">Contact ID</th>
    <th scope="col">First Name</th>
    <th scope="col">Last Name</th>
    <th scope="col">Email Address</th>
    <th scope="col">Contact Number</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($contacts as $i => $contact){?>
    <tr>
    <th scope="row"><?php echo $i+1?></th>
    <td scope="row"><?php echo $contact['first_name']?></td>
    <td scope="row"><?php echo $contact['last_name']?></td>
    <td scope="row"><?php echo $contact['email']?></td>
    <td scope="row"><?php echo $contact['contact_no']?></td>
    </tr>
    <?php }?>
    </tbody>
    </table>

</main>


<?php require_once APPROOT . '/src/views/include/footer.php'; ?>