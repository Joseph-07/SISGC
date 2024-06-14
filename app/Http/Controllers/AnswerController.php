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
        ], [
            'enunce.required' => 'El enunciado de la respuesta es obligatorio.',
        ]);
        // dd($request);
        $answers = Answer::where('id_question', $id)->get();
        $answer = new Answer();
        $question = Question::find($id);
        // dd($question->type_quest->name);
        if($question->type_quest->name != "Linea de aprendizaje"){
            $request->validate([
                'value' => 'required'
            ], [
                'value.required' => 'El valor de la respuesta es obligatorio.'
            ]);
            $answer->value= $request->value;
        }else{
            $answer->value = 0;
        }

        
        

        $lastAnswer = Answer::where('id_question', $id)->orderBy('created_at', 'desc')->first();
        
        $answer->enunce = $request->enunce;

        foreach($answers as $answerL){
            if($answerL->right == 1 && $request->right == "on" && $question->type_quest->name != 'Múltiple'){
                $request->validate([
                    'right' => 'declined',
                ], [
                    'right.declined' => 'Ya existe una respuesta correcta.'
                ]);
            }
        }

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
        // dd($answer);
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
        $question = Question::find($answer->id_question);
        if($question->type_quest->name != "Linea de aprendizaje"){
            $request->validate([
                'value' => 'required'
            ], [
                'value.required' => 'El valor de la respuesta es obligatorio.'
            ]);
            $answer->value= $request->value;
        }else{
            $answer->value = 0;
        }
        // dd($request);
        // dd($answer);
        $answers = Answer::where('id_question', $answer->id_question)->get();
        // dd($answers);
        foreach($answers as $answerL){
            if($answerL->right == 1 && $request->right == "on" && $question->type_quest->name != 'Múltiple'){
                $request->validate([
                    'right' => 'declined',
                ], [
                    'right.declined' => 'Ya existe una respuesta correcta.'
                ]);
            }
        }
        
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
