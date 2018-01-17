@extends('layouts.master')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<ul class="breadcrumb">
				<li><a href="{{ url('/home') }}">Administrator</a></li>
				<li class="active">Pengunjung	</li>
			</ul>
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h2 class="panel-title">Tambah data pengunjung</h2>
				</div>
				<div class="panel-body">
					{{ Form::open(['url' => route('Pengunjung.store'), 'method' => 'POST', 'class'=> 'form-horizontal']) }}
					@include('pengunjung._form')
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection