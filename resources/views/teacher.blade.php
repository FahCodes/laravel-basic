@extends('layouts.mainlayout') 

@section('title', 'Teachers')

@section('content')
	<h1>Ini Halaman Teacher</h1>

    <div class="my-5 d-flex justify-content-between">
		<a href="teacher-add" class="btn btn-primary">Add Data</a>
        <a href="teacher-deleted-list" class="btn btn-info">Show Deleted Data</a>
	</div>

    @if(Session::has('status'))
        <div class="alert alert-success" role="alert">
            {{Session::get('message')}}
        </div>
    @endif
	<h3>Teacher List</h3>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($teacherList as $item)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->name}}</td>
                    <td>
                        <a href="teacher-detail/{{$item->id}}">Detail</a>
                        <a href="teacher-edit/{{$item->id}}">Edit</a>
                        <a href="teacher-delete/{{$item->id}}">Delete</a>
                    </td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection