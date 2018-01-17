<div class="form-group{{ $errors->has('name') ? 'has-error' : '' }}">
	{!! Form::label('name','Nama Wilayah',['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::text('nama_wilayah',null,['class'=>'form-control']) !!}
		{!! $errors->first('nama_wilayah', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('name') ? 'has-error' : '' }}">
	{!! Form::label('name','Kabupaten',['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::text('kabupaten',null,['class'=>'form-control']) !!}
		{!! $errors->first('kabupaten', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('name') ? 'has-error' : '' }}">
	{!! Form::label('name','Kecamatan',['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::text('kecamatan',null,['class'=>'form-control']) !!}
		{!! $errors->first('kecamatan', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('name') ? 'has-error' : '' }}">
	{!! Form::label('name','Kode pos',['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::text('kode_pos',null,['class'=>'form-control']) !!}
		{!! $errors->first('kode_pos', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group">
	<div class="col-md-4 col-md-offset-2">
		{!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
	</div>
</div>