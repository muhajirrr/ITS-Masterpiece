<!DOCTYPE html>
<html>

<head>
    <title>Masterpiece ITS</title>
    <link rel="shortcut icon" href="{{ asset('img/lambangits.png') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ asset('semantic/dist/semantic.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/landing.css') }}">
</head>

<body>
    <div class="nav">
        <div class="ui three column grid container">
            <div class="middle aligned row">
                <div class="column brand">
                    Masterpiece ITS
                </div>

                <div class="column logo">
                    <ul>
                        <li><img src="{{ asset('img/logoits.png') }}" alt=""></li>
                        <li><img src="{{ asset('img/logobem.png') }}" alt=""></li>
                        <li><img src="{{ asset('img/logoristek.png') }}" alt=""></li>
                    </ul>
                </div>

                <div class="column right aligned">
                    <a href="/login" class="btn">Login</a>
                </div>
            </div>
        </div>

        <div class="nav-menu ui center aligned grid container">
            <div class="ui secondary pointing menu column">
                <a class="active item" data-tab="first">
                    Karya Mahasiswa
                </a>
                <a class="item" data-tab="second">
                    Kompetisi Nasional/Internasional
                </a>
                <a class="item" data-tab="third">
                    Galeri Prestasi
                </a>
            </div>
        </div>
    </div>


    <div class="landing-content">

        <div class="ui tab active" data-tab="first">
            
        </div>
        <div class="ui tab" data-tab="second">
            
        </div>
        <div class="ui tab" data-tab="third">
            
        </div>

    </div>
    
    <div class="footer ui center aligned grid container">
        <div class="twelve wide column">
            &copy; 2018 Kementrian Riset dan Teknologi BEM ITS
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
        crossorigin="anonymous"></script>
    <script src="{{ asset('semantic/dist/semantic.min.js') }}"></script>
    {{-- <script src="{{ asset('js/jquery.address-1.5.min.js') }}"></script> --}}

    <script>
        $(function() {
            $('.menu .item').tab('change tab', 'first');
        });
        $('.menu .item').tab({
            alwaysRefresh: true,
            cache: false,
            // path: '/ajax/{tab}.html',
            apiSettings: {
                loadingDuration: 300,
                url: '/{tab}'
            },
            // auto: true
        });
    </script>
</body>

</html>