@extends('frontpage.template')

@section('css')
    <link rel="stylesheet" href="{{ asset('owlslider/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('owlslider/assets/owl.theme.default.min.css') }}">
    <style>
        .owl-carousel .owl-nav .owl-prev, .owl-carousel .owl-nav .owl-next {
            position: absolute;
            top: 45%;
            background: #00000099 !important;
            padding: unset !important;
            color: white !important;
        }

        .owl-carousel .owl-nav .owl-prev {
            left: 10px;
        }

        .owl-carousel .owl-nav .owl-next {
            right: 10px;
        }

        .item-caption {
            position: absolute;
            bottom: 0;
            background: #00000099;
            padding: 24px 36px;
            width: 100%;
            font-size: medium;
        }

        .item-caption a {
            color: white
        }
    </style>
@endsection

@section('mobile_tab')
    <div class="tablet mobile only eight wide right aligned column">
        <a id="mobile_item"><i class="large bars icon" style="color: white"></i></a>
    </div>
@endsection

@section('tab')
    <div class="computer only nav-menu ui center aligned grid container">
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

    <div class="ui right inverted sidebar vertical menu main-menu">
        <a class="active item" data-tab="karya">
            Karya Mahasiswa
        </a>
        <a class="item" data-tab="kompetisi">
            Kompetisi Nasional/Internasional
        </a>
        <a class="item" data-tab="prestasi">
            Galeri Prestasi
        </a>
        <a href="/login" class="item">Login</a>
    </div>
@endsection

@section('content')
    <div class="landing-content">
        <div class="ui centered grid">
            <div class="fourteen wide mobile tablet twelve wide computer column">
                <div class="ui tab active" data-tab="karya"></div>
                <div class="ui tab" data-tab="kompetisi"></div>
                <div class="ui tab" data-tab="prestasi"></div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('owlslider/owl.carousel.min.js') }}"></script>
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
            var prestasi = url.indexOf('prestasi') >= 0;
            $.ajax({
                url : url
            }).done(function (data) {
                if (prestasi) {
                    $('.prestasi-content .ui.tab.active').html(data);
                } else {
                    $('.ui.tab.active').html(data);
                }
            }).fail(function () {
                alert('Articles could not be loaded.');
            });
        }
    </script>
@endsection