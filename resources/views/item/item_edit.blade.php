@extends('layouts.master')

@section('content')

<div class="row">
	<form role="form" method="post" action="{{ url('item/update/'.$dt->item_id) }}">
		{{ csrf_field() }}
		{{ method_field('PUT') }}
		<div class="col-md-6">
			<h3>{{ $title }}</h3>
			<div class="box">
				<div class="box-body">

					<!-- <form role="form" method="post" action="{{ url('item/store') }}"> -->
					<div class="box-body">
						<div class="form-group">
							<label for="exampleInputEmail1">Nama Item</label>
							<input type="text" name="nama" value="{{ $dt->nama }}" class="form-control" id="" placeholder="Nama Item">
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Stock</label>
							<input type="number" name="stock" value="{{ $dt->stock }}" class="form-control" id="" placeholder="Stock">
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Hrg Beli</label>
							<input type="number" name="buy" value="{{ $dt->buy }}" class="form-control" id="" placeholder="Harga Beli">
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Hrg Jual</label>
							<input type="number" name="price" value="{{ $dt->price }}" class="form-control" id="" placeholder="Harga Jual">
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Discount</label>
							<input type="number" name="discount" value="{{ $dt->discount }}" class="form-control" id="" placeholder="Harga Jual">
						</div>
					</div>
					<!-- /.box-body -->

					<!-- <div class="box-footer">
						<button type="submit" class="btn btn-primary">Submit</button>
					</div> -->
					<!-- </form> -->

				</div>
			</div>
		</div>

		<div class="col-md-6">
			<h3>{{ $title }}</h3>
			<div class="box">
				<div class="box-body">

					<!-- <form role="form" method="post" action="{{ url('item/store') }}"> -->
					<div class="box-body">
						<div class="form-group">
							<label for="exampleInputEmail1">Merk</label>
							<select class="form-control select2" name="merk_id">
								@foreach($merks as $mk)
								<option value="{{ $mk->merk_id }}" {{ ($dt->merk_id == $mk->merk_id) ? 'selected' : '' }}>{{ $mk->nama }}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Kategori</label>
							<select class="form-control select2" name="kategori_id">
								@foreach($kategori as $mk)
								<option value="{{ $mk->kategori_id }}">{{ $mk->nama }}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Supplier</label>
							<select class="form-control select2" name="supplier_id">
								@foreach($supplier as $mk)
								<option value="{{ $mk->supplier_id }}">{{ $mk->nama }}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Keterangan</label>
							<textarea class="form-control" rows="5" name="keterangan">{{ $dt->keterangan }}</textarea>
						</div>
					</div>
					<!-- /.box-body -->

					<!-- <div class="box-footer">
						<button type="submit" class="btn btn-primary">Submit</button>
					</div> -->
					<!-- </form> -->

				</div>
			</div>
		</div>

		<div class="col-md-12">
			<div class="box">
				<div class="box-body">
					<div class="box-footer">
						<button type="submit" class="btn btn-primary btn-block">Update</button>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>

@endsection