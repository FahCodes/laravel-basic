@extends('layouts.mainlayout') 

@section('title', 'Edit Teacher')

@section('content')
    <div class="mt-5 col-8 m-auto">
        <form action="/teacher/{{$teacher->id}}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name">Teacher</label>
                <input type="text" class="form-control" name="name" id="name" value="{{$teacher->name}}" required>
            </div>

            <div>
                <button class="btn btn-success" type="submit">Update</button>
            </div>
        </form>
    </div>
@endsection