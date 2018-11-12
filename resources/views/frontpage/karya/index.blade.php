<div class="ui items">
    @foreach ($karyas as $karya)
        <div class="ui item post unstackable">
            <div class="ui small image image-post unstackable" style="background-image: url('{{ asset(Storage::url($karya->image)) }}');"></div>
            <div class="content" style="padding: 1.8em 1em; position: relative">
                <div class="header">
                    <a href="{{ route('karya.read', $karya->title_slug) }}">{{ $karya->title }}</a>
                </div>
                <div class="meta">
                    {{ $karya->created_at->format('d/m/Y H:i')}}    
                </div>
                <div class="description">
                    {{ str_limit(strip_tags($karya->content), 180, '...') }}
                </div>
                <div class="extra" style="position:absolute; bottom:0; top:auto; padding-right:18px;">
                    <a href="{{ route('karya.read', $karya->title_slug) }}" class="ui right floated flat-btn">Selengkapnya &rarr;</a>
                </div>
            </div>
        </div>
    @endforeach
</div>

{{ $karyas->links() }}