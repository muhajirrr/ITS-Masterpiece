@extends('dashboard.template')

@section('title', 'Kelola PKM')

@section('content')
<div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">
                            Waiting PKM
                        </h4>
                        <p class="category">Daftar PKM</p>
                    </div>
    
                    <div class="content table-responsive table-full-width">
                        <table class="table table-stripped">
                            <thead>
                                <tr>
                                    <th>Anggota</th>
                                    <th>Departemen</th>
                                    <th>Judul</th>
                                    <th>Juara</th>
                                    <th>Bukti</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pkms_wait as $pkm)
                                    <tr>
                                        <td>
                                            @foreach ($pkm->anggota as $anggota)
                                                {{ $anggota->nama }} | {{ $anggota->nrp }} | {{ $anggota->angkatan }}

                                                @if (!$loop->last) <br> @endif
                                            @endforeach
                                        </td>
                                        <td>{{ $pkm->user->name }}</td>
                                        <td>{{ $pkm->judul }}</td>
                                        <td>{{ $pkm->juara }}</td>
                                        <td><a href="{{ asset(Storage::url($pkm->bukti)) }}" target="_blank">Lihat Bukti</a></td>
                                        <td>
                                            <button class="btn btn-success btn-fill" onclick="accept('#formAccept{{ $pkm->id }}')">Accept</button>
                                            <button class="btn btn-danger btn-fill" onclick="reject('{{ $pkm->id }}')">Reject</button>

                                            {!! Form::open(['route' => ['pkm.accept', $pkm->id], 'id' => 'formAccept'.$pkm->id]) !!}
                                            {!! Form::close() !!}

                                            {!! Form::open(['route' => ['pkm.reject', $pkm->id], 'id' => 'formReject'.$pkm->id]) !!}
                                            {!! Form::hidden('keterangan', null, ['id' => 'keteranganReject'.$pkm->id]) !!}
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
                            Accepted PKM
                        </h4>
                        <p class="category">Daftar PKM</p>
                    </div>
    
                    <div class="content table-responsive table-full-width">
                        <table class="table table-stripped">
                            <thead>
                                <tr>
                                    <th>Anggota</th>
                                    <th>Departemen</th>
                                    <th>Judul</th>
                                    <th>Juara</th>
                                    <th>Bukti</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pkms_accepted as $pkm)
                                    <tr>
                                        <td>
                                            @foreach ($pkm->anggota as $anggota)
                                                {{ $anggota->nama }} | {{ $anggota->nrp }} | {{ $anggota->angkatan }}

                                                @if (!$loop->last) <br> @endif
                                            @endforeach
                                        </td>
                                        <td>{{ $pkm->user->name }}</td>
                                        <td>{{ $pkm->judul }}</td>
                                        <td>{{ $pkm->juara }}</td>
                                        <td><a href="{{ asset(Storage::url($pkm->bukti)) }}" target="_blank">Lihat Bukti</a></td>
                                        <td>
                                            <button class="btn btn-danger" onclick="delete_action('#formDelete{{ $pkm->id }}')">Delete</button>

                                            {!! Form::open(['route' => ['pkm.delete', $pkm->id], 'method' => 'DELETE', 'id' => 'formDelete'.$pkm->id]) !!}
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
                            Rejected PKM
                        </h4>
                        <p class="category">Daftar PKM</p>
                    </div>
    
                    <div class="content table-responsive table-full-width">
                        <table class="table table-stripped">
                            <thead>
                                <tr>
                                    <th>Anggota</th>
                                    <th>Departemen</th>
                                    <th>Judul</th>
                                    <th>Juara</th>
                                    <th>Bukti</th>
                                    <th>Keterangan Reject</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pkms_rejected as $pkm)
                                    <tr>
                                        <td>
                                            @foreach ($pkm->anggota as $anggota)
                                                {{ $anggota->nama }} | {{ $anggota->nrp }} | {{ $anggota->angkatan }}

                                                @if (!$loop->last) <br> @endif
                                            @endforeach
                                        </td>
                                        <td>{{ $pkm->user->name }}</td>
                                        <td>{{ $pkm->judul }}</td>
                                        <td>{{ $pkm->juara }}</td>
                                        <td><a href="{{ asset(Storage::url($pkm->bukti)) }}" target="_blank">Lihat Bukti</a></td>
                                        <td>{{ $pkm->keterangan_reject }}</td>
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