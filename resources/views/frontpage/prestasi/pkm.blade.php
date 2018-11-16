<div class="ui items">
    @foreach ($pkms as $pkm)
        <div class="ui item post unstackable">
            <div class="content" style="padding: 1em; position: relative">
                <div class="description">
                    <table>
                        <tbody>
                            @foreach ($pkm->anggota as $anggota)
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
                                <td>: {{ $pkm->judul }}</td>
                            </tr>
                            <tr>
                                <td>Juara</td>
                                <td>: {{ $pkm->juara }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="extra" style="position:absolute; bottom:0; top:auto; padding-right:18px;">
                    <a href="{{ Storage::url($pkm->bukti) }}" class="ui right floated flat-btn" target="_blank">Bukti &rarr;</a>
                </div>
            </div>
        </div>
    @endforeach
</div>

{{ $pkms->links() }}