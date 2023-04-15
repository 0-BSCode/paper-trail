<?php require_once APPROOT . '/src/views/include/header.php'; ?>
<main class="px-5 py-3">
    <h1>
        View Ticket
    </h1>
    <section class="d-flex gap-5">
        <div class="flex-grow-1 position-relative">
            <?php if ($data): ?>
                <form class="position-sticky w-100">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" id="title" placeholder="Juan de la Cruz"
                            disabled value="<?= $data['ticket']['title']; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Category</label>
                        <select class="form-select form-select-md mb-3" name="category_id"
                            aria-label=".form-select-lg example" disabled>
                            <option selected value="<?= $data['ticket']['category_id']; ?>"><?= $data['ticket']['category_name']; ?>
                            </option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" name="description" id="description"
                            rows="10"><?= $data['ticket']['description']; ?></textarea>
                    </div>
                </form>
                <?php if ($_SESSION['role'] === 'student'): ?>
                    <a type="button" class="btn btn-primary"
                        href="<?= URLROOT; ?>/ticket/<?= $data['ticket']['ticket_id']; ?>/edit-ticket">Edit</a>
                    <form class="mt-3">
                        <label class="form-label">Status</label>
                        <select class="form-select form-select-md text-uppercase" name="status"
                            aria-label=".form-select-lg example" disabled>
                            <option>
                                <?= $data['ticket']['status_name']; ?>
                            </option>
                        </select>
                        <small id="statusHelpBlock" class="form-text text-muted">
                            <?= $data['ticket']['status_description']; ?>
                        </small>
                    </form>
                <?php else: ?>
                    <form class="mb-3" action="<?= URLROOT; ?>/ticket/<?= $data['ticket']['ticket_id'] ?>/update-ticket-status"
                        method="POST">
                        <label class="form-label">Status</label>
                        <select class="form-select form-select-md text-uppercase" name="status_id"
                            aria-label=".form-select-lg example">
                            <?php foreach ($data['statuses'] as $status): ?>
                                <option class="text-uppercase" value="<?= $status->status_id; ?>" <?php echo ($status->name === $data['ticket']['status_name']) ? 'selected' : ''; ?>>
                                    <?= $status->name; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <small id="statusHelpBlock" class="form-text text-muted">
                            <?= $data['ticket']['status_description']; ?>
                        </small>
                        <button type="submit" class="btn btn-primary d-block mt-3">
                            Update
                        </button>
                    </form>
                <?php endif; ?>
            <?php else: ?>
                <p>Error fetching data.</p>
            <?php endif; ?>
        </div>
        <div class="flex-grow-1">
            <h2>
                Comments
            </h2>
            <?php foreach ($data['comments'] as $comment): ?>
                <form class="d-flex flex-column rounded-3 border me-5 p-3">
                    <div class="d-flex gap-3">
                        <p>
                            P
                        </p>
                        <div class="d-flex flex-column">
                            <p>
                                <?= $comment->first_name . ' ' . $comment->last_name; ?>
                            </p>
                            <p>
                                <?= $comment->date_created; ?>
                            </p>
                        </div>
                    </div>
                    <textarea class="form-control" name="description" id="description" rows="4"
                        readonly><?= $comment->description; ?></textarea>
                </form>
            <?php endforeach; ?>
            <form class="d-flex flex-column rounded-3 border me-5 p-3" action="<?= URLROOT; ?>/comment/create-comment"
                method="POST">
                <input type="hidden" name="ticket_id" value="<?= $data['ticket']['ticket_id']; ?>">
                <div class="d-flex gap-3">
                    <p>
                        P
                    </p>
                    <div class="d-flex flex-column">
                        <p>
                            <?= $_SESSION['user_name']; ?>
                        </p>
                    </div>
                </div>
                <textarea class="form-control" name="description" id="description" rows="4"
                    placeholder="Thoughts here..."></textarea>
                <div class="d-flex justify-content-end mt-2">
                    <button type="submit" class="btn btn-primary">
                        Comment
                    </button>
                </div>
            </form>
        </div>
    </section>
    <section>
        <h3>
            Updates
        </h3>
        <?php if ($data["updates"]): ?>
            <div class="d-flex flex-column gap-2">
                <?php foreach ($data["updates"] as $update): ?>
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text">
                                <b>
                                    <?= $update->first_name . ' ' . $update->last_name; ?>
                                </b>
                                <?php if ($update->action_type === 'CREATE'): ?>
                                    created the ticket.
                                <?php elseif ($update->action_type === 'UPDATE'): ?>
                                    updated the ticket.
                                <?php elseif ($update->action_type === 'COMMENT'): ?>
                                    commented on the ticket.
                                <?php elseif ($update->action_type === 'STATUS'): ?>
                                    changed the status of the ticket.
                                <?php endif; ?>
                            </p>
                            <p class="text-muted card-text">
                                <?= $update->date_created; ?>
                            </p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p>
                No updates.
            </p>
        <?php endif; ?>
    </section>
</main>
<?php require_once APPROOT . '/src/views/include/footer.php'; ?>