{!! Form::model($lomba, ['route' => ['lomba.update', $lomba->id], 'autocomplete' => 'off', 'enctype' => 'multipart/form-data', 'method' => 'PUT']) !!}

<div class="anggota" style="margin-bottom: 12px">
    <div>
        <label><span style="font-size:2rem">Anggota</span></label>
        <button type="button" class="btn btn-info btn-sm pull-right" onclick="tambah_anggota()">Tambah Anggota</button>
    </div>
    @foreach ($lomba->anggota as $key => $anggota)
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    {!! Form::label('anggota['.$key.'][nrp]', 'NRP') !!}
                    {!! Form::text('anggota['.$key.'][nrp]', null, ['class' => 'form-control border-input', 'placeholder' => 'NRP', $loop->first ? 'required' : '']) !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('anggota['.$key.'][nama]', 'Nama') !!}
                    {!! Form::text('anggota['.$key.'][nama]', null, ['class' => 'form-control border-input', 'placeholder' => 'Nama', $loop->first ? 'required' : '']) !!}
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    {!! Form::label('anggota['.$key.'][angkatan]', 'Angkatan') !!}
                    {!! Form::text('anggota['.$key.'][angkatan]', null, ['class' => 'form-control border-input', 'placeholder' => 'Angkatan', $loop->first ? 'required' : '']) !!}
                </div>
            </div>
        </div>
    @endforeach
</div>

<div class="form-group">
    {!! Form::label('nama_lomba', 'Nama Lomba') !!}
    {!! Form::text('nama_lomba', null, ['class' => 'form-control border-input', 'placeholder' => 'Nama Lomba', 'required']) !!}
</div>

<div class="form-group">
    {!! Form::label('juara', 'Juara') !!}
    {!! Form::text('juara', null, ['class' => 'form-control border-input', 'placeholder' => 'Juara', 'required']) !!}
</div>

<div class="form-group">
    {!! Form::label('penyelenggara', 'Penyelenggara') !!}
    {!! Form::text('penyelenggara', null, ['class' => 'form-control border-input', 'placeholder' => 'Penyelenggara', 'required']) !!}
</div>

<div class="form-group">
    {!! Form::label('bukti', 'Bukti') !!}
    {!! Form::file('bukti', ['class' => 'form-control border-input', 'placeholder' => 'Bukti', 'accept' => "image/*"]) !!}
</div>

<div class="text-right">
    {!! Form::submit('Submit', ['class' => 'btn btn-info btn-fill btn-wd']) !!}
</div>

{!! Form::close() !!}