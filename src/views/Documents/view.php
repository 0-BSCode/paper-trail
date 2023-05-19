<?php require_once APPROOT . '/src/views/include/header.php'; ?>
<main class="px-5 py-3">
    <h1>
        View Document
    </h1>
    <section class="d-flex gap-5">
        <div class="flex-grow-1 position-relative">
            <?php if ($data): ?>
                <form>
                    <div class="mb-3">
                        <label for="name" class="form-label">Document Name</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Juan de la Cruz" disabled
                            value="<?= $data['document']['name']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="link" class="form-label">Link to announcement</label>
                        <input type="text" name="link" class="form-control" id="link" placeholder="Juan de la Cruz" disabled
                            value="<?= $data['document']['link']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" name="description" id="description"
                            readonly> <?= $data['document']['description']; ?></textarea>
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="<?= URLROOT; ?>/document/<?= $data['document']['document_id']; ?>/edit-document" button
                            type="submit" button class="btn btn-success">Update</button></a>
                    </div>
                </form>
            <?php endif; ?>
        </div>
    </section>
</main>