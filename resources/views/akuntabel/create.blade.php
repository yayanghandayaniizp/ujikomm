@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<ul class="breadcrumb">
				<li><a href="{{ url('/home') }}">Administrator SM</a></li>
				<li><a href="{{ url('/admin/User') }}">Akun admin</a></li>
				<li class="active">Tambah Admin</li>
			</ul>
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h2 class="panel-title">Tambah Admin</h2>
				</div>
				<div class="panel-body">
					{!! Form::open(['url'=>route('User.store'), 'method'=>'post', 'class'=>'form-horizontal']) !!}
					@include('akuntabel._form')
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection