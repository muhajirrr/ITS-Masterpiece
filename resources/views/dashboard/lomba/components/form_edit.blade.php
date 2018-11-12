{!! Form::model($lomba, ['route' => ['lomba.update', $lomba->id], 'autocomplete' => 'off', 'enctype' => 'multipart/form-data', 'method' => 'PUT']) !!}

<div class="form-group">
    {!! Form::label('nama', 'Nama') !!}
    {!! Form::text('nama', null, ['class' => 'form-control border-input', 'placeholder' => 'Nama', 'required']) !!}
</div>

<div class="form-group">
    {!! Form::label('angkatan', 'Angkatan') !!}
    {!! Form::text('angkatan', null, ['class' => 'form-control border-input', 'placeholder' => 'Angkatan', 'required']) !!}
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