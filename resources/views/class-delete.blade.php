@extends('layouts.mainlayout')

@section('title', 'Class')
    
@section('content')
    <div class="mt-5">
        <h2>Are you sure to delete data class : {{$class->name}} ({{$class->id}})</h2>
        <form style="display: inline-block" action="/class-destroy/{{$class->id}}" method="post">
            @method('delete')
            @csrf
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
        <a href="/class" class="btn btn-primary">Cancel</a>
    </div>
@endsection