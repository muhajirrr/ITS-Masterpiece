<!DOCTYPE html>
<html lang="en">
    <head>
        @include('admin.components.meta')
        <title>Masterpiece ITS | @yield('title')</title>
        @include('admin.components.css')
    </head>
    <body>
        <div class="wrapper">
            @include('admin.components.sidebar')

            <div class="main-panel">
                @include('admin.components.navbar')

                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('admin.components.js')
    </body>
</html>
