<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\TeacherCreateRequest;

class TeacherController extends Controller
{
    public function index()
    {
        $teacher = Teacher::all();
        return view('teacher', ['teacherList' => $teacher]);
    }

    public function show($id)
    {
        $teacher = Teacher::with('class.students')
            ->findOrFail($id);
        return view('teacher-detail', ['teacher' => $teacher]);
    }

    public function create()
    {
        $teacher = Teacher::all();
        return view('teacher-add');
    }

    public function store(TeacherCreateRequest $request)
    {
        $teacher = Teacher::create($request->all());
        if($teacher)
        {
            Session::flash('status', 'success');
            Session::flash('message', 'Add New Teacher Success');
        }
        return redirect('/teacher');
    }

    public function edit(Request $request, $id)
    {
        $teacher = Teacher::findOrFail($id);
        return view('teacher-edit', ['teacher' => $teacher]);
    }

    public function update(Request $request, $id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->update($request->all());
        if($teacher)
        {
            Session::flash('status', 'success');
            Session::flash('message', 'Edit Teacher Success');
        }
        return redirect('/teacher');
    }
    
    public function delete($id)
    {
        $teacher = Teacher::findOrFail($id);
        return view('/teacher-delete', ['teacher' => $teacher]);
    }

    public function destroy($id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->delete();
        if($teacher)
        {
            Session::flash('status', 'success');
            Session::flash('message', 'Deleting Data Success');
        }
        return redirect('/teacher');
    }

    public function deletedTeacher()
    {
        $deletedTeacher = Teacher::onlyTrashed()->get();
        return view('teacher-deleted-list', ['teacher' => $deletedTeacher]);
    }

    public function restore($id)
    {
        $deletedTeacher = Teacher::withTrashed()->where('id', $id)->restore();
        if($deletedTeacher)
        {
            Session::flash('status', 'success');
            Session::flash('message', 'Restoring Data Success');
        }
        return redirect('/teacher');
    }
}
