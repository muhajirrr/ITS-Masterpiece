{!! Form::open(['route' => 'user.store', 'autocomplete' => 'off']) !!}

<div class="form-group">
    {!! Form::label('username', 'Username') !!}
    {!! Form::text('username', null, ['class' => 'form-control border-input', 'placeholder' => 'Username']) !!}
</div>

<div class="form-group">
    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name', null, ['class' => 'form-control border-input', 'placeholder' => 'Name']) !!}
</div>

<div class="form-group">
    {!! Form::label('password', 'Password') !!}
    {!! Form::password('password',  ['class' => 'form-control border-input', 'placeholder' => 'Password']) !!}
</div>

<div class="form-group">
    {!! Form::label('password_confirmation', 'Confirm Password') !!}
    {!! Form::password('password_confirmation',  ['class' => 'form-control border-input', 'placeholder' => 'Confirm Password']) !!}
</div>

<div class="form-group">
    {!! Form::label('role', 'Role') !!}
    @foreach ($roles as $role)
        <div class="radio">
            {!! Form::radio('role', $role->id) !!} <label>{{ $role->name }}</label>
        </div>
    @endforeach
</div>

<div class="text-right">
    {!! Form::submit('Add', ['class' => 'btn btn-info btn-fill btn-wd']) !!}
</div>

{!! Form::close() !!}