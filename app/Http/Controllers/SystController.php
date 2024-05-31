<?php

namespace App\Http\Controllers;

use App\Models\Syst;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Termwind\Components\Dd;

class SystController extends Controller
{
    public function index()
    {
        if(isset($_SESSION['route-act'])) {
            dd($_SESSION['route-act']);
        }
        $_SESSION['route-act'] = "inicio";
        // ->on('id_system')->paginate(10)
        $systs = Syst::paginate(10);
        // dd($systs);
        // dd($_SESSION['route-act']);
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
        $syst->code = $request->name;
        $syst->description = $request->description;
        // dd($request);
        $syst->save();
        return redirect()->route('sistemas.index');
    }

    public function edit($id)
    {
        $syst = Syst::find($id);
        // dd($syst);
        return view('syst.edit', compact('syst'));
    }
    
    public function update(Request $request, $id)
    {
        $_SESSION['route-act'] = "inicio";

        $syst = Syst::find($id);
        $syst->code = $request->name;
        $syst->description = $request->description;

        $syst->save();
        return redirect()->route('sistemas.index');
    }

    public function destroy($id)
    {
        // $syst = Syst::find($id);
        // $syst->delete();
        // return redirect()->route('sistemas.index');

        try {
            $syst = Syst::with('courses')->find($id);
            
            foreach ($syst->courses as $course) {
                $course->delete();
            }
            $syst = Syst::with('procs')->find($id);
            
            foreach ($syst->procs as $proc) {
                $proc->delete();
            }
            $syst->delete();

            return redirect()->route('sistemas.index');
        } catch (ModelNotFoundException $e) {
            return response()->json('El usuario con ID ' . $id . ' no se encontró', 404);
        } catch (Exception $e) {
            return response()->json('Error al eliminar : ' . $e->getMessage(), 500);
        }
    }
}
