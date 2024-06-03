<?php

namespace App\Http\Controllers;

use App\Models\Speciality;
use Illuminate\Http\Request;

class SpecialityController extends Controller
{
    public function index()
    {
        $specs = Speciality::paginate(10);
        return view('spec.index', compact('specs'));
    }

    public function create()
    {
        return view('spec.create');
    }  

    public function store(Request $request)
    {
        // dd($request);
        $spec = new Speciality();
        $spec->code = $request->name;
        $spec->description = $request->description;
        $spec->save();
        return redirect()->route('especialidades.index');
    }

    public function edit($id)
    {
        $spec = Speciality::find($id);
        return view('spec.edit', compact('spec'));
    }

    public function update(Request $request, $id)
    {
        $spec = Speciality::find($id);
        $spec->code = $request->name;
        $spec->description = $request->description;
        $spec->save();
        return redirect()->route('especialidades.index');
        // dd($request);
    }

    public function destroy($id)
    {
        // dd($id);
        $spec = Speciality::find($id);
        $spec->delete();
        return redirect()->route('especialidades.index');
    }

}
