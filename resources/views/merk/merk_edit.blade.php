@extends('layouts.master')

@section('content')

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<h3>{{ $title }}</h3>
		<div class="box">
			<div class="box-body">

				<form role="form" method="post" action="{{ url('merk/update/'.$dt->merk_id) }}">
					{{ csrf_field() }}
					{{ method_field('put') }}
					<div class="box-body">
						<div class="form-group">
							<label for="exampleInputEmail1">Nama Merk</label>
							<input type="text" name="nama" value="{{ $dt->nama }}" class="form-control" id="" placeholder="Merk">
						</div>
					</div>
					<!-- /.box-body -->

					<div class="box-footer">
						<button type="submit" class="btn btn-primary">Update</button>
					</div>
				</form>

			</div>
		</div>
	</div>
</div>

@endsection