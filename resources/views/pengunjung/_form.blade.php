 
<div class="form-group{{ $errors->has('nama') ? 'has-error' : '' }}">
	{!! Form::label('name','Nama lengkap',['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-10">
		{!! Form::text('nama',null,['class'=>'form-control']) !!}
		{!! $errors->first('nama', '<p class="help-block">:message</p>') !!}
	</div>
</div>



<div class="form-group{{ $errors->has('tlp') ? 'has-error' : '' }}">
	{!! Form::label('name','No telepon',['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-10">
		{!! Form::text('tlp',null,['class'=>'form-control']) !!}
		{!! $errors->first('tlp', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('ktp') ? 'has-error' : '' }}">
	{!! Form::label('name','No KTP',['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-10">
		{!! Form::text('ktp',null,['class'=>'form-control']) !!}
		{!! $errors->first('ktp', '<p class="help-block">:message</p>') !!}
	</div>
</div>



<div class="form-group{{ $errors->has('alamat') ? 'has-error' : '' }}">
	{!! Form::label('name','Alamat lengkap',['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-10">
		{!! Form::textarea('alamat',null,['class'=>'form-control']) !!}
		{!! $errors->first('alamat', '<p class="help-block">:message</p>') !!}
	</div>
</div>




 



<div class="form-group">
	<div class="col-md-4 col-md-offset-2">
		{!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
	</div>
</div>	