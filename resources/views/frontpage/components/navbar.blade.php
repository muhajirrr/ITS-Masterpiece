<div class="nav">
    <div class="ui three column grid container" style="margin-bottom: .4rem">
        <div class="middle aligned row">
            <div class="column brand">
                <a href="/"><img src="{{ asset('img/logo.png') }}" style="width:213px"></a>
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
    @yield('tab')
</div>