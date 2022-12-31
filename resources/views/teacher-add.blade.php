@extends('layouts.mainlayout') 

@section('title', 'Add New Teacher')

@section('content')
    <div class="mt-5 col-8 m-auto">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="teacher" method="post">
            @csrf
            <div class="mb-3">
                <label for="name">Teacher</label>
                <input type="text" class="form-control" name="name" id="name" >
            </div>

            <div>
                <button class="btn btn-success" type="submit">Save</button>
            </div>
        </form>
    </div>



@endsection