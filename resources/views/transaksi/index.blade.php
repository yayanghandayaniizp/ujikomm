@extends('home2')
@section('content')
<div class="container">
<div class="row">
	<center><h1>Transaksi Pembayaran</h1></center>
	<div class="panel panel-primary">
		<div class="panel-heading">Transaksi Pembayaran
		<div class="panel-title pull-right"><a href="/admin/transaksi/create">Tambah Data</a></div></div>
		<div class="panel-body">
			<table class="table">
				<thead>
					<tr>
						<th>Kode Kamar</th>
						<th>Status Kamar</th>
						<th>Harga</th>
						<th>Jumlah</th>
						<th>Total Harga</th>
						<th>Waktu Transaksi</th>
						<th colspan="2">Action</th>
					</tr>
				</thead>
				<tbody>
				@foreach($transaksi as $data)
					<tr>
						<td>{{$data->id}}</td>
						<td>{{$data->status}}</td>
						<td>Rp.{{$data->harga}}</td>
						<td>{{$data->jumlah}}</td>
						<td>Rp.{{$data->total_harga}}</td>
						<td>{{$data->created_at}}</td>
						<td><a class="btn btn-warning" href="/admin/transaksi/{{$data->id}}/edit">Edit</a></td>
							<td><form action="{{route('transaksi.destroy',$data->id)}}" method="post">
								<input type="hidden" name="_method" value="DELETE">
								<input type="hidden" name="_token">
								<input type="submit" class="btn btn-danger" value="Delete">
								{{csrf_field()}}
							</form>
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>	
		</div>
	</div>
</div>
</div>
@endsection