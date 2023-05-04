<script src="<?= URLROOT; ?>/public/jquery/jquery-3.6.4.min.js"></script>
<script src="<?= URLROOT; ?>/public/js/bootstrap.bundle.js"></script>
<script src="<?= URLROOT; ?>/public/summernote/summernote-lite.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#description').summernote({
            height: 200,
            tabsize: 2
        });
        $('span.note-icon-caret').remove();


        // Basic validation (disable RTE on view)
        if (window.location.pathname.includes('view')) {
            $('#description').summernote('disable');
        }
    });
</script>
</body>

</html>