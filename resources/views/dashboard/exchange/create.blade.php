@extends('dashboard.template')

@section('title', 'Kelola Exchange')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Tambah Exchange</h4>
                    </div>

                    <div class="content">
                        <div class="row">
                            <div class="col-md-6">
                                @include('dashboard.exchange.components.form_create')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection