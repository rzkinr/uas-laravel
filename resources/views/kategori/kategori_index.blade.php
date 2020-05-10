@extends('layouts.master')

@section('content')

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<h3>{{ $title }}</h3>
		<div class="box">
			<div class="box-body">
				<table class="table table-merk table-stripped myTable">
					<thead>
						<tr>
							<th>#</th>
							<th>Nama</th>
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
							<td>
								<center>
									<a href="{{ url('kategori/edit/' . $dt->kategori_id)}}" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>
									<a onclick="return confirm('apakah anda yakin?')" href="{{ url('kategori/delete/' . $dt->kategori_id)}}" class="btn btn-hapus btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
								</center>
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

		var flash = "{{ Session::has('pesan') }}";
		if (flash) {
			var pesan = "{{ Session::get('pesan') }}";
			alert(pesan);
		}

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