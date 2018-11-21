<table>
    <thead>
        <tr>
            <th>Anggota</th>
            <th>Departemen</th>
            <th>Judul</th>
            <th>Juara</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pkms as $pkm)
            <tr>
                <td>
                    @foreach ($pkm->anggota as $anggota)
                    {{ $anggota->nama }} ({{ $anggota->nrp }}) {{ $loop->last ? '' : '|' }}
                    @endforeach
                </td>
                <td>{{ $pkm->user->name }}</td>
                <td>{{ $pkm->judul }}</td>
                <td>{{ $pkm->juara }}</td>
            </tr>
        @endforeach
    </tbody>
</table>