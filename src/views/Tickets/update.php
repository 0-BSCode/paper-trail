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
        <div class="flex-grow-1 position-relative d-flex flex-column overflow-auto">
            <div class="position-absolute w-100">
                <h2>
                    Comments
                </h2>
                <div class="d-flex flex-column gap-2 mb-3">
                    <?php foreach ($data['comments'] as $comment): ?>
                        <form class="d-flex flex-column rounded-3 border me-2 p-3">
                            <div class="d-flex gap-3 align-items-start">
                            <img class="mt-1" src="<?= URLROOT; ?>/public/assets/images/person-circle.svg"
                                    alt="Profile Pic">
                                <div class="d-flex flex-column">
                                    <p class="mb-0">
                                        <b>
                                           <?= $comment->first_name . ' ' . $comment->last_name; ?>
                                        </b>
                                    </p>
                                    <p>
                                        <?= date(DATE_FORMAT, strtotime($comment->date_created)); ?>
                                    </p>
                                </div>
                            </div>
                            <textarea class="form-control" name="description" id="description" rows="4"
                                readonly><?= $comment->description; ?></textarea>
                        </form>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
    <?php if ($data['documents']): ?>
            <div class="position-relative mt-5">
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
</main>
<?php require_once APPROOT . '/src/views/include/footer.php'; ?>