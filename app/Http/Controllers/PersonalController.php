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
        $personal->name = $request->name;
        $personal->last_name = $request->last_name;
        $personal->code = $request->code;
        $personal->email = $request->email;
        $personal->phone = $request->phone;
        $personal->address = $request->address;
        $personal->role = $request->role;
        $personal->password = bcrypt($request->password);
        // dd($request);
        $personal->save();
        return redirect()->route('personal.index');
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
        $personal->name = $request->name;
        $personal->last_name = $request->last_name;
        $personal->code = $request->code;
        $personal->email = $request->email;
        $personal->phone = $request->phone;
        $personal->address = $request->address;
        $personal->role = $request->role;
        $personal->password = bcrypt($request->password);

        $personal->save();
        return redirect()->route('personal.index');
    }

    public function destroy($id)
    {
        // $personal = Personal::find($id);
        // $personal->delete();
        // return redirect()->route('sistemas.index');

        try {
            $personal = Personal::find($id);
        
            $personal->delete();

            return redirect()->route('personal.index');
        } catch (ModelNotFoundException $e) {
            return response()->json('El usuario con ID ' . $id . ' no se encontró', 404);
        } catch (Exception $e) {
            return response()->json('Error al eliminar : ' . $e->getMessage(), 500);
        }
    }
}
