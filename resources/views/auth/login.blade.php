@extends('frontpage.template')

@section('content')
    <div class="ui middle aligned center aligned grid" style="min-height: 335px">
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
@endsection