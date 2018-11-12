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
                                        <td><a href="{{ route('exchange.edit', $exchange->id) }}" class="btn btn-warning">Edit</a></td>
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
                                    <th>Action</th>
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
                                        <td><a href="{{ route('exchange.edit', $exchange->id) }}" class="btn btn-warning">Edit</a></td>
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
                                    <th>Action</th>
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
                                        <td><a href="{{ route('exchange.edit', $exchange->id) }}" class="btn btn-warning">Edit</a></td>
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