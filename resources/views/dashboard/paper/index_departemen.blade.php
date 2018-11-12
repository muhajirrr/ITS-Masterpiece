@extends('dashboard.template')

@section('title', 'Kelola Paper')

@section('content')
<div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">
                            Waiting Paper <a href="{{ route('paper.create') }}" class="btn btn-info btn-wd pull-right">Tambah Paper</a>
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
                                        <td><a href="{{ route('paper.edit', $paper->id) }}" class="btn btn-warning">Edit</a></td>
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
                                        <td><a href="{{ route('paper.edit', $paper->id) }}" class="btn btn-warning">Edit</a></td>
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
                                    <th>Action</th>
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
                                        <td><a href="{{ route('paper.edit', $paper->id) }}" class="btn btn-warning">Edit</a></td>
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