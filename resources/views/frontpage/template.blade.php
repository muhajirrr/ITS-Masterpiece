<!DOCTYPE html>
<html>
    <head>
        @include('frontpage.components.meta')
        <title>Masterpiece ITS</title>
        @include('frontpage.components.css')
    </head>
    <body>
        @include('frontpage.components.navbar')

        <div class="pusher">
            <div id="content">
                @yield('content')
            </div>
        </div>

        @include('frontpage.components.footer')
        @include('frontpage.components.js')
        <script>
            $('.ui.sidebar').sidebar({
                context: $('#content'),
                transition: 'push',
                direction: 'right'
            }).sidebar('attach events', '#mobile_item');
        </script>
    </body>
</html>