<?php

namespace App\Http\Controllers;

use App\Models\Proc;
use App\Models\Syst;
use Illuminate\Http\Request;

class ProcController extends Controller
{
    public function index()
    {
        $procs = Proc::with('syst')->paginate(10);
        // dd($procs);
        return view('proc.index', compact('procs'));
    }

    public function create()
    {
        $systs = Syst::all('id', 'code');
        return view('proc.create', compact('systs'));
    }

    public function store(Request $request)
    {
        // dd($request);
        $proc = new Proc();
        $proc->code = $request->name;
        $proc->description = $request->description;
        $proc->id_system = $request->id_syst;
        $proc->save();
        return redirect()->route('procesos.index');
    }

    public function edit($id)
    {
        $proc= Proc::find($id);
        $systs = Syst::all('id', 'code');
        return view('proc.edit', compact('proc', 'systs'));
    }

    public function update(Request $request, $id)
    {
        // dd($request);
        $proc = Proc::find($id);
        $proc->code = $request->name;
        $proc->description = $request->description;
        $proc->id_system = $request->id_syst;
        $proc->save();
        return redirect()->route('procesos.index');
    }

    public function destroy($id)
    {
        // dd($id);
        $proc = Proc::find($id);
        $proc->delete();
        return redirect()->route('procesos.index');
    }
}
