<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;

class AnswerController extends Controller{
    
    public function create($id){
        $question = Question::find($id);
        $selec = 2;
        return view('answer.create', compact('question', 'selec'));
    }

    public function store(Request $request, $id){
        $request->validate([
            'enunce' => 'required',
        ]);
        // dd($request);
        $lastAnswer = Answer::where('id_question', $id)->orderBy('created_at', 'desc')->first();
        $answer = new Answer();
        $answer->enunce = $request->enunce;
        if(isset($request->right)){
            $answer->right = true;
        }else{
            $answer->right = false;
        }
        $answer->id_question = $id;

        if($lastAnswer != null){
            $answer->order = $lastAnswer->order + 1;
        }else{
            $answer->order = 1;
        }
        $answer->save();
        return redirect()->route('preguntas.edit', ['id' => $id, 'selec' => 2]);
    }

    public function edit($id, $selec = 2){
        $answer = Answer::find($id);
        $question = Question::find($answer->id_question);
        $selecQ = 2;
        return view('answer.edit', compact('answer', 'question', 'selec', 'selecQ'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'enunce' => 'required',
        ]);
        
        $answer = Answer::find($id);
        // dd($answer);
        $answer->enunce = $request->enunce;
        if(isset($request->right)){
            $answer->right = true;
        }else{
            $answer->right = false;
        }
        $answer->save();
        return redirect()->route('preguntas.edit', ['id' => $answer->id_question, 'selec' => 2]);
    }

    public function destroy($id){
        $answer = Answer::find($id);
        $answer->delete();
        return redirect()->route('preguntas.edit', ['id' => $answer->id_question, 'selec' => 2]);
    }
}
