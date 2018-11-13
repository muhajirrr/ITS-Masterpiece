<div class="owl-carousel owl-theme">
    @foreach ($kompetisis_slide as $kompetisi)
    <div class="item">
        <div class="img" style="background-image: url('{{ asset(Storage::url($kompetisi->image)) }}');">
            <div class="item-caption">
                <a href="{{ route('kompetisi.read', $kompetisi->title_slug) }}">{{ $kompetisi->title }}</a>
            </div>
        </div>
    </div>
    @endforeach
</div>

<div class="ui items" style="margin-top: 48px;">
    @foreach ($kompetisis as $kompetisi)
        <div class="ui item post unstackable">
            <div class="ui small image image-post unstackable" style="background-image: url('{{ asset(Storage::url($kompetisi->image)) }}');">
                {{-- <img src="{{ asset(Storage::url($karya->image)) }}" alt=""> --}}
            </div>
            <div class="content" style="padding: 1.8em 1em; position: relative">
                <div class="header">
                    <a href="{{ route('kompetisi.read', $kompetisi->title_slug) }}">{{ $kompetisi->title }}</a>
                </div>
                <div class="meta">
                    {{ $kompetisi->created_at->format('d/m/Y H:i')}}    
                </div>
                <div class="description">
                    {{ str_limit(strip_tags($kompetisi->content), 180, '...') }}
                </div>
                <div class="extra" style="position:absolute; bottom:0; top:auto; padding-right:18px;">
                    <a href="{{ route('kompetisi.read', $kompetisi->title_slug) }}" class="ui right floated flat-btn">Selengkapnya &rarr;</a>
                </div>
            </div>
        </div>
    @endforeach
</div>

{{ $kompetisis->links() }}

<script>
    $(function() {
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            items: 1,
            autoplay: true,
            autoHeight: true,
            lazyLoad: true,
            navText: ['<i class="angle left icon"></i>', '<i class="angle right icon"></i>']
        });
    });
</script>