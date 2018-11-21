<table>
    <thead>
        <tr>
            <th>Nama</th>
            <th>NRP</th>
            <th>Angkatan</th>
            <th>Departemen</th>
            <th>Keterangan</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($exchanges as $exchange)
            <tr>
                <td>{{ $exchange->nama }}</td>
                <td>{{ $exchange->nrp }}</td>
                <td>{{ $exchange->angkatan }}</td>
                <td>{{ $exchange->departemen }}</td>
                <td>{{ $exchange->keterangan }}</td>
            </tr>
        @endforeach
    </tbody>
</table>