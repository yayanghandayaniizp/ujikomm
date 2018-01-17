@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<ul class="breadcrumb">
				<li><a href="{{ url('/home') }}">Administrator SM</a></li>
				<li><a href="{{ url('/admin/books') }}">Iklan</a></li>
				<li class="active">Ubah Iklan</li>
			</ul>
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h2 class="panel-title">Ubah iklan</h2>
				</div>
				<div class="panel-body">
					{!! Form::model($iklan, ['url'=>route('iklan.update', $iklan->id), 'method'=>'put', 'files'=>'true','class'=>'form-horizontal']) !!}
					@include('iklan._form')
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection