<?php require_once APPROOT . '/src/views/include/header.php'; ?>
<h1>Main page</h1>
<p>This is the homepage</p>
<!-- <ul>
    <?php if ($data): ?>
        <?php foreach ($data as $ticket): ?>
            <h3>
                <?= $ticket->title; ?>
            </h3>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No tickets</p>
    <?php endif; ?>
</ul> -->
<pre>
    <?php print_r($data); ?>
</pre>
<?php require_once APPROOT . '/src/views/include/footer.php'; ?>