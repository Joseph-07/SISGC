<?php

namespace App\Http\Controllers;

use App\Models\Test;
use App\Models\Type_quest;
use Illuminate\Http\Request;

class QuestionController extends Controller{
    
    public function create($id){
        $test = Test::find($id);
        $typeQuests = Type_quest::all();
        return view('question.create', compact('test', 'typeQuests'));
    }
}
