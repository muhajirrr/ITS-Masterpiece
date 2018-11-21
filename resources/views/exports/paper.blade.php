<table>
    <thead>
        <tr>
            <th>Anggota</th>
            <th>Departemen</th>
            <th>Judul</th>
            <th>Status Paper</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($papers as $paper)
            <tr>
                <td>
                    @foreach ($paper->anggota as $anggota)
                    {{ $anggota->nama }} ({{ $anggota->nrp }}) {{ $loop->last ? '' : '|' }}
                    @endforeach
                </td>
                <td>{{ $paper->user->name }}</td>
                <td>{{ $paper->judul }}</td>
                <td>{{ $paper->status_paper }}</td>
            </tr>
        @endforeach
    </tbody>
</table>