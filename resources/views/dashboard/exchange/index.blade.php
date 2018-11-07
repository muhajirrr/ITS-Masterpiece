@extends('dashboard.template')

@section('title', 'Kelola Exchange')

@section('content')
<div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">
                            Exchange <a href="{{ route('exchange.create') }}" class="btn btn-info btn-wd pull-right">Tambah Exchange</a>
                        </h4>
                        <p class="category">Daftar Mahasiswa Exchange</p>
                    </div>
    
                    <div class="content table-responsive table-full-width">
                        <table class="table table-stripped">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Angkatan</th>
                                    <th>Departemen</th>
                                    <th>Keterangan</th>
                                    <th>Bukti</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($exchanges as $exchange)
                                    <tr>
                                        <td>{{ $exchange->nama }}</td>
                                        <td>{{ $exchange->angkatan }}</td>
                                        <td>{{ $exchange->departemen }}</td>
                                        <td>{{ $exchange->keterangan }}</td>
                                        <td><a href="{{ asset(Storage::url($exchange->bukti)) }}" target="_blank">Lihat Bukti</a></td>
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