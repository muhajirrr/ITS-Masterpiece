@extends('dashboard.template')

@section('title', 'Manage Users')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">
                            List Users <a href="{{ route('user.create') }}" class="btn btn-info btn-wd pull-right">Add User</a>
                        </h4>
                        <p class="category">List all users</p>
                    </div>

                    <div class="content table-responsive table-full-width">
                        <table class="table table-stripped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ implode(',', $user->roles()->pluck('name')->toArray()) }}</td>
                                        <td>
                                            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning">Edit</a>
                                            <button class="btn btn-danger" onclick="delete_action('#formDelete{{ $user->id }}')">Delete</button>

                                            {!! Form::open(['route' => ['user.delete', $user->id], 'method' => 'DELETE', 'id' => 'formDelete'.$user->id]) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
    @if ($message = Session::get('success'))
        @include('dashboard.components.notification', ['body' => $message, 'type' => 'success'])
    @endif

    <script>
        function delete_action(id_form) {
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this user!",
                icon: "warning",
                buttons: [true, 'Delete'],
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $(id_form).submit();
                }
            });
        }
    </script>
@endsection