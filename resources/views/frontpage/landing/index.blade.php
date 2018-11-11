@extends('frontpage.template')

@section('tab')
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
@endsection

@section('content')
    <div class="ui grid">
        <div class="three wide column"></div>
        <div class="ten wide column">
            <div class="ui tab active" data-tab="karya"></div>
            <div class="ui tab" data-tab="kompetisi"></div>
            <div class="ui tab" data-tab="prestasi"></div>
        </div>
        <div class="three wide column"></div>
    </div>
@endsection

@section('js')
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
@endsection