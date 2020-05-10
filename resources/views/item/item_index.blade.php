@extends('layouts.master')

@section('content')

<div class="row">
	<div class="col-md-12">
		<h3>{{ $title }}</h3>
		<div class="box box-primary mt-5">
			<div class="box-header">
				<p>
					<a href="{{ url('item/export') }}" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-save"></i> Export to excel</a>
				</p>
			</div>
			<div class="box-body">
				<table class="table table-merk table-stripped myTable">
					<thead>
						<tr>
							<th>#</th>
							<th>Nama</th>
							<th>Merk</th>
							<th>Kategori</th>
							<th>Supplier</th>
							<th>Stok</th>
							<th>Harga Beli</th>
							<th>Harga Jual</th>
							<th>
								<center>Action</center>
							</th>
						</tr>
					</thead>
					<tbody>
						@foreach($data as $e=>$dt)
						<tr>
							<td>{{ $e+1}}</td>
							<td>{{ $dt->nama}}</td>
							<td>{{ $dt->merkk->nama}}</td>
							<td>{{ $dt->kategorii->nama}}</td>
							<td>{{ $dt->supplierr->nama}}</td>
							<td>{{ $dt->stock}}</td>
							<td>{{ $dt->price}}</td>
							<td>{{ $dt->buy}}</td>
							<td>
								<div>
									<a href="{{ url('item/edit/' . $dt->item_id)}}" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>
									<a onclick="return confirm('apakah anda yakin?')" href="{{ url('item/delete/' . $dt->item_id )}}" class="btn btn-hapus btn-xs btn-danger" alert><i class="glyphicon glyphicon-trash"></i> Hapus</a>
								</div>
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
					data: 'merk',
					name: 'merk'
				},
				{
					data: 'kategori',
					name: 'kategori'
				},
				{
					data: 'supplier',
					name: 'supplier'
				},
				{
					data: 'stock',
					name: 'stock'
				},
				{
					data: 'buy',
					name: 'buy'
				},
				{
					data: 'price',
					name: 'price'
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