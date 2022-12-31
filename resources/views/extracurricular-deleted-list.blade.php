@extends('layouts.mainlayout')

@section('title', 'Deleted Extracurricular')
    
@section('content')
    <h1>Ini Halaman Extracurricular</h1>

    <div class="my-5 d-flex justify-content-between">
        <a href="/extracurricular" class="btn btn-primary">Back</a>
    </div>

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
            @foreach ($ekskul as $data)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$data->name}}</td>
                <td>
                    <a href="/extracurricular/{{$data->id}}/restore">Restore</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection