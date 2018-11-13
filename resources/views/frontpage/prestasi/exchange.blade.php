<div class="ui items" style="padding-left: 24px">
    @foreach ($exchanges as $exchange)
        <div class="ui item post unstackable">
            <div class="content" style="padding: 1em; position: relative">
                <div class="description">
                    <table>
                        <tbody>
                            <tr>
                                <td>Nama</td>
                                <td>: {{ $exchange->nama }}</td>
                            </tr>
                            <tr>
                                <td>NRP</td>
                                <td>: {{ $exchange->nrp }}</td>
                            </tr>
                            <tr>
                                <td>Angkatan</td>
                                <td>: {{ $exchange->angkatan }}</td>
                            </tr>
                            <tr>
                                <td>Angkatan</td>
                                <td>: {{ $exchange->angkatan }}</td>
                            </tr>
                            <tr>
                                <td>Keterangan</td>
                                <td>: {{ $exchange->keterangan }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="extra" style="position:absolute; bottom:0; top:auto; padding-right:18px;">
                    <a href="{{ Storage::url($exchange->bukti) }}" class="ui right floated flat-btn" target="_blank">Bukti &rarr;</a>
                </div>
            </div>
        </div>
    @endforeach
</div>

{{ $exchanges->links() }}