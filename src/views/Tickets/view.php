<?php require_once APPROOT . '/src/views/include/header.php'; ?>
<main>
    <h1>
        View Ticket
    </h1>
    <?php if ($data): ?>
        <form>
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Juan de la Cruz" disabled
                    value="<?= $data['title']; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Category</label>
                <select class="form-select form-select-md mb-3" name="category_id" aria-label=".form-select-lg example"
                    disabled>
                    <option selected value="<?= $data['category_id']; ?>"><?= $data['name']; ?></option>
                </select>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Example textarea</label>
                <textarea class="form-control" name="description" id="description" rows="10"
                    disabled><?= $data['description']; ?></textarea>
            </div>
        </form>
    <?php else: ?>
        <p>Error fetching data.</p>
    <?php endif; ?>
</main>
<?php require_once APPROOT . '/src/views/include/footer.php'; ?>