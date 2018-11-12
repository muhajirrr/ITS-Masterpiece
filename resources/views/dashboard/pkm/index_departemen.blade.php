@extends('dashboard.template')

@section('title', 'Kelola PKM')

@section('content')
<div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">
                            Waiting PKM <a href="{{ route('pkm.create') }}" class="btn btn-info btn-wd pull-right">Tambah PKM</a>
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
                                        <td><a href="{{ route('pkm.edit', $pkm->id) }}" class="btn btn-warning">Edit</a></td>
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
                                        <td><a href="{{ route('pkm.edit', $pkm->id) }}" class="btn btn-warning">Edit</a></td>
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
                                    <th>Action</th>
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
                                        <td><a href="{{ route('pkm.edit', $pkm->id) }}" class="btn btn-warning">Edit</a></td>
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