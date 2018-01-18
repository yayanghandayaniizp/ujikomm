@extends('layouts.master')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
				<ul class="breadcrumb">
				<li><a href="{{ url('/home') }}">Administrator</a></li>
				<li><a href="{{ url('/admin/User') }}">Transaksi</a></li>
				<li class="active">data Transaksi</li>
			</ul>
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h2 class="panel-title">Ubah data Transaksi</h2>
				</div>
				<div class="panel-body">
					{!! Form::model($transaksiku, ['url'=>route('Transaksi.update', $transaksiku->id), 'method'=>'put', 'class'=>'form-horizontal']) !!}
					@include('transaksi._form')
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection