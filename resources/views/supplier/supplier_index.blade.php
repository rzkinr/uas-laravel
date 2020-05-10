@extends('layouts.master')

@section('content')

<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<h3>{{ $title }}</h3>
		<div class="box">
			<div class="box-body">
				<table class="table table-merk table-stripped myTable">
					<thead>
						<tr>
							<th>#</th>
							<th>Nama</th>
							<th>Alamat</th>
							<th>
								<center>Action</center>
							</th>
						</tr>
					</thead>
					<tbody>
						@foreach($data as $e=>$dt)
						<tr>
							<td>{{$e+1}}</td>
							<td>{{$dt->nama}}</td>
							<td>{{$dt->alamat}}</td>
							<td>
								<a href="{{ url('supplier/edit/' . $dt->supplier_id)}}" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>
								<a onclick="return confirm('apakah anda yakin?')" href="{{ url('supplier/delete/' . $dt->supplier_id )}}" class="btn btn-hapus btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
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

@section('scripts')

<script type="text/javascript">
	$(document).ready(function() {

		$('.myTable').DataTable({
			columns: [
				// or just disable search since it's not really searchable. just add searchable:false
				{
					data: 'rownum',
					name: 'rownum'
				},
				{
					data: 'nama',
					name: 'nama'
				},
				{
					data: 'alamat',
					name: 'alamat'
				},
				{
					data: 'action',
					name: 'action',
					orderable: false,
					searchable: false
				}
			]
		});

	})
</script>

@endsection