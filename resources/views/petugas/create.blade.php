@extends('layouts.master')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<ul class="breadcrumb">
				<li><a href="{{ url('/home') }}">Administrator</a></li>
				<li><a href="{{ url('/admin/Petugas') }}">Petugas Hotel</a></li>
				<li class="active">data petugas hotel</li>
			</ul>
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h2 class="panel-title">Tambah data Petugas Hotel</h2>
				</div>
				<div class="panel-body">
					{{ Form::open(['url' => route('Petugas.store'), 'method' => 'POST', 'class'=> 'form-horizontal']) }}
					@include('petugas._form')
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection