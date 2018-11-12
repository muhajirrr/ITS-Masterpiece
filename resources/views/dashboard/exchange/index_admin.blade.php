@extends('dashboard.template')

@section('title', 'Kelola Exchange')

@section('content')
<div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">
                            Waiting Exchange <a href="{{ route('exchange.create') }}" class="btn btn-info btn-wd pull-right">Tambah Exchange</a>
                        </h4>
                        <p class="category">Daftar Mahasiswa Exchange </p>
                    </div>
    
                    <div class="content table-responsive table-full-width">
                        <table class="table table-stripped">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>NRP</th>
                                    <th>Angkatan</th>
                                    <th>Departemen</th>
                                    <th>Keterangan</th>
                                    <th>Bukti</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($exchanges_wait as $exchange)
                                    <tr>
                                        <td>{{ $exchange->nama }}</td>
                                        <td>{{ $exchange->nrp }}</td>
                                        <td>{{ $exchange->angkatan }}</td>
                                        <td>{{ $exchange->user->name }}</td>
                                        <td>{{ $exchange->keterangan }}</td>
                                        <td><a href="{{ asset(Storage::url($exchange->bukti)) }}" target="_blank">Lihat Bukti</a></td>
                                        <td>
                                            <button class="btn btn-success btn-fill" onclick="accept('#formAccept{{ $exchange->id }}')">Accept</button>
                                            <button class="btn btn-danger btn-fill" onclick="reject('{{ $exchange->id }}')">Reject</button>

                                            {!! Form::open(['route' => ['exchange.accept', $exchange->id], 'id' => 'formAccept'.$exchange->id]) !!}
                                            {!! Form::close() !!}

                                            {!! Form::open(['route' => ['exchange.reject', $exchange->id], 'id' => 'formReject'.$exchange->id]) !!}
                                            {!! Form::hidden('keterangan', null, ['id' => 'keteranganReject'.$exchange->id]) !!}
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
                            Accepted Exchange
                        </h4>
                        <p class="category">Daftar Mahasiswa Exchange </p>
                    </div>
    
                    <div class="content table-responsive table-full-width">
                        <table class="table table-stripped">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>NRP</th>
                                    <th>Angkatan</th>
                                    <th>Departemen</th>
                                    <th>Keterangan</th>
                                    <th>Bukti</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($exchanges_accepted as $exchange)
                                    <tr>
                                        <td>{{ $exchange->nama }}</td>
                                        <td>{{ $exchange->nrp }}</td>
                                        <td>{{ $exchange->angkatan }}</td>
                                        <td>{{ $exchange->user->name }}</td>
                                        <td>{{ $exchange->keterangan }}</td>
                                        <td><a href="{{ asset(Storage::url($exchange->bukti)) }}" target="_blank">Lihat Bukti</a></td>
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
                            Rejected Exchange
                        </h4>
                        <p class="category">Daftar Mahasiswa Exchange </p>
                    </div>
    
                    <div class="content table-responsive table-full-width">
                        <table class="table table-stripped">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>NRP</th>
                                    <th>Angkatan</th>
                                    <th>Departemen</th>
                                    <th>Keterangan</th>
                                    <th>Bukti</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($exchanges_rejected as $exchange)
                                    <tr>
                                        <td>{{ $exchange->nama }}</td>
                                        <td>{{ $exchange->nrp }}</td>
                                        <td>{{ $exchange->angkatan }}</td>
                                        <td>{{ $exchange->user->name }}</td>
                                        <td>{{ $exchange->keterangan }}</td>
                                        <td><a href="{{ asset(Storage::url($exchange->bukti)) }}" target="_blank">Lihat Bukti</a></td>
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