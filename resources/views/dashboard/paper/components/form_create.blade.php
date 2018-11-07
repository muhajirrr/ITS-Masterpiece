{!! Form::open(['route' => 'paper.store', 'autocomplete' => 'off', 'enctype' => 'multipart/form-data']) !!}

<div class="form-group">
    {!! Form::label('nama', 'Nama') !!}
    {!! Form::text('nama', null, ['class' => 'form-control border-input', 'placeholder' => 'Nama', 'required']) !!}
</div>

<div class="form-group">
    {!! Form::label('judul', 'Judul') !!}
    {!! Form::text('judul', null, ['class' => 'form-control border-input', 'placeholder' => 'Judul', 'required']) !!}
</div>

<div class="form-group">
    {!! Form::label('status_paper', 'Status') !!}
    {!! Form::text('status_paper', null, ['class' => 'form-control border-input', 'placeholder' => 'Status', 'required']) !!}
</div>

<div class="form-group">
    {!! Form::label('bukti', 'Bukti') !!}
    {!! Form::file('bukti', ['class' => 'form-control border-input', 'placeholder' => 'Bukti', 'accept' => "image/*", 'required']) !!}
</div>

<div class="text-right">
    {!! Form::submit('Submit', ['class' => 'btn btn-info btn-fill btn-wd']) !!}
</div>

{!! Form::close() !!}