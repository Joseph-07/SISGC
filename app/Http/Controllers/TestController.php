<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Personal;
use App\Models\Question;
use App\Models\Test;
use App\Models\Type_test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(){
        $tests = Test::paginate(10);
        // dd($tests);
        return view('test.index', compact('tests'));
    }

    public function show($id){
        $test = Test::find($id);
        $questions = Question::where('id_test', $id)->get();
        return view('test.show', compact('test', 'questions'));
    }

    public function create(){
        $courses = Course::all('id', 'code');
        $personals = Personal::all('id', 'name', 'last_name', 'code');
        $typeTests = Type_test::all('id', 'name');

        return view('test.create', compact('courses', 'personals', 'typeTests'));
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'time_h' => 'required',
            'time_m' => 'required',
            'random' => 'required',
            'grade_max' => ['required', 'gt:grade_min'],
            'grade_min' => 'required',
            'id_course' => 'required',
            'id_personal' => 'required',
            'id_type_test' => 'required',
        ], [
            'grade_max.gt' => 'El valor de la calificación máxima debe ser mayor que el valor de la calificación mínima.'
        ]);

        $test = new Test();
        $test->code = $request->name;
        $test->description = $request->description;
        $time = $request->time;
        $time = $request->time_h + ($request->time_m / 60);
        $time = date("H:i:s", ($time*3600));
        // dd($time);
        $test->time = $time;
        $test->date = date('Y-m-d');
        $test->random = $request->random;
        $test->grade_max = $request->grade_max;
        $test->grade_min = $request->grade_min;
        $test->id_personal = $request->id_personal;
        $test->id_course = $request->id_course;
        $test->id_type_test = $request->id_type_test;
        $test->save();  

        return redirect()->route('evaluaciones.index');
    }

    public function edit($id, $selec = 1){
        $test = Test::find($id);
        $courses = Course::all('id', 'code');
        $personals = Personal::all('id', 'name', 'last_name', 'code');
        $typeTests = Type_test::all('id', 'name');
        $questions = Question::where('id_test', $id)->get();
        return view('test.edit', compact('test', 'courses', 'personals', 'typeTests', 'questions', 'selec'));
    }

    public function update(Request $request, $id){

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'time_h' => 'required',
            'time_m' => 'required',
            'random' => 'required',
            'grade_max' => ['required', 'gt:grade_min'],
            'grade_min' => 'required',
            'id_course' => 'required',
            'id_personal' => 'required',
            'id_type_test' => 'required',
        ], [
            'grade_max.gt' => 'El valor de la calificación máxima debe ser mayor que el valor de la calificación mínima.'
        ]);
        $test = Test::find($id);
        $test->code = $request->name;
        $test->description = $request->description;
        $time = $request->time;
        $time = $request->time_h + ($request->time_m / 60);
        $time = date("H:i:s", ($time*3600));
        // dd($time);
        $test->time = $time;
        $test->date = date('Y-m-d');
        $test->random = $request->random;
        $test->grade_max = $request->grade_max;
        $test->grade_min = $request->grade_min;
        $test->id_personal = $request->id_personal;
        $test->id_course = $request->id_course;
        $test->id_type_test = $request->id_type_test;
        $test->save();
        return redirect()->route('evaluaciones.index');
    }

    public function destroy($id){
        $test = Test::find($id);
        $test->delete();
        return redirect()->route('evaluaciones.index');
    }

    public function present($id){
        $test = Test::find($id);
        $questions = Question::with('answers')->where('id_test', $id)->get();
        foreach($questions as $question){
            $question->total = 0;
            foreach ($question->answers as $answer){
                $question->total += $answer->value;
            }
            
        }
        // dd($questions);

        return view('test.present', compact('test', 'questions'));
    }

    public function results(Request $request, $id){
        // dd($request);
        $test = Test::find($id);

        if($test->type_test->name == 'Canal de aprendizaje'){
            dd($request);
            
        }else{
            echo "otro tipo de test";
        }

        
        // $questions = Question::with('answers')->where('id_test', $id)->get();
        // foreach($questions as $question){
        //     $question->total = 0;
        //     foreach ($question->answers as $answer){
        //         $question->total += $answer->value;
        //     }
            
        // }
        // // dd($questions);
        // return view('test.results', compact('test', 'questions'));


    }
}
