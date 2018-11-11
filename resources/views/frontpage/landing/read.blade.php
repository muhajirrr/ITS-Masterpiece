@extends('frontpage.template')

@section('content')
    <div class="ui grid">
        <div class="three wide column"></div>
        <div class="eight wide column">
            <div class="ui fluid card" style="font-size:medium">
                <div class="image">
                    <img src="{{ asset(Storage::url($karya->image)) }}">
                </div>
                <div class="content" style="padding: 2em 1.5em">
                    <div class="header">{{ $karya->title }}</div>
                    <div class="meta">
                        <span class="date">{{ $karya->created_at->format('j F Y, h:i') }}</span>
                    </div>
                    <div class="description" style="margin-top:1.5rem">
                        {!! $karya->content !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection