@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<ul class="breadcrumb">
				<li><a href="{{ url('/home') }}">Administrator SM</a></li>
				<li class="active">wilayah</li>
			</ul>
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h2 class="panel-title">Data wilayah</h2>
				</div>
				<div class="panel-body">
							<p><a class="btn btn-primary" href="{{ route('Wilayah.create') }}">Tambah wilayah</a></p>
					{!! $html->table(['class'=>'table-striped']) !!}
				</div>
			</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')
{!! $html->scripts() !!}
@endsection