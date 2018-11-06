<div class="ui items">
    @foreach ($kompetisis as $kompetisi)
        <div class="ui item post unstackable">
            <div class="ui small image image-post unstackable" style="background-image: url('{{ asset(Storage::url($kompetisi->image)) }}');">
                {{-- <img src="{{ asset(Storage::url($karya->image)) }}" alt=""> --}}
            </div>
            <div class="content" style="padding: 1.8em 1em; position: relative">
                <div class="header">
                    {{ $kompetisi->title }}
                </div>
                <div class="meta">
                    {{ $kompetisi->created_at->format('d/m/Y H:i')}}    
                </div>
                <div class="description">
                    {{ str_limit(strip_tags($kompetisi->content), 180, '...') }}
                </div>
                <div class="extra" style="position:absolute; bottom:0; top:auto; padding-right:18px;">
                    <a href="" class="ui right floated flat-btn">Selengkapnya &rarr;</a>
                </div>
            </div>
        </div>
    @endforeach
</div>

{{ $kompetisis->links() }}