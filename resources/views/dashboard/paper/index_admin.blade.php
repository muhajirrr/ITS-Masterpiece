@extends('dashboard.template')

@section('title', 'Kelola Paper')

@section('content')
<div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">
                            Waiting Paper
                        </h4>
                        <p class="category">Daftar Paper</p>
                    </div>
    
                    <div class="content table-responsive table-full-width">
                        <table class="table table-stripped">
                            <thead>
                                <tr>
                                    <th>Anggota</th>
                                    <th>Departemen</th>
                                    <th>Judul</th>
                                    <th>Status Paper</th>
                                    <th>Bukti</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($papers_wait as $paper)
                                    <tr>
                                        <td>
                                            @foreach ($paper->anggota as $anggota)
                                                {{ $anggota->nama }} | {{ $anggota->nrp }} | {{ $anggota->angkatan }}

                                                @if (!$loop->last) <br> @endif
                                            @endforeach
                                        </td>
                                        <td>{{ $paper->user->name }}</td>
                                        <td>{{ $paper->judul }}</td>
                                        <td>{{ $paper->status_paper }}</td>
                                        <td><a href="{{ asset(Storage::url($paper->bukti)) }}" target="_blank">Lihat Bukti</a></td>
                                        <td>
                                            <button class="btn btn-success btn-fill" onclick="accept('#formAccept{{ $paper->id }}')">Accept</button>
                                            <button class="btn btn-danger btn-fill" onclick="reject('{{ $paper->id }}')">Reject</button>

                                            {!! Form::open(['route' => ['paper.accept', $paper->id], 'id' => 'formAccept'.$paper->id]) !!}
                                            {!! Form::close() !!}

                                            {!! Form::open(['route' => ['paper.reject', $paper->id], 'id' => 'formReject'.$paper->id]) !!}
                                            {!! Form::hidden('keterangan', null, ['id' => 'keteranganReject'.$paper->id]) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="100%" style="text-align:center">No Data Found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card">
                    <div class="header">
                        <h4 class="title">
                            Accepted Paper
                        </h4>
                        <p class="category">Daftar Paper</p>
                    </div>
    
                    <div class="content table-responsive table-full-width">
                        <table class="table table-stripped">
                            <thead>
                                <tr>
                                    <th>Anggota</th>
                                    <th>Departemen</th>
                                    <th>Judul</th>
                                    <th>Status Paper</th>
                                    <th>Bukti</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($papers_accepted as $paper)
                                    <tr>
                                        <td>
                                            @foreach ($paper->anggota as $anggota)
                                                {{ $anggota->nama }} | {{ $anggota->nrp }} | {{ $anggota->angkatan }}

                                                @if (!$loop->last) <br> @endif
                                            @endforeach
                                        </td>
                                        <td>{{ $paper->user->name }}</td>
                                        <td>{{ $paper->judul }}</td>
                                        <td>{{ $paper->status_paper }}</td>
                                        <td><a href="{{ asset(Storage::url($paper->bukti)) }}" target="_blank">Lihat Bukti</a></td>
                                        <td>
                                            <button class="btn btn-danger" onclick="delete_action('#formDelete{{ $paper->id }}')">Delete</button>

                                            {!! Form::open(['route' => ['paper.delete', $paper->id], 'method' => 'DELETE', 'id' => 'formDelete'.$paper->id]) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="100%" style="text-align:center">No Data Found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card">
                    <div class="header">
                        <h4 class="title">
                            Rejected Paper
                        </h4>
                        <p class="category">Daftar Paper</p>
                    </div>
    
                    <div class="content table-responsive table-full-width">
                        <table class="table table-stripped">
                            <thead>
                                <tr>
                                    <th>Anggota</th>
                                    <th>Departemen</th>
                                    <th>Judul</th>
                                    <th>Status Paper</th>
                                    <th>Bukti</th>
                                    <th>Keterangan Reject</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($papers_rejected as $paper)
                                    <tr>
                                        <td>
                                            @foreach ($paper->anggota as $anggota)
                                                {{ $anggota->nama }} | {{ $anggota->nrp }} | {{ $anggota->angkatan }}

                                                @if (!$loop->last) <br> @endif
                                            @endforeach
                                        </td>
                                        <td>{{ $paper->user->name }}</td>
                                        <td>{{ $paper->judul }}</td>
                                        <td>{{ $paper->status_paper }}</td>
                                        <td><a href="{{ asset(Storage::url($paper->bukti)) }}" target="_blank">Lihat Bukti</a></td>
                                        <td>{{ $paper->keterangan_reject }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="100%" style="text-align:center">No Data Found.</td>
                                    </tr>
                                @endforelse
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
        function accept(id) {
            swal({
                title: "Are you sure?",
                icon: "warning",
                buttons: [true, 'Accept'],
            })
            .then((willAcc) => {
                if (willAcc) {
                    $(id).submit();
                }
            });
        }

        function reject(id) {
            swal({
                title: "Are you sure?",
                icon: "warning",
                content: {
                    element: "input",
                    attributes: {
                        placeholder: "Keterangan alasan reject"
                    }
                }
            }).then((value) => {
                if (value) {
                    $('#keteranganReject'+id).val(`${value}`);
                    $('#formReject'+id).submit();
                }
            });
        }

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