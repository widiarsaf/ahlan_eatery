@extends("layouts.template")


@section('title')
<h4>Menu Criteria</h4>
@endsection
@section('content')
	<div class="row">
		<div class="col-lg-12">
			<div class="pull-left">
				<h2>Jenis Masakan</h2>
			</div>
			<div class="float-left my-3">
				<a class="btn btn-primary" href="{{ route('jenis_masakan.create') }}"> + Tambah Data</a>
			</div>
		</div>
	</div>

	@if ($message = Session::get('success'))
	<div class="alert alert-success">
		<p>{{ $message }}</p>
	</div>
	@endif

	<table class="table table-bordered">
		<tr>
			<th>Id</th>
			<th>Nama Jenis</th>
			<th width="280px">Action</th>
		</tr>
		@foreach ($jenisMasakan as $item)
		<tr>
			<td>{{ $item->id }}</td>
			<td>{{ $item->nama_jenis }}</td>
			<td>
				<form action="{{ route('jenis_masakan.destroy',['jenis_masakan'=>$item->id]) }}" method="POST">
					<a class="btn btn-primary" href=" {{route('jenis_masakan.edit',$item->id) }}">Edit</a>
					@csrf
					@method('DELETE')
					<button type="submit" class="btn btn-danger">Delete</button>
				</form>
			</td>
		</tr>
		@endforeach
	</table>
@endsection