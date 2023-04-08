<?php require_once APPROOT . '/src/views/include/header.php'; ?>
<main class="px-5 py-3">
    <h1>
        View Ticket
    </h1>
    <section class="d-flex gap-5">
        <div class="flex-grow-1">
            <?php if ($data): ?>
                <form>
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" id="title" placeholder="Juan de la Cruz"
                            disabled value="<?= $data['title']; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Category</label>
                        <select class="form-select form-select-md mb-3" name="category_id"
                            aria-label=".form-select-lg example" disabled>
                            <option selected value="<?= $data['category_id']; ?>"><?= $data['name']; ?></option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" name="description" id="description" rows="10"
                            disabled><?= $data['description']; ?></textarea>
                    </div>
                </form>
                <?php if ($_SESSION['role'] === 'student'): ?>
                    <a type="button" class="btn btn-primary"
                        href="<?= URLROOT; ?>/ticket/<?= $data['ticket_id']; ?>/edit-ticket">Edit</a>
                <?php endif; ?>
            <?php else: ?>
                <p>Error fetching data.</p>
            <?php endif; ?>
        </div>
        <div class="flex-grow-1">
            <h2>
                Comments
            </h2>
            <p>
                No comments yet.
            </p>
        </div>
    </section>
</main>
<?php require_once APPROOT . '/src/views/include/footer.php'; ?>