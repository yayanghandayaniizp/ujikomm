@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
				<ul class="breadcrumb">
				<li><a href="{{ url('/home') }}">Administrator SM</a></li>
				<li><a href="{{ url('/admin/Wilayah') }}">wilayah</a></li>
				<li class="active">data wilayah</li>
			</ul>
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h2 class="panel-title">Ubah data wilayah</h2>
				</div>
				<div class="panel-body">
					{!! Form::model($wilayahku, ['url'=>route('Wilayah.update', $wilayahku->id), 'method'=>'put', 'class'=>'form-horizontal']) !!}
					@include('wilayah._form')
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection