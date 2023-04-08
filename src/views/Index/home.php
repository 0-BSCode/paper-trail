<?php require_once APPROOT . '/src/views/include/header.php'; ?>
<main class="d-flex p-5 gap-3">
    <section class="flex-grow-1">
        <h2>
            Updates
        </h2>
        <p>
            No udpates yet.
        </p>
    </section>
    <section class="flex-grow-1">
        <h1>Grievances</h1>
        <a class="btn btn-primary" type="button" href="<?= URLROOT; ?>/ticket/create">Create</a>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Category</th>
                    <th scope="col">Status</th>
                    <th scope="col">Created At</th>
                </tr>
            </thead>
            <?php if ($data): ?>
                <tbody>
                    <?php foreach ($data as $ticket): ?>
                        <tr>
                            <th scope="row">
                                <?= $ticket->ticket_id; ?>
                            </th>
                            <td class="card">
                                <a class="stretched-link" href="<?= URLROOT; ?>/ticket/<?= $ticket->ticket_id; ?>/view-ticket">
                                    <?= $ticket->title; ?>
                                </a>
                            </td>
                            <td>
                                <?= $ticket->name; ?>
                            </td>
                            <td>
                                <?= $ticket->status; ?>
                            </td>
                            <td>
                                <?= $ticket->date_created; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            <?php else: ?>
                <p>No grievances filed.</p>
            <?php endif; ?>
        </table>
    </section>
</main>

<?php require_once APPROOT . '/src/views/include/footer.php'; ?>