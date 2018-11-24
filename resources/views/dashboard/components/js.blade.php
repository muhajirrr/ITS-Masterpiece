<script src="{{ asset('dashboard/js/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('dashboard/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('dashboard/js/bootstrap-checkbox-radio.js') }}"></script>
<script src="{{ asset('dashboard/js/chartist.min.js') }}"></script>
<script src="{{ asset('dashboard/js/bootstrap-notify.js') }}"></script>
<script src="{{ asset('dashboard/js/paper-dashboard.js') }}"></script>
{{-- <script src="{{ asset('dashboard/js/demo.js') }}"></script> --}}
<script>
    $(function() {
        var element = $('ul.sidemenu a').filter(function() {
            return '{{ url()->current() }}'.indexOf(this.href) != -1;
        }).parent().addClass('active');
    });
</script>
@yield('js')