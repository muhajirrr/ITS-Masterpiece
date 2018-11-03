<!DOCTYPE html>
<html lang="en">
    <head>
        @include('dashboard.components.meta')
        <title>Masterpiece ITS | @yield('title')</title>
        @include('dashboard.components.css')
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
    </body>
</html>
