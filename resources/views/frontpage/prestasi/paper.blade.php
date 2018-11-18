<div class="ui items">
    @foreach ($papers as $paper)
        <div class="ui item post unstackable">
            <div class="content" style="padding: 1em; position: relative">
                <div class="description">
                    <table>
                        <tbody>
                            @foreach ($paper->anggota as $anggota)
                                @if ($loop->count > 1)
                                    <tr>
                                        <td>Nama Anggota {{ $loop->iteration }}</td>
                                        <td>: {{ $anggota->nama }}</td>
                                    </tr>
                                    <tr>
                                        <td>NRP Anggota {{ $loop->iteration }}</td>
                                        <td>: {{ $anggota->nrp }}</td>
                                    </tr>
                                    <tr>
                                        <td>Angkatan Anggota {{ $loop->iteration }}</td>
                                        <td>: {{ $anggota->angkatan }}</td>
                                    </tr>
                                @else
                                    <tr>
                                        <td>Nama</td>
                                        <td>: {{ $anggota->nama }}</td>
                                    </tr>
                                    <tr>
                                        <td>NRP</td>
                                        <td>: {{ $anggota->nrp }}</td>
                                    </tr>
                                    <tr>
                                        <td>Angkatan</td>
                                        <td>: {{ $anggota->angkatan }}</td>
                                    </tr>
                                @endif
                            @endforeach
                            <tr>
                                <td>Judul</td>
                                <td>: {{ $paper->judul }}</td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>: {{ $paper->status_paper }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="extra" style="position:absolute; bottom:0; top:auto; padding-right:18px;">
                    <a href="{{ asset(Storage::url($paper->bukti)) }}" class="ui right floated flat-btn" target="_blank">Bukti &rarr;</a>
                </div>
            </div>
        </div>
    @endforeach
</div>

{{ $papers->links() }}