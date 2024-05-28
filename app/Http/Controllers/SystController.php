<?php

namespace App\Http\Controllers;

use App\Models\Syst;
use Illuminate\Http\Request;

class SystController extends Controller
{
    public function index()
    {
        $systs = Syst::all();
        return view('syst.index', compact('systs'));
        
    }

    public function show($id)
    {
        $syst = Syst::find($id);
        return view('syst.show', compact('syst'));
    }

    public function create()
    {
        return view('syst.create');
    }

    public function store(Request $request)
    {
        $syst = new Syst();
        $syst->name = $request->name;
        $syst->save();
        return redirect()->route('syst.index');
    }

    public function edit($id)
    {
        $syst = Syst::find($id);
        return view('syst.edit', compact('syst'));
    }
    
    public function update(Request $request, $id)
    {
        $syst = Syst::find($id);
        $syst->name = $request->name;
        $syst->save();
        return redirect()->route('syst.index');
    }

    public function destroy($id)
    {
        $syst = Syst::find($id);
        $syst->delete();
        return redirect()->route('syst.index');
    }
}
