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
                {{ csrf_field() }}
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
                    <div class="field">
                        <button type="submit" class="ui fluid large primary submit button">Login</button>
                    </div>
                    <button type="button" class="ui fluid large blue sop button">SOP</button>
                </div>


            </form>

            <div class="ui sop small modal">
                <i class="close icon"></i>
                <div class="header">
                    SOP Upload Prestasi
                </div>
                <div class="content">
                    <p>Berikut Tata Cara Upload Prestasi:</p>
                    <ol>
                        <li>Login menggunakan akun yang telah diberikan kepada bagian Ristek Himpunan Mahasiswa Departemen masing masing di ITS.</li>
                        <li>Lengkapi formulir yang disediakan serta unggah bukti hasil pengumuman lomba/exchange/paper berupa foto, dokumen, link, atau sejenisnya.</li>
                        <li>Akan dilakukan penghapusan data prestasi bila ditemukan ketidaksesuaian pada konten yang telah diunggah.</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(function() {
            $('.sop.modal').modal('attach events', '.sop.button', 'show');
        });
    </script>
@endsection