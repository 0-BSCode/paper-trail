<?php require_once APPROOT . '/src/views/include/header.php'; ?>
<main class="d-flex p-5 gap-3">
    <section class="flex-grow-1">
        <h2>
            Updates
        </h2>
        <?php if ($data['update']): ?>
            <div class="d-flex flex-column gap-3 pe-3">
                <?php foreach ($data['update'] as $update): ?>
                    <div class="card">
                        <div class="card-body">
                            <p class="card-title">
                                <b>
                                    <?= $update->first_name . " " . $update->last_name; ?>
                                </b>
                                <?php if ($update->action_type === 'CREATE'): ?>
                                    created a
                                <?php elseif ($update->action_type === 'UPDATE'): ?>
                                    updated a
                                <?php elseif ($update->action_type === 'COMMENT'): ?>
                                    commented on your
                                <?php endif; ?>
                                ticket:
                                <a class="stretched-link text-decoration-none"
                                    href="<?= URLROOT; ?>/ticket/<?= $update->ticket_id; ?>/view-ticket">
                                    <i>
                                        <?= $update->title; ?>
                                    </i>
                                </a>
                            </p>
                            <p class="card-subtitle text-muted">
                                <?= $update->date_created; ?>
                            </p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p>
                No udpates yet.
            </p>
        <?php endif; ?>
    </section>
    <section class="flex-grow-1">
        <h1>Grievances</h1>
        <a class="btn btn-primary" type="button" href="<?= URLROOT; ?>/ticket/create">Create</a>
        <?php if ($data['ticket']): ?>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Category</th>
                        <th scope="col">Status</th>
                        <?php if ($_SESSION['role'] === 'organization'): ?>
                            <th scope="col">Created By</th>
                        <?php endif; ?>
                        <th scope="col">Created At</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['ticket'] as $ticket): ?>
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
                                <?= $ticket->category_name; ?>
                            </td>
                            <td>
                                <?= $ticket->status_name; ?>
                            </td>
                            <?php if ($_SESSION['role'] === 'organization'): ?>
                                <td scope="col">
                                    <?= $ticket->first_name . ' ' . $ticket->last_name; ?>
                                    </th>
                                <?php endif; ?>
                            <td>
                                <?= $ticket->date_created; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No grievances filed.</p>
        <?php endif; ?>
    </section>
</main>
<?php require_once APPROOT . '/src/views/include/footer.php'; ?>