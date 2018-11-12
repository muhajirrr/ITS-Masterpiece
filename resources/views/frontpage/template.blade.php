<!DOCTYPE html>
<html>
    <head>
        @include('frontpage.components.meta')
        <title>Masterpiece ITS</title>
        @include('frontpage.components.css')
    </head>
    <body>
        @include('frontpage.components.navbar')
        @yield('content')
        @include('frontpage.components.footer')
        @include('frontpage.components.js')
    </body>
</html>