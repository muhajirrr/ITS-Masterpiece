<script>
    $(function() {
        $.notify({
            icon: '{{ @$icon }}',
            message: '{!! $body !!}'

        }, {
            type: '{{ $type }}',
            timer: 2000,
            placement: {
                from: 'top',
                align: 'right'
            }
        });
    })
</script>