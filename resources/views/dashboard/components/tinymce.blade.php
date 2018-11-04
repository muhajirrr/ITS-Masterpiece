<script src="{{ asset('tinymce/tinymce.min.js') }}"></script>
<script>
    tinymce.init({
        selector: 'textarea#content',
        setup: function(editor) {
            editor.on('change', function (e) {
                editor.save();
            });
        },
    });
</script>