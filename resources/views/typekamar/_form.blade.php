	<div class="form-group{{ $errors->has('namatipe') ? 'has-error' : '' }}">
	{!! Form::label('name','Type kamar',['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::text('namatipe',null,['class'=>'form-control']) !!}
		{!! $errors->first('namatipe', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('harga') ? 'has-error' : '' }}">
	{!! Form::label('name','Harga',['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::text('harga',null,['class'=>'form-control']) !!}
		{!! $errors->first('harga', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group">
	<div class="col-md-4 col-md-offset-2">
		{!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
	</div>
</div>				