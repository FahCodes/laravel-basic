@extends('layouts.mainlayout') 

@section('title', 'Edit Extracurricular')

@section('content')
    <div class="mt-5 col-8 m-auto">
        <form action="/extracurricular/{{$ekskul->id}}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name">Extracurricular</label>
                <input type="text" class="form-control" name="name" id="name" value="{{$ekskul->name}}" required>
            </div>
            <div>
                <button class="btn btn-success" type="submit">Update</button>
            </div>
        </form>
    </div>
@endsection