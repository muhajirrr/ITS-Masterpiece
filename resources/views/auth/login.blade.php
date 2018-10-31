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
            </div>
        </div>
    </div>

    <div class="ui middle aligned center aligned grid" style="min-height: 450px">
        <div class="column" style="max-width: 360px">

            <h1 class="ui image inverted header">
                <i class="sign in alternate icon"></i>
                <div class="content">
                    Login
                </div>
            </h1>
            <h1 class="ui inverted header" style="margin-top: unset;">
                <div class="sub header">Login using your account</div>
            </h1>

            @if ($errors->any())
            <div class="ui error visible message">
                {{ $errors->first() }}
            </div>
            @endif
            
            <form method="POST" action="{{ route('login') }}" class="ui large form" autocomplete="off">
                @csrf
                <div class="ui stacked segment">
                    <div class="field">
                        <div class="ui left icon input">
                            <i class="user icon"></i>
                            <input type="text" name="username" placeholder="username">
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui left icon input">
                            <i class="lock icon"></i>
                            <input type="password" name="password" placeholder="Password">
                        </div>
                    </div>
                    <button type="submit" class="ui fluid large primary submit button">Login</button>
                </div>


            </form>
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
</body>

</html>