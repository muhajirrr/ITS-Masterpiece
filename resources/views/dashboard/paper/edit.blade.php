@extends('dashboard.template')

@section('title', 'Kelola Paper')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Edit Paper</h4>
                    </div>

                    <div class="content">
                        <div class="row">
                            <div class="col-md-6">
                                @include('dashboard.paper.components.form_edit')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection