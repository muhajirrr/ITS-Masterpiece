<!DOCTYPE html>
<html lang="en">
    <head>
        @include('dashboard.components.meta')
        <title>Masterpiece ITS | @yield('title')</title>
        @include('dashboard.components.css')
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
        <div class="wrapper">
            @include('dashboard.components.sidebar')

            <div class="main-panel">
                @include('dashboard.components.navbar')

                <div class="content">
                    @yield('content')
                </div>
            </div>
        </div>
        @include('dashboard.components.js')
        @include('dashboard.components.notification')
    </body>
</html>
