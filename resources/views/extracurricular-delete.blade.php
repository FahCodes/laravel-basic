@extends('layouts.mainlayout')

@section('title', 'Extracurricular')
    
@section('content')
    <div class="mt-5">
        <h2>Are you sure to delete data : {{$ekskul->name}} ({{$ekskul->id}})</h2>
        <form style="display: inline-block" action="/extracurricular-destroy/{{$ekskul->id}}" method="post">
            @method('delete')
            @csrf
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
        <a href="/class" class="btn btn-primary">Cancel</a>
    </div>
@endsection