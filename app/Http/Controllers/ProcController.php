<?php

namespace App\Http\Controllers;

use App\Models\Proc;
use Illuminate\Http\Request;

class ProcController extends Controller
{
    public function index()
    {
        $procs = Proc::paginate(10);

        return view('proc.index', compact('procs'));
    }

    public function create()
    {
        return view('proc.create');
    }

    public function store(Request $request)
    {
        dd($request);
    }

    public function edit($id)
    {
        return view('proc.edit');
    }

    public function update(Request $request, $id)
    {
        dd($request);
    }

    public function destroy($id)
    {
        dd($id);
    }
}
