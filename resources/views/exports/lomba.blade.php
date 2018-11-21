<table>
    <thead>
        <tr>
            <th>Anggota</th>
            <th>Departemen</th>
            <th>Nama Lomba</th>
            <th>Kategori</th>
            <th>Juara</th>
            <th>Penyelenggara</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($lombas as $lomba)
            <tr>
                <td>
                    @foreach ($lomba->anggota as $anggota)
                    {{ $anggota->nama }} ({{ $anggota->nrp }}) {{ $loop->last ? '' : '|' }}
                    @endforeach
                </td>
                <td>{{ $lomba->user->name }}</td>
                <td>{{ $lomba->nama_lomba }}</td>
                <td>{{ $lomba->kategori }}</td>
                <td>{{ $lomba->juara }}</td>
                <td>{{ $lomba->penyelenggara }}</td>
            </tr>
        @endforeach
    </tbody>
</table>