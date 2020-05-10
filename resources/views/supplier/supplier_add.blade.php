@extends('layouts.master')

@section('content')

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<h3>{{ $title }}</h3>
		<div class="box">
			<div class="box-body">

				<form role="form" method="post" action="{{ url('supplier/store') }}">
					{{ csrf_field() }}
					<div class="box-body">
						<div class="form-group">
							<label for="exampleInputEmail1">Nama Supplier</label>
							<input type="text" name="nama" class="form-control" id="" placeholder="Supplier">
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Alamat Supplier</label>
							<textarea class="form-control" name="alamat" rows="5"></textarea>
						</div>
					</div>
					<!-- /.box-body -->

					<div class="box-footer">
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</form>

			</div>
		</div>
	</div>
</div>

@endsection