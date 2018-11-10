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
            <div class="ui secondary pointing menu column main-menu">
                <a class="active item" data-tab="karya">
                    Karya Mahasiswa
                </a>
                <a class="item" data-tab="kompetisi">
                    Kompetisi Nasional/Internasional
                </a>
                <a class="item" data-tab="prestasi">
                    Galeri Prestasi
                </a>
            </div>
        </div>
    </div>


    <div class="landing-content">

        <div class="ui grid">
            <div class="three wide column"></div>
            <div class="ten wide column">
                <div class="ui tab active" data-tab="karya"></div>
                <div class="ui tab" data-tab="kompetisi"></div>
                <div class="ui tab" data-tab="prestasi"></div>
            </div>
            <div class="three wide column"></div>
        </div>


    </div>
    
    <div class="footer ui center aligned grid container">
        <div class="twelve wide column">
            <div class="jarak">
                <p><h7>Supported By</h7></p>
                <img src="{{ asset('img/ikomaputih.png') }}" alt="Ikatan Orang Tua Mahasiswa ITS" style="height: 75px;
                width: auto;">
            </div>
            <br>
            &copy; 2018 Kementrian Riset dan Teknologi BEM ITS
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
        crossorigin="anonymous"></script>
    <script src="{{ asset('semantic/dist/semantic.min.js') }}"></script>
    {{-- <script src="{{ asset('js/jquery.address-1.5.min.js') }}"></script> --}}

    <script>
        $(function() {
            $('.main-menu .item').tab('change tab', 'karya');
        });

        $('.main-menu .item').tab({
            alwaysRefresh: true,
            cache: false,
            apiSettings: {
                loadingDuration: 300,
                url: '/{tab}'
            }
        });

        $(document).on('click', '.pagination a', function(e) {
            e.preventDefault();
            getArticles($(this).attr('href'));
        });

        function getArticles(url) {
            $.ajax({
                url : url
            }).done(function (data) {
                $('.ui.tab.active').html(data);  
            }).fail(function () {
                alert('Articles could not be loaded.');
            });
        }
    </script>
</body>

</html>