<div class="nav fixed">
    <div class="ui grid container" style="margin-bottom: .4rem">
        <div class="middle aligned row">
            <div class="eight wide mobile eight wide tablet five wide computer column brand">
                <a href="/"><img src="{{ asset('img/logo.png') }}" style="width:213px"></a>
            </div>

            <div class="six wide computer only column logo">
                <ul>
                    <li><img src="{{ asset('img/logobem.png') }}" alt=""></li>
                    <li><img src="{{ asset('img/logoits.png') }}" alt=""></li>
                    <li><img src="{{ asset('img/logoristek.png') }}" alt=""></li>
                </ul>
            </div>

            <div class="five wide computer only right aligned column">
                <a href="/login" class="btn">Login</a>
            </div>

            @yield('mobile_tab')
        </div>
    </div>

    @yield('tab')
</div>