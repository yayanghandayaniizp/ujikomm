
<div class="form-group{{ $errors->has('name') ? 'has-error' : '' }}">
	{!! Form::label('name','Judul',['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::text('judul',null,['class'=>'form-control']) !!}
		{!! $errors->first('judul', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('deskripsi') ? 'has-error' : '' }}">
	{!! Form::label('name','Deskripsi',['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::textarea('deskripsi',null,['class'=>'form-control']) !!}
		{!! $errors->first('deskripsi', '<p class="help-block">:message</p>') !!}
	</div>
</div>


<div class="form-group{{ $errors->has('kondisi') ? 'has-error' : '' }}">
	{!! Form::label('name','Kondisi',['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::radio('kondisi',null,['class'=>'form-control']) !!} Baru  &nbsp;&nbsp;
		{!! Form::radio('kondisi',null,['class'=>'form-control']) !!} Bekas
		{!! $errors->first('kondisi', '<p class="help-block">:message</p>') !!}
	</div>
</div>


<div class="form-group{{ $errors->has('harga') ? 'has-error' : '' }}">
	{!! Form::label('name','Harga',['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::text('harga',null,['class'=>'form-control']) !!}
		{!! $errors->first('harga', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('tahun') ? 'has-error' : '' }}">
	{!! Form::label('name','Tahun keluar',['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::text('tahun',null,['class'=>'form-control']) !!}
		{!! $errors->first('tahun', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('mereks_id') ? 'has-error' : '' }}">
	{!! Form::label('mereks_id','Merekmobil',['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::select('mereks_id',App\Merekmobil::pluck('nama_merek','id')->all(),null,['placeholder'=>'Pilih Merek']) !!}
		{!! $errors->first('title', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('name') ? 'has-error' : '' }}">
	{!! Form::label('wilayahs_id','Wilayah',['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::select('wilayahs_id',App\Wilayah::pluck('nama_wilayah','id')->all(),null,['placeholder'=>'Pilih Wilayah']) !!}
		{!! $errors->first('wilayahs_id', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('a   ') ? 'has-error' : '' }}">
	{!! Form::label('akuns_id','Nama pemasang iklan',['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::select('akuns_id',App\User::pluck('name','id')->all(),null,['placeholder'=>'Pilih akun']) !!}
		{!! $errors->first('akuns_id', '<p class="help-block">:message</p>') !!}
	</div>
</div>



 



<div class="form-group">
	<div class="col-md-4 col-md-offset-2">
		{!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
	</div>
</div>