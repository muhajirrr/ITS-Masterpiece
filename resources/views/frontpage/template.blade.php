<!DOCTYPE html>
<html>
    <head>
        @include('frontpage.components.meta')
        <title>Masterpiece ITS</title>
        @include('frontpage.components.css')
    </head>
    <body>
        @include('frontpage.components.navbar')
        <div class="landing-content">
            @yield('content')
        </div>
        @include('frontpage.components.footer')
        @include('frontpage.components.js')
    </body>
</html>