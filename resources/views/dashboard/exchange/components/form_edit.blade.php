{!! Form::model($exchange, ['route' => ['exchange.update', $exchange->id], 'autocomplete' => 'off', 'enctype' => 'multipart/form-data', 'method' => 'PUT']) !!}

<div class="form-group">
    {!! Form::label('nama', 'Nama') !!}
    {!! Form::text('nama', null, ['class' => 'form-control border-input', 'placeholder' => 'Nama', 'required']) !!}
</div>

<div class="form-group">
    {!! Form::label('angkatan', 'Angkatan') !!}
    {!! Form::text('angkatan', null, ['class' => 'form-control border-input', 'placeholder' => 'Angkatan', 'required']) !!}
</div>

<div class="form-group">
    {!! Form::label('keterangan', 'Keterangan') !!}
    {!! Form::text('keterangan', null, ['class' => 'form-control border-input', 'placeholder' => 'Keterangan', 'required']) !!}
</div>

<div class="form-group">
    {!! Form::label('bukti', 'Bukti') !!}
    {!! Form::file('bukti', ['class' => 'form-control border-input', 'placeholder' => 'Bukti', 'accept' => "image/*"]) !!}
</div>

<div class="text-right">
    {!! Form::submit('Simpan', ['class' => 'btn btn-info btn-fill btn-wd']) !!}
</div>

{!! Form::close() !!}