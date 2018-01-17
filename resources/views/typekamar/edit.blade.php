@extends('layouts.master')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<ul class="breadcrumb">
				<li><a href="{{ url('/home') }}">Administrator</a></li>
				<li><a href="{{ url('/admin/Type') }}">Type kamar</a></li>
				<li class="active">data tipe kamar</li>
			</ul>
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h2 class="panel-title">Ubah data type kamar</h2>
				</div>
				<div class="panel-body">
					{!! Form::model($typeku, ['url'=>route('Type.update', $typeku->id), 'method'=>'put', 'class'=>'form-horizontal']) !!}
					@include('typekamar._form')
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection