<div class="ui items">
        @foreach ($lombas as $lomba)
            <div class="ui item post unstackable">
                <div class="content" style="padding: 1em; position: relative">
                    <div class="description">
                        <table>
                            <tbody>
                                @foreach ($lomba->anggota as $anggota)
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
                                    <td>Departemen</td>
                                    <td>: {{ $lomba->user->name }}</td>
                                </tr>
                                <tr>
                                    <td>Nama Lomba</td>
                                    <td>: {{ $lomba->nama_lomba }}</td>
                                </tr>
                                <tr>
                                    <td>Kategori</td>
                                    <td>: {{ $lomba->kategori }}</td>
                                </tr>
                                <tr>
                                    <td>Tingkat</td>
                                    <td>: {{ $lomba->tingkat }}</td>
                                </tr>
                                <tr>
                                    <td>Juara</td>
                                    <td>: {{ $lomba->juara }}</td>
                                </tr>
                                <tr>
                                    <td>Penyelenggara</td>
                                    <td>: {{ $lomba->penyelenggara }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="extra" style="position:absolute; bottom:0; top:auto; padding-right:18px;">
                        <a href="{{ asset(Storage::url($lomba->bukti)) }}" class="ui right floated flat-btn" target="_blank">Bukti &rarr;</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    
    {{ $lombas->links() }}