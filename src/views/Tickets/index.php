<?php require_once APPROOT . '/src/views/include/header.php'; ?>
<h1>
    Tickets
</h1>
<ul>
    <?php if ($data): ?>
        <?php foreach ($data as $ticket): ?>
            <h3>
                <?= $ticket->title; ?>
            </h3>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No tickets</p>
    <?php endif; ?>
</ul>

<?php require_once APPROOT . '/src/views/include/footer.php'; ?>