{!! Form::model($paper, ['route' => ['paper.update', $paper->id], 'autocomplete' => 'off', 'enctype' => 'multipart/form-data', 'method' => 'PUT']) !!}

<div class="anggota" style="margin-bottom: 12px">
    <div>
        <label><span style="font-size:2rem">Anggota</span></label>
        <button type="button" class="btn btn-info btn-sm pull-right" onclick="tambah_anggota()">Tambah Anggota</button>
    </div>
    @foreach ($paper->anggota as $key => $anggota)
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
    {!! Form::label('judul', 'Judul') !!}
    {!! Form::text('judul', null, ['class' => 'form-control border-input', 'placeholder' => 'Judul', 'required']) !!}
</div>

<div class="form-group">
    {!! Form::label('status_paper', 'Status') !!}
    {!! Form::text('status_paper', null, ['class' => 'form-control border-input', 'placeholder' => 'Status', 'required']) !!}
</div>

<div class="form-group">
    {!! Form::label('bukti', 'Bukti') !!}
    {!! Form::file('bukti', ['class' => 'form-control border-input', 'placeholder' => 'Bukti', 'accept' => "image/*"]) !!}
</div>

<div class="text-right">
    {!! Form::submit('Simpan', ['class' => 'btn btn-info btn-fill btn-wd']) !!}
</div>

{!! Form::close() !!}