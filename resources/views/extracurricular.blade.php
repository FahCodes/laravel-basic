@extends('layouts.mainlayout') 

@section('title', 'Extracurricular')

@section('content')
    <h1>Ini Halaman Extracurricular</h1>

    <div class="my-5 d-flex justify-content-between">
		<a href="extracurricular-add" class="btn btn-primary">Add Data</a>
        <a href="extracurricular-deleted-list" class="btn btn-info">Show Deleted Data</a>
	</div>

    @if(Session::has('status'))
        <div class="alert alert-success" role="alert">
            {{Session::get('message')}}
        </div>
    @endif
    <h3>Extracurricular List</h3>
    <table class="table">
		<thead>
			<tr>
				<th>No.</th>
				<th>Name</th>
                <th>Action</th>
			</tr>
		</thead>
        <tbody>
            @foreach ($ekskulList as $data)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$data->name}}</td>
                <td><a href="extracurricular-detail/{{$data->id}}">Detail</a>
                    <a href="extracurricular-edit/{{$data->id}}">Edit</a>
                    <a href="extracurricular-delete/{{$data->id}}">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

@endsection