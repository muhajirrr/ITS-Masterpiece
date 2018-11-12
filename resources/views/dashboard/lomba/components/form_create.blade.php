{!! Form::open(['route' => 'lomba.store', 'autocomplete' => 'off', 'enctype' => 'multipart/form-data']) !!}

<div class="anggota" style="margin-bottom: 12px">
    <div>
        <label><span style="font-size:2rem">Anggota</span></label>
        <button class="btn btn-info btn-sm pull-right" onclick="tambah_anggota()">Tambah Anggota</button>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                {!! Form::label('anggota[0][nrp]', 'NRP') !!}
                {!! Form::text('anggota[0][nrp]', null, ['class' => 'form-control border-input', 'placeholder' => 'NRP', 'required']) !!}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('anggota[0][nama]', 'Nama') !!}
                {!! Form::text('anggota[0][nama]', null, ['class' => 'form-control border-input', 'placeholder' => 'Nama', 'required']) !!}
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                {!! Form::label('anggota[0][angkatan]', 'Angkatan') !!}
                {!! Form::text('anggota[0][angkatan]', null, ['class' => 'form-control border-input', 'placeholder' => 'Angkatan', 'required']) !!}
            </div>
        </div>
    </div>
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
    {!! Form::file('bukti', ['class' => 'form-control border-input', 'placeholder' => 'Bukti', 'accept' => "image/*", 'required']) !!}
</div>

<div class="text-right">
    {!! Form::submit('Submit', ['class' => 'btn btn-info btn-fill btn-wd']) !!}
</div>

{!! Form::close() !!}