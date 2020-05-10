@extends('layouts.master')

@section('content')

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<h3>{{ $title }}</h3>
		<div class="box">
			<div class="box-body">

				<form role="form" method="post" action="{{ url('merk/store') }}">
					{{ csrf_field() }}
					<div class="box-body">
						<div class="form-group">
							<label for="exampleInputEmail1">Nama Merk</label>
							<input type="text" name="nama" class="form-control" id="" placeholder="Merk">
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