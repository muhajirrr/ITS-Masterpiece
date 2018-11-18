@extends('dashboard.template')

@section('title', 'Kelola Karya Mahasiswa')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">
                        Karya Mahasiswa <a href="{{ route('karya.create') }}" class="btn btn-info btn-wd pull-right">Tambah Karya Mahasiswa</a>
                    </h4>
                    <p class="category">Daftar Karya Mahasiswa</p>
                </div>

                <div class="content table-responsive table-full-width">
                    <table class="table table-stripped">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Link</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($karyas as $karya)
                                <tr>
                                    <td>{{ $karya->title }}</td>
                                    <td>{{ $karya->title_slug }}</td>
                                    <td>
                                        <a href="{{ route('karya.edit', $karya->id) }}" class="btn btn-warning">Edit</a>
                                        <button class="btn btn-danger" onclick="delete_action('#formDelete{{ $karya->id }}')">Delete</button>

                                        {!! Form::open(['route' => ['karya.delete', $karya->id], 'method' => 'DELETE', 'id' => 'formDelete'.$karya->id]) !!}
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
<script>
    function delete_action(id_form) {
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this post!",
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