@extends('layouts.mainlayout') 

@section('title', 'Students')

@section('content')
	<h1>Ini Halaman Students</h1>

	<div class="my-5 d-flex justify-content-between">
		<a href="student-add" class="btn btn-primary">Add Data</a>
		<a href="student-deleted" class="btn btn-info">Show Deleted Data</a>
	</div>

	@if(Session::has('status'))
		<div class="alert alert-success" role="alert">
			{{Session::get('message')}}
		</div>
	@endif
	<h3>Student List</h3>

	<div class="my-3 col-12 col-sm-8 col-md-5">
		<form action="" method="get">
			<div class="input-group mb-3">
				<input type="text" class="form-control" name="keyword" placeholder="keyword">
				<button class="input-group-text btn btn-primary">Search</button>
			</div>
		</form>
	</div>

	<table class="table">
		<thead>
			<tr>
				<th>#</th>
				<th>Name</th>
				<th>Gender</th>
				<th>NIS</th>
				<th>Class</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($studentList as $data)
			<tr>
				<td>{{$loop->iteration + $studentList->firstItem()-1}}</td>
				<td>{{$data->name}}</td>
				<td>{{$data->gender}}</td>
				<td>{{$data->nis}}</td>
				<td>{{$data->class->name}}</td>
				<td>
					@if (Auth::user()->role_id != 1 && Auth::user()->role_id != 2)
						-
					@else
					<a href="student/{{$data->id}}">Detail</a>
					<a href="student-edit/{{$data->id}}">Edit</a>
					@endif
					
					@if(Auth::user()->role_id == 1)
					<a href="student-delete/{{$data->id}}">Delete</a>
					@endif
				
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
		{{$studentList->withQueryString()->links()}}
@endsection