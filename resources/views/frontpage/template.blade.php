<!DOCTYPE html>
<html>
    <head>
        @include('frontpage.components.meta')
        <title>Masterpiece ITS</title>
        @include('frontpage.components.css')
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-129411357-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());
            gtag('config', 'UA-129411357-1');
        </script>
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