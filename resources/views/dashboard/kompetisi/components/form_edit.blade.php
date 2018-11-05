{!! Form::model($kompetisi, ['route' => ['kompetisi.update', $kompetisi->id], 'autocomplete' => 'off', 'enctype' => 'multipart/form-data', 'method' => 'PUT']) !!}

<div class="form-group">
    {!! Form::label('title', 'Title') !!}
    {!! Form::text('title', null, ['class' => 'form-control border-input', 'placeholder' => 'Title', 'required']) !!}
</div>

<div class="form-group">
    {!! Form::label('image', 'Image Post') !!}
    {!! Form::file('image', ['class' => 'form-control border-input', 'placeholder' => 'Image', 'accept' => "image/*"]) !!}
</div>

<div class="form-group">
    {!! Form::label('content', 'Content') !!}
    {!! Form::textarea('content', null, ['class' => 'form-control border-input', 'placeholder' => 'Content', 'required']) !!}
</div>

<div class="text-right">
    {!! Form::submit('Simpan', ['class' => 'btn btn-info btn-fill btn-wd']) !!}
</div>

{!! Form::close() !!}