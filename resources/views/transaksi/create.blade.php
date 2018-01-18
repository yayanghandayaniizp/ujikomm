@extends('layouts.master')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<ul class="breadcrumb">
				<li><a href="{{ url('/home') }}">Administrator</a></li>
				<li class="active">Transaksi</li>
			</ul>
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h2 class="panel-title">Tambah data Transaksi</h2>
				</div>
				<div class="panel-body">
					{{ Form::open(['url' => route('Transaksi.store'), 'method' => 'POST', 'class'=> 'form-horizontal']) }}
					@include('transaksi._form')
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection