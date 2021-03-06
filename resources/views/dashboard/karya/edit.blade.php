@extends('dashboard.template')

@section('title', 'Kelola Karya Mahasiswa')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Edit Karya Mahasiswa</h4>
                    </div>

                    <div class="content">
                        <div class="row">
                            <div class="col-md-12">
                                @include('dashboard.karya.components.form_edit')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    @include('dashboard.components.tinymce')
@endsection