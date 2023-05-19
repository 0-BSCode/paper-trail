<?php require_once APPROOT . '/src/views/include/header.php'; ?>

<main class="mx-5 my-3">
    <h1>School Directory</h1>
    <p>
        <a href="<?= URLROOT; ?>/contact/create" button class="btn btn-success">Add a new contact</button></a>
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
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['contacts'] as $contact) { ?>
                <tr>
                    <th scope="row">
                        <?= $contact->contact_id; ?>
                    </th>
                    <td scope="row">
                        <?= $contact->first_name ?>
                    </td>
                    <td scope="row">
                        <a href="<?= URLROOT; ?>/contact/<?= $contact->contact_id; ?>/view-contact">
                            <?= $contact->last_name; ?>
                        </a>
                    </td>
                    <td scope="row">
                        <?= $contact->email ?>
                    </td>
                    <td scope="row">
                        <?= $contact->contact_no ?>
                    </td>
                    <td>
                        <form method="post" action="<?= URLROOT; ?>/contact/delete-contact">
                            <input type="hidden" name="contact_id" value="<?php echo $contact->contact_id ?>">
                            <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                        </form>
                    </td>
                    </td>

                </tr>
            <?php } ?>
        </tbody>
    </table>
</main>
<?php require_once APPROOT . '/src/views/include/footer.php'; ?>