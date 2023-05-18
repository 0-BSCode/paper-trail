<?php require_once APPROOT . '/src/views/include/header.php'; ?>
<main class="px-5 py-3">
    <h1>
        Create Ticket
    </h1>
    <form class="w-50" action="<?= URLROOT; ?>/ticket/create-ticket" method="POST">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" id="title" placeholder="Juan de la Cruz" required>
        </div>
        <?php if ($data): ?>
            <div class="mb-3">
                <label class="form-label">Category</label>
                <select class="form-select form-select-md mb-3" name="category_id" aria-label=".form-select-lg example">
                    <?php foreach ($data as $category): ?>
                        <option value="<?= $category->category_id; ?>"><?= $category->name; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        <?php endif; ?>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="description" rows="10" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">
            Submit
        </button>
    </form>
</main>
<?php require_once APPROOT . '/src/views/include/footer.php'; ?>