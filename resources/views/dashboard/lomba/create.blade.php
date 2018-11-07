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
                            <div class="col-md-6">
                                @include('dashboard.lomba.components.form_create')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection