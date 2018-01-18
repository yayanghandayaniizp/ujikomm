 
<div class="form-group{{ $errors->has('nama') ? 'has-error' : '' }}">
	{!! Form::label('name','CheckIn',['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-10">
		{!! Form::text('cekin',null,['class'=>'form-control']) !!}
		{!! $errors->first('cekin', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('nama') ? 'has-error' : '' }}">
	{!! Form::label('name','Total Harga',['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-10">
		{!! Form::text('totalharga',null,['class'=>'form-control']) !!}
		{!! $errors->first('totalharga', '<p class="help-block">:message</p>') !!}
	</div>
</div>


<div class="form-group{{ $errors->has('name') ? 'has-error' : '' }}">
	{!! Form::label('petugas_id','Petugas',['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::select('petugas_id',App\Petugas::pluck('nama','id')->all(),null,['placeholder'=>'Pilih Nama Petugas']) !!}
		{!! $errors->first('petugas_id', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('name') ? 'has-error' : '' }}">
	{!! Form::label('pengunjungs_id','Pengunjung',['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::select('pengunjung_id',App\Pengunjung::pluck('nama','id')->all(),null) !!}
		{!! $errors->first('pengunjungs_id', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('name') ? 'has-error' : '' }}">
	{!! Form::label('kamars_id','Kamar',['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::select('kamars_id',App\Kamar::pluck('status','id')->all(),null) !!}
		{!! $errors->first('kamars_id', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group">
	<div class="col-md-4 col-md-offset-2">
		{!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
	</div>
</div>	