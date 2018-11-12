<div class="ui items" style="padding-left: 24px">
    @foreach ($papers as $paper)
        <div class="ui item post unstackable">
            <div class="content" style="padding: 1em; position: relative">
                <div class="description">
                    <table>
                        <tbody>
                            <tr>
                                <td>Nama</td>
                                <td>: {{ $paper->nama }}</td>
                            </tr>
                            <tr>
                                <td>Angkatan</td>
                                <td>: {{ $paper->angkatan }}</td>
                            </tr>
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
                    <a href="{{ Storage::url($paper->bukti) }}" class="ui right floated flat-btn" target="_blank">Bukti &rarr;</a>
                </div>
            </div>
        </div>
    @endforeach
</div>

{{ $papers->links() }}