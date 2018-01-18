 
<div class="form-group{{ $errors->has('nama') ? 'has-error' : '' }}">
	{!! Form::label('name','Status',['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-10">
		{!! Form::text('status',null,['class'=>'form-control']) !!}
		{!! $errors->first('status', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('name') ? 'has-error' : '' }}">
	{!! Form::label('pengunjungs_id','Pengunjung',['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::select('pengunjungs_id',App\Pengunjung::pluck('namatipe','id')->all(),null,['placeholder'=>'Pilih Typekamar']) !!}
		{!! $errors->first('types_id', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group">
	<div class="col-md-4 col-md-offset-2">
		{!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
	</div>
</div>	