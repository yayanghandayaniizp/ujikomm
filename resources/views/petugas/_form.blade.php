 
<div class="form-group{{ $errors->has('nama') ? 'has-error' : '' }}">
	{!! Form::label('name','Nama lengkap',['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-10">
		{!! Form::text('nama',null,['class'=>'form-control']) !!}
		{!! $errors->first('nama', '<p class="help-block">:message</p>') !!}
	</div>
</div>



<div class="form-group{{ $errors->has('jabatan') ? 'has-error' : '' }}">
	{!! Form::label('name','Jabatan',['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-10">
		{!! Form::text('jabatan',null,['class'=>'form-control']) !!}
		{!! $errors->first('jabatan', '<p class="help-block">:message</p>') !!}
	</div>
</div>



<div class="form-group">
	<div class="col-md-4 col-md-offset-2">
		{!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
	</div>
</div>	