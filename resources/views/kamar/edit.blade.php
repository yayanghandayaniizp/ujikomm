@extends('layouts.master')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
				<ul class="breadcrumb">
				<li><a href="{{ url('/home') }}">Administrator</a></li>
				<li><a href="{{ url('/admin/User') }}">Kamar hotel</a></li>
				<li class="active">data Kamar Hotel</li>
			</ul>
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h2 class="panel-title">Ubah data Kamar Hotel</h2>
				</div>
				<div class="panel-body">
					{!! Form::model($kamarku, ['url'=>route('Kamar.update', $kamarku->id), 'method'=>'put', 'class'=>'form-horizontal']) !!}
					@include('kamar._form')
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection