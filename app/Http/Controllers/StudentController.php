<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\ClassRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StudentCreateRequest;

class StudentController extends Controller
{
    public function index(Request $request)
    {
		// get data query builder (masih oke)
		// $student = DB::table('students')->get();
		// dd($student);

		// Create Data Query Builder
		// DB::table('students')->insert([
		// 	'name' => 'query builder',
		// 	'gender' => 'L',
		// 	'nis' => '202206',
		// 	'class_id' => 1
		// ]);

		// Update Data Query Builder
		// DB::table('students')->where('id', 26)->update([
		// 	'name' => 'Query Builder Updated',
		// 	'class_id' => 3
		// ]);

		// Delete data query builder
		// DB::table('students')->where('id',26)->delete();

    	// raw query (not recommended mudah terkena sql injection)
		
    	// get data eloquent ORM (rekomendasi laravel)
		// $student = Student::all();
		// dd($student);

		// create data eloquent
		// Student::create([
		// 	'name' => 'Eloquent',
		// 	'gender' => 'P',
		// 	'nis' => '202207',
		// 	'class_id' => 2
		// ]);

		// update data eloquent
		// Student::find('27')->update([
		// 	'name' => 'Eloquent Updated',
		// 	'class_id' => 1
		// ]);

		// delete data eloquent
		// Student::find(27)->delete();

    	// $student = Student::all(); //isi dari sintaks adalah (Select * from students)
    	// return view('student', ['studentList' => $student]);
		
		// $nilai = [9,8,7,6,5,4,3,2,1,10,9,5,4,4];
		
		// Menghitung rata rata dengan php biasa
		// 1.hitung jumlah nilai
		// 2.hitung berapa banyak nilai
		// 3.hitung nilai rata rata = totalnilai : countnilai = rata rata

		// $countNilai = count($nilai);
		// $totalNilai = array_sum($nilai);
		// $nilairatarata = $totalNilai / $countNilai;
		// dd($nilairatarata);


		// Menghitung rata rata dengan Collection
		// 1.hitung nilai rata rata
		// $nilairatarata = collect($nilai)->avg();
		// dd($nilairatarata);

		// $nilai = [9,8,7,6,5,4,3,2,1,10,9,5,4,4];

		// Contains = cek apakah sebuah array memiliki sesuatu
		// $aaa = collect($nilai)->contains(function($value){
		// 	return $value < 6;
		// });
	
		// dd($aaa);

		$keyword = $request->keyword;
		$student = Student::with('class')
					->where('name', 'LIKE', '%'.$keyword.'%')
					->orWhere('gender', $keyword)
					->orWhere('nis', 'LIKE', '%'.$keyword.'%')
					->orWhereHas('class', function($query) use($keyword){
						$query->where('name', 'LIKE', '%'.$keyword.'%');
					})
					->paginate(15);
		return view('student', ['studentList' => $student]);
    }

	public function show($id)
	{
		$student = Student::with(['class.homeroomTeacher', 'extracurriculars'])
			->findOrFail($id);
		return view('student-detail', ['student' => $student]);
	}

	public function create()
	{
		$class = ClassRoom::select('id', 'name')->get();
		return view('student-add', ['class' => $class]);
	}

	public function store(StudentCreateRequest $request)
	{
		// $student = new Student;
		// $student->name = $request->name;
		// $student->gender = $request->gender;
		// $student->nis = $request->nis;
		// $student->class_id = $request->class_id;
		// $student->save();


		//validasi nis unique pada controller
		// $validated = $request->validate([
		// 	'nis' => 'unique:students|max:10|required',
		// 	'name' => 'max:50|required',
		// 	'gender' => 'required',
		// 	'class_id' => 'required'
		// ]);
		// Mass assigment

		$newName = '';

		if($request->file('photo')){
		$extension = $request->file('photo')->getClientOriginalExtension();
		$newName = $request->name.'-'.now()->timestamp.'.'.$extension;
		$request->file('photo')->storeAs('photo', $newName);
		}
		
		$request['image'] = $newName;
		$student = Student::create($request->all());

		if ($student)
		{
			Session::flash('status', 'success');
			Session::flash('message', 'Add New Student Success');
		}	

		return redirect('/students');
		
	}

	public function edit(Request $request, $id)
	{
		$student = Student::with('class')->findOrFail($id);
		$class = ClassRoom::where('id', '!=', $student->class_id)->get(['id', 'name']);
		return view('student-edit', ['student' => $student, 'class' => $class]);
	}

	public function update(Request $request, $id)
	{	
		$newName = '';

		if($request->file('photo')){
		$extension = $request->file('photo')->getClientOriginalExtension();
		$newName = $request->name.'-'.now()->timestamp.'.'.$extension;
		$request->file('photo')->storeAs('photo', $newName);
		}
		
		$request['image'] = $newName;
		$student = Student::findOrFail($id);
		$student->update($request->all()); //mass assigment
		if($student)
		{
			Session::flash('status', 'success');
			Session::flash('message', 'Edit Student Success');
		}
		return redirect('/students');

		// $student->name = $request->name;
		// $student->gender = $request->gender;
		// $student->nis = $request->nis;
		// $student->class_id = $request->class_id;
		// $student->save();
	}

	public function delete($id)
	{
		$student = Student::findOrFail($id);
		return view('student-delete', ['student' => $student]);
	}

	public function destroy($id)
	{
		//query builder
		// $deletedStudent = DB::table('students')->where('id', $id)->delete();
		// return redirect('/students');

		//eloquent
		$deletedStudent = Student::findOrFail($id);
		$deletedStudent->delete();
		if($deletedStudent)
		{
			Session::flash('status', 'success');
			Session::flash('message', 'Delete Student Success');
		}
		return redirect('/students');
	}

	public function deletedStudent()
	{
		$deletedStudent = Student::onlyTrashed()->get();
		return view('student-deleted-list', [ 'student' => $deletedStudent]);
	}
	
	public function restore($id)
	{
		$deletedStudent = Student::withTrashed()->where('id', $id)->restore();
		if($deletedStudent)
		{
			Session::flash('status', 'success');
			Session::flash('message', 'restore student success');
		}
		return redirect('/students');
	}
}