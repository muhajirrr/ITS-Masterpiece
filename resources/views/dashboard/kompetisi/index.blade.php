@extends('dashboard.template')

@section('title', 'Kelola Kompetisi Nasional/Internasional')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">
                        Kompetisi Nasinal/Internasional <a href="{{ route('kompetisi.create') }}" class="btn btn-info btn-wd pull-right">Tambah Post Kompetisi</a>
                    </h4>
                    <p class="category">Daftar Kompetisi Nasional/Internasional</p>
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
                            @foreach ($kompetisis as $kompetisi)
                                <tr>
                                    <td>{{ $kompetisi->title }}</td>
                                    <td>{{ $kompetisi->title_slug }}</td>
                                    <td>
                                        <a href="{{ route('kompetisi.edit', $kompetisi->id) }}" class="btn btn-warning">Edit</a>
                                        <button class="btn btn-danger" onclick="delete_action('#formDelete{{ $kompetisi->id }}')">Delete</button>

                                        {!! Form::open(['route' => ['kompetisi.delete', $kompetisi->id], 'method' => 'DELETE', 'id' => 'formDelete'.$kompetisi->id]) !!}
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