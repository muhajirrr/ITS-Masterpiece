@extends('dashboard.template')

@section('title', 'Kelola Lomba')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Tambah Lomba</h4>
                    </div>

                    <div class="content">
                        <div class="row">
                            <div class="col-md-8">
                                @include('dashboard.lomba.components.form_create')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        var currentelement = 1;

        function tambah_anggota() {
            var form = '<div class="row"> <div class="col-md-4"> <div class="form-group"> <label for="anggota['+currentelement+'][nrp]">NRP</label> <input class="form-control border-input" placeholder="NRP" name="anggota['+currentelement+'][nrp]" type="text" id="anggota['+currentelement+'][nrp]"> </div> </div> <div class="col-md-6"> <div class="form-group"> <label for="anggota['+currentelement+'][nama]">Nama</label> <input class="form-control border-input" placeholder="Nama" name="anggota['+currentelement+'][nama]" type="text" id="anggota['+currentelement+'][nama]"> </div> </div> <div class="col-md-2"> <div class="form-group"> <label for="anggota['+currentelement+'][angkatan]">Angkatan</label> <input class="form-control border-input" placeholder="Angkatan" name="anggota['+currentelement+'][angkatan]" type="text" id="anggota['+currentelement+'][angkatan]"> </div> </div> </div>';
            $('.anggota').append(form);
            currentelement += 1;
        }
    </script>
@endsection