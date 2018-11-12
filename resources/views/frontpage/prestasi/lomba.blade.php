<div class="ui items" style="padding-left: 24px">
        @foreach ($lombas as $lomba)
            <div class="ui item post unstackable">
                <div class="content" style="padding: 1em; position: relative">
                    <div class="description">
                        <table>
                            <tbody>
                                <tr>
                                    <td>Nama</td>
                                    <td>: {{ $lomba->nama }}</td>
                                </tr>
                                <tr>
                                    <td>Angkatan</td>
                                    <td>: {{ $lomba->angkatan }}</td>
                                </tr>
                                <tr>
                                    <td>Nama Lomba</td>
                                    <td>: {{ $lomba->nama_lomba }}</td>
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
                        <a href="{{ Storage::url($lomba->bukti) }}" class="ui right floated flat-btn" target="_blank">Bukti &rarr;</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    
    {{ $lombas->links() }}