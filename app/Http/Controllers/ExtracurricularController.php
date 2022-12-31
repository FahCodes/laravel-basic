<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Extracurricular;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\ExtracurricularCreateRequest;

class ExtracurricularController extends Controller
{
    public function index()
    {
        $ekskul = Extracurricular::get();
        return view('extracurricular', ['ekskulList' => $ekskul]);
    }
    
    public function show($id)
    {
        $ekskul = Extracurricular::with('students')
            ->findOrFail($id);
        return view('extracurricular-detail', ['ekskul' => $ekskul]);
    }

    public function create()
    {
        return view('extracurricular-add');
    }

    public function store(ExtracurricularCreateRequest $request)
    {
        $ekskul = Extracurricular::create($request->all());
        if($ekskul)
        {
            Session::flash('status', 'success');
            Session::flash('message', 'Add New Extracurricular Success');
        }
        return redirect('extracurricular');
    }

    public function edit(Request $request, $id)
    {
        $ekskul = Extracurricular::findOrFail($id);
        return view('extracurricular-edit', ['ekskul' => $ekskul]);
    }

    public function update(Request $request, $id)
    {
        $ekskul = Extracurricular::findOrFail($id);
        $ekskul->update($request->all());
        if($ekskul)
        {
            Session::flash('status', 'success');
            Session::flash('message', 'Edit Extracurricular Success');
        }
        return redirect('/extracurricular');
    }

    public function delete($id)
    {
        $ekskul = Extracurricular::findOrFail($id);
        return view('/extracurricular-delete', ['ekskul' => $ekskul]);
    }

    public function destroy($id)
    {
        $ekskul = Extracurricular::findOrFail($id);
        $ekskul->delete();
        if($ekskul)
        {
            Session::flash('status', 'success');
            Session::flash('message', 'Deleting Data Success');
        }
        return redirect('/extracurricular');
    }
    
    public function deletedExtracurricular()
    {
        $deletedExtracurricular = Extracurricular::onlyTrashed()->get();
        return view('extracurricular-deleted-list', ['ekskul' => $deletedExtracurricular]);
    }

    public function restore($id)
    {
        $deletedExtracurricular = Extracurricular::withTrashed()->where('id', $id)->restore();
        if($deletedExtracurricular)
        {
            Session::flash('status', 'success');
            Session::flash('message', 'Restoring Data Success');
        }
        return redirect('/extracurricular');
    }
}
