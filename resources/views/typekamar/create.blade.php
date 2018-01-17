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
					<h2 class="panel-title">Tambah data tipe kamar</h2>
				</div>
				<div class="panel-body">
					{{ Form::open(['url' => route('Type.store'), 'method' => 'POST', 'class'=> 'form-horizontal']) }}
					@include('typekamar._form')
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection