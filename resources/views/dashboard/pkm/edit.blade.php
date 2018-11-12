@extends('dashboard.template')

@section('title', 'Kelola PKM')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Edit PKM</h4>
                    </div>

                    <div class="content">
                        <div class="row">
                            <div class="col-md-6">
                                @include('dashboard.pkm.components.form_edit')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection