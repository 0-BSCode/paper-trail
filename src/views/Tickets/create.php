<?php require_once APPROOT . '/src/views/include/header.php'; ?>
<main class="px-5 py-3">
    <h1>
        Create Ticket
    </h1>
    <section class="d-flex gap-3">
        <form action="<?= URLROOT; ?>/ticket/create-ticket" method="POST">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Juan de la Cruz" required>
            </div>
            <?php if ($data['categories']): ?>
                <div class="mb-3">
                    <label class="form-label">Category</label>
                    <select class="form-select form-select-md mb-3" name="category_id" aria-label=".form-select-lg example">
                        <?php foreach ($data['categories'] as $category): ?>
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
        <?php if ($data['documents']): ?>
            <div class="flex-grow-1 position-relative d-flex flex-column overflow-auto">
                <div class="position-absolute w-100">
                    <h2>
                        Documents
                    </h2>
                    <div class="d-flex flex-column gap-2 mb-3">
                        <?php foreach ($data['documents'] as $document): ?>
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <?= $document->name; ?>
                                    </h5>
                                    <p class="card-text">
                                        <?= $document->description; ?>
                                    </p>
                                    <?php if ($document->link): ?>
                                        <a href="#" class="card-link">
                                            <?= $document->link; ?>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </section>
</main>
<?php require_once APPROOT . '/src/views/include/footer.php'; ?>
<pre>
<?php print_r($data['documents']); ?>
                        </pre>