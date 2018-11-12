<div class="ui items" style="padding-left: 24px">
    @foreach ($pkms as $pkm)
        <div class="ui item post unstackable">
            <div class="content" style="padding: 1em; position: relative">
                <div class="description">
                    <table>
                        <tbody>
                            <tr>
                                <td>Nama</td>
                                <td>: {{ $pkm->nama }}</td>
                            </tr>
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