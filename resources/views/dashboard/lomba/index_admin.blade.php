@extends('dashboard.template')

@section('title', 'Kelola Lomba')

@section('content')
<div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">
                            Waiting Lomba <a href="{{ route('lomba.create') }}" class="btn btn-info btn-wd pull-right">Tambah Lomba</a>
                        </h4>
                        <p class="category">Daftar Lomba</p>
                    </div>
    
                    <div class="content table-responsive table-full-width">
                        <table class="table table-stripped">
                            <thead>
                                <tr>
                                    <th>Anggota</th>
                                    <th>Departemen</th>
                                    <th>Nama Lomba</th>
                                    <th>Juara</th>
                                    <th>Penyelenggara</th>
                                    <th>Bukti</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($lombas_wait as $lomba)
                                    <tr>
                                        <td>
                                            @foreach ($lomba->anggota as $anggota)
                                                {{ $anggota->nama }} | {{ $anggota->nrp }} | {{ $anggota->angkatan }}

                                                @if (!$loop->last) <br> @endif
                                            @endforeach
                                        </td>
                                        <td>{{ $lomba->user->name }}</td>
                                        <td>{{ $lomba->nama_lomba }}</td>
                                        <td>{{ $lomba->juara }}</td>
                                        <td>{{ $lomba->penyelenggara }}</td>
                                        <td><a href="{{ asset(Storage::url($lomba->bukti)) }}" target="_blank">Lihat Bukti</a></td>
                                        <td>
                                            <button class="btn btn-success btn-fill" onclick="accept('#formAccept{{ $lomba->id }}')">Accept</button>
                                            <button class="btn btn-danger btn-fill" onclick="reject('{{ $lomba->id }}')">Reject</button>

                                            {!! Form::open(['route' => ['lomba.accept', $lomba->id], 'id' => 'formAccept'.$lomba->id]) !!}
                                            {!! Form::close() !!}

                                            {!! Form::open(['route' => ['lomba.reject', $lomba->id], 'id' => 'formReject'.$lomba->id]) !!}
                                            {!! Form::hidden('keterangan', null, ['id' => 'keteranganReject'.$lomba->id]) !!}
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
                            Accepted Lomba
                        </h4>
                        <p class="category">Daftar Lomba</p>
                    </div>
    
                    <div class="content table-responsive table-full-width">
                        <table class="table table-stripped">
                            <thead>
                                <tr>
                                    <th>Anggota</th>
                                    <th>Departemen</th>
                                    <th>Nama Lomba</th>
                                    <th>Juara</th>
                                    <th>Penyelenggara</th>
                                    <th>Bukti</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($lombas_accepted as $lomba)
                                    <tr>
                                        <td>
                                            @foreach ($lomba->anggota as $anggota)
                                                {{ $anggota->nama }} | {{ $anggota->nrp }} | {{ $anggota->angkatan }}

                                                @if (!$loop->last) <br> @endif
                                            @endforeach
                                        </td>
                                        <td>{{ $lomba->user->name }}</td>
                                        <td>{{ $lomba->nama_lomba }}</td>
                                        <td>{{ $lomba->juara }}</td>
                                        <td>{{ $lomba->penyelenggara }}</td>
                                        <td><a href="{{ asset(Storage::url($lomba->bukti)) }}" target="_blank">Lihat Bukti</a></td>
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
                            Rejected Lomba
                        </h4>
                        <p class="category">Daftar Lomba</p>
                    </div>
    
                    <div class="content table-responsive table-full-width">
                        <table class="table table-stripped">
                            <thead>
                                <tr>
                                    <th>Anggota</th>
                                    <th>Departemen</th>
                                    <th>Nama Lomba</th>
                                    <th>Juara</th>
                                    <th>Penyelenggara</th>
                                    <th>Bukti</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($lombas_rejected as $lomba)
                                    <tr>
                                        <td>
                                            @foreach ($lomba->anggota as $anggota)
                                                {{ $anggota->nama }} | {{ $anggota->nrp }} | {{ $anggota->angkatan }}

                                                @if (!$loop->last) <br> @endif
                                            @endforeach
                                        </td>
                                        <td>{{ $lomba->user->name }}</td>
                                        <td>{{ $lomba->nama_lomba }}</td>
                                        <td>{{ $lomba->juara }}</td>
                                        <td>{{ $lomba->penyelenggara }}</td>
                                        <td><a href="{{ asset(Storage::url($lomba->bukti)) }}" target="_blank">Lihat Bukti</a></td>
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
    </script>
@endsection