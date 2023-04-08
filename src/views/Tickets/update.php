<?php require_once APPROOT . '/src/views/include/header.php'; ?>
<main class="px-5 py-3">
    <h1>
        Update Ticket
    </h1>
    <section class="d-flex gap-5">
        <div class="flex-grow-1">
            <?php if ($data): ?>
                <form action="<?= URLROOT; ?>/ticket/<?= $data['ticket']['ticket_id']; ?>/update-ticket" method="POST">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" id="title" placeholder="Juan de la Cruz"
                            value="<?= $data['ticket']['title']; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Category</label>
                        <select class="form-select form-select-md mb-3" name="category_id"
                            aria-label=".form-select-lg example">
                            <?php foreach ($data['categories'] as $category): ?>
                                <option value="<?= $category->category_id; ?>"
                                    <?php echo ($category->category_id === $data['ticket']['category_id'])? 'selected': ''; ?>
                                    >
                                    <?= $category->name; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" name="description" id="description"
                            rows="10"><?= $data['ticket']['description']; ?></textarea>
                    </div>
                    <?php if ($_SESSION['role'] === 'student'): ?>
                        <div class="d-flex justify-content-between">
                            <a type="button" class="btn btn-secondary"
                                href="<?= URLROOT; ?>/ticket/<?= $data['ticket']['ticket_id']; ?>/view-ticket">Cancel</a>
                            <button type="submit" class="btn btn-primary">Update</a>
                        </div>

                    <?php endif; ?>
                </form>

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