<?php require_once APPROOT . '/src/views/include/header.php'; ?>
<main class="px-5 py-3">
    <h1>
        Edit Document
    </h1>

    <section class="d-flex gap-5">
        <div class="flex-grow-1">
        <?php if ($data): ?>
            <form action="<?= URLROOT; ?>/document/<?= $data['document']['document_id']; ?>/update-document" method="POST">
                <div class="mb-3">
                    <label for="name" class = "form-label">Document Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Document"
                            value="<?= $data['document']['name']; ?>">
                </div>
                <div class="mb-3">
                    <label for="link" class="form-label">Link to announcement</label>
                    <input type="text" name="link" class="form-control" id="link" placeholder="Juan de la Cruz"
                        disabled value="<?= $data['document']['link']; ?>">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" name="description" id="description"
                        rows="10"><?= $data['document']['description']; ?></textarea>
                </div>
                <button type="submit" class="btn btn-primary d-block mt-3">
                            Update Status
                        </button>
                <!-- <div class="d-flex justify-content-between">
                    <a type="button" class="btn btn-secondary"
                        href="<?= URLROOT; ?>/document/<?= $data['document']['document_id']; ?>/view-ticket">Cancel</a>
                    <button type="submit" class="btn btn-primary">Update</a> -->
                </div>
            </form>
        </div>
    </section>
</main>
<?php require_once APPROOT . '/src/views/include/footer.php';?>