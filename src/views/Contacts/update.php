<?php require_once APPROOT . '/src/views/include/header.php'; ?>
<main class="px-5 py-3">
    <h1>
        View Contact
    </h1>
    
    <section class = "d-flex gap-5">
    <div class="flex-grow-1 position-relative">
            <?php if ($data): ?>
                <form action="<?= URLROOT; ?>/contact/<?= $data['contact']['contact_id']; ?>/update-contact" method="POST">
                    <div class="mb-3">
                        <label for="first_name" class="form-label">First Name</label>
                        <input type="text" name="first_name" class="form-control" id="first_name" placeholder="Juan de la Cruz"
                            value="<?= $data['contact']['first_name']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Juan de la Cruz"
                            value="<?= $data['contact']['last_name']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" name="email" class="form-control" id="email" placeholder="Juan de la Cruz"
                            value="<?= $data['contact']['email']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Contact Number</label>
                        <input type="text" name="contact_no" class="form-control" id="contact_no" placeholder="Juan de la Cruz"
                            value="<?= $data['contact']['contact_no']; ?>">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary d-block mt-3">
                                Save changes
                        </button>
                    </div>
                </form>
            <?php endif; ?>
        </div>
    </section>
</main>