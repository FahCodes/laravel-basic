@extends('layouts.mainlayout')

@section('title', 'Deleted Class')
    
@section('content')
	<h1>Ini Halaman Deleted Class</h1>
    <div class="my-5 d-flex justify-content-between">
        <a href="class" class="btn btn-primary">Back</a>
    </div>
    
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
            @foreach ($class as $data)
			<tr>
				<td>{{$loop->iteration}}</td>
				<td>{{$data->name}}</td>
                <td>
                    <a href="/class/{{$data->id}}/restore">Restore</a>
                </td>
			</tr>
			@endforeach
		</tbody>
@endsection