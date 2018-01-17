@extends('layouts.master')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
				<ul class="breadcrumb">
				<li><a href="{{ url('/home') }}">Administrator</a></li>
				<li><a href="{{ url('/admin/User') }}">Petugas hotel</a></li>
				<li class="active">data petugas hotel</li>
			</ul>
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h2 class="panel-title">Ubah data petugas hotel</h2>
				</div>
				<div class="panel-body">
					{!! Form::model($petugasku, ['url'=>route('Petugas.update', $petugasku->id), 'method'=>'put', 'class'=>'form-horizontal']) !!}
					@include('petugas._form')
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection