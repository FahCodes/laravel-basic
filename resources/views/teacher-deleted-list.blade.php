@extends('layouts.mainlayout')

@section('title', 'Deleted Teacher')

@section('content')
    <h1>Ini Halaman Deleted Teacher</h1>

    <div class="my-5">
        <a href="teacher" class="btn btn-primary">Back</a>
    </div>

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
            @foreach ($teacher as $item)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->name}}</td>
                    <td>
                        <a href="/teacher/{{$item->id}}/restore">Restore</a>
                    </td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection