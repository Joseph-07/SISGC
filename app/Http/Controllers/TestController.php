<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(){
        $tests = Test::paginate(10);
        return view('test.index', compact('tests'));
    }

    public function create(){

        return view('test.create');
    }
}
