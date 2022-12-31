<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\ClassRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\ClassCreateRequest;

class ClassController extends Controller
{
    public function index()
    {
    	//query builder (masih oke)
    	//raw query (not recommended mudah terkena sql injection)
    	//eloquent ORM (rekomendasi laravel)
    	$class = ClassRoom::get(); //isi dari sintaks adalah (Select * from students)
    	return view('classroom', ['classList' => $class]);
    }
	public function show($id)
	{
		$class = ClassRoom::with(['students', 'homeroomTeacher'])
			->findOrFail($id);
		return view('class-detail', ['class' => $class]);
	}

	public function create()
	{
		$teacher = Teacher::select('id', 'name')->get();
		return view('class-add', ['teacher'=> $teacher]);
	}

	public function store(ClassCreateRequest $request)
	{
		//validasi nis unique pada controller
		// $validated = $request->validate([
		// 	'name' => 'max:10|required',
		// 	'teacher_id' => 'required'
		// ]);



		$class = ClassRoom::create($request->all());
		if($class)
		{
			Session::flash('status', 'success');
			Session::flash('message', 'Add New Class Success');
		}
		return redirect('/class');
	}

	public function edit(Request $request, $id)
	{
		$class = ClassRoom::with('homeroomTeacher')->findOrFail($id);
		$teacher = Teacher::where('id', '!=', $class->teacher_id)->get(['id', 'name']);
		return view('class-edit', ['class' => $class, 'homeroomTeacher' => $teacher]);
	}

	public function update(Request $request, $id)
	{
		$class = ClassRoom::findOrFail($id);
		$class->update($request->all());
		if($class)
		{
			Session::flash('status', 'success');
			Session::flash('message', 'Edit Class Success');
		}
		return redirect('/class');
	}

	public function delete($id)
	{
		$class = ClassRoom::findOrFail($id);
		return view('/class-delete', ['class' => $class]);
	}

	public function destroy($id)
	{
		$deletedClass = ClassRoom::findOrFail($id);
		$deletedClass->delete();
		if($deletedClass)
		{
			Session::flash('status', 'success');
			Session::flash('message', 'Deleting Data Success');
		}
		return redirect('/class');
	}

	public function deletedClass()
	{
		$deletedClass = ClassRoom::onlyTrashed()->get();
		return view('class-deleted-list', ['class' => $deletedClass]);
	}

	public function restore($id)
	{
		$deletedClass = ClassRoom::withTrashed()->where('id', $id)->restore();
		if($deletedClass)
		{
			Session::flash('status', 'success');
			Session::flash('message', 'Restoring data success');
		}
		return redirect('/class');
	}

}
