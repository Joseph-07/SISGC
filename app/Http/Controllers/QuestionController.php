<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Test;
use App\Models\Type_quest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class QuestionController extends Controller{
    
    public function create($id){
        $test = Test::find($id);
        $selec = 2;
        $typeQuests = Type_quest::all();
        return view('question.create', compact('test', 'typeQuests', 'selec'));
    }

    public function store(Request $request, $id){
        $request->validate([
            'enunce' => 'required',
            'id_type_question' => 'required',
        ]);
        $lastQuestion = Question::where('id_test', $id)->orderBy('created_at', 'desc')->first();
        // dd($lastQuestion);
        // dd($request);
        $question = new Question();
        if($lastQuestion != null){
            $question->order = $lastQuestion->order + 1;
        }else{
            $question->order = 1;
        }
        if(isset($request->require_jus)){
            $question->require_jus = $request->require_jus;
        }else{
            $question->require_jus = false;
        }

        
        $question->enunce = $request->enunce;
        if(isset($request->url_image)){
            // dd($request->url_image->getClientOriginalName());
            $question->image_name = $request->url_image->getClientOriginalName();
            $question->image = $request->url_image->storeAs('images', $question->image_name, 'public');
        }else{
            $question->image = null;
            $question->image_name = null;

        }
        if(isset($request->group)){
            $question->group = $request->group;
        }else{
            $question->group = null;
        }
        if(isset($request->require_jus)){
            $question->require_jus = true;
        }else{
            $question->require_jus = false;
        }
        $question->id_test = $id;
        $question->id_type_question = $request->id_type_question;
        $question->created_at= date('Y-m-d H:i:s');

        // dd($question);
        // $question->save();
        $selec=2;
        $question->save();
        return redirect()->route('evaluaciones.edit', ['id' => $id, 'selec' => $selec]);
    }

    public function edit($id, $selecQ = 1){
        $selec=2;
        $question = Question::find($id);
        $test = Test::find($question->id_test);
        $typeQuests = Type_quest::all();
        $answers = Answer::where('id_question', $id)->get();
        return view('question.edit', compact('question', 'test', 'typeQuests', 'selec', 'selecQ', 'answers'));
    }

    public function update(Request $request, $id){
        // dd($request->enunce);
        $question = Question::find($id);
        // dd($question);
        $question->enunce = $request->enunce;
        if(isset($request->url_image)){
            if($question->image != null){
                Storage::disk('public')->delete($question->image);
            }
            $question->image_name = $request->url_image->getClientOriginalName();
            $question->image = $request->url_image->storeAs('images', $question->image_name, 'public');
        }
        $question->id_type_question = $request->id_type_question;
        $question->group = $request->group;
        $question->updated_at= date('Y-m-d H:i:s');
        $question->save();
        $selec = 2;
        return redirect()->route('evaluaciones.edit', ['id' => $question->id_test, 'selec' => $selec]);
    }

    public function destroy($id){
        $question = Question::find($id);
        $selec = 2;
        $question->delete();
        return redirect()->route('evaluaciones.edit', ['id' => $question->id_test, 'selec' => $selec]);
    }
}
