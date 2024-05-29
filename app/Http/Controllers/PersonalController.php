<?php

namespace App\Http\Controllers;

use App\Models\Personal;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class PersonalController extends Controller
{
    public function index()
    {
        $personals = Personal::paginate(10);
        return view('personal.index', compact('personals'));
    }

    public function show($id)
    {
        $personal = Personal::find($id);
        return view('personal.show', compact('personal'));
    }

    public function create()
    {
        return view('personal.create');
    }

    public function store(Request $request)
    {
        $personal = new Personal();
        $personal->code = $request->name;
        $personal->description = $request->description;
        // dd($request);
        $personal->save();
        return redirect()->route('sistemas.index');
    }

    public function edit($id)
    {
        $personals = Personal::paginate(10);
        $personalI = Personal::find($id);
        // dd($personal);
        return view('personal.index', compact('personalI', 'personals'));
    }
    
    public function update(Request $request, $id)
    {
        $personal = Personal::find($id);
        $personal->code = $request->name;
        $personal->description = $request->description;

        $personal->save();
        return redirect()->route('personal.index');
    }

    public function destroy($id)
    {
        // $personal = Personal::find($id);
        // $personal->delete();
        // return redirect()->route('sistemas.index');

        try {
            $personal = Personal::with('courses')->find($id);
            
            foreach ($personal->courses as $course) {
                $course->delete();
            }
            $personal = Personal::with('procs')->find($id);
            
            foreach ($personal->procs as $proc) {
                $proc->delete();
            }
            $personal->delete();

            return redirect()->route('sistemas.index');
        } catch (ModelNotFoundException $e) {
            return response()->json('El usuario con ID ' . $id . ' no se encontró', 404);
        } catch (Exception $e) {
            return response()->json('Error al eliminar : ' . $e->getMessage(), 500);
        }
    }
}
