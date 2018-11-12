@extends('dashboard.template')

@section('title', 'Manage Users')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Add User</h4>
                    </div>

                    <div class="content">
                        <div class="row">
                            <div class="col-md-8 col-lg-6">
                                @include('dashboard.users.components.form_edit')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection