@extends('layouts.mainlayout') 

@section('title', 'Classroom')

@section('content')
	<h1>Ini Halaman Classroom</h1>
	<div class="my-5 d-flex justify-content-between">
		<a href="class-add" class="btn btn-primary">Add Data</a>
		<a href="class-deleted-list" class="btn btn-info">Show Deleted Data</a>
	</div>

	@if(Session::has('status'))
		<div class="alert alert-success" role="alert">
			{{Session::get('message')}}
		</div>
	@endif
	<h3>Class List</h3>
	<table class="table">
		<thead>
			<tr>
				<th>No.</th>
				<th>Name</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($classList as $data)
			<tr>
				<td>{{$loop->iteration}}</td>
				<td>{{$data->name}}</td>
				<td>
					<a href="class-detail/{{$data->id}}">Detail</a>
					<a href="class-edit/{{$data->id}}">Edit</a>
					<a href="class-delete/{{$data->id}}">Delete</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
@endsection