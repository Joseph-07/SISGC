<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{   
    


    public function reviewStore($id){
        $course = Course::find($id);
        $course->reviews()->create(request()->all());
        return redirect()->route('cursos.reviews', $id);
    }

    public function index()
    {
        $reviews = Review::all();
        return view('review.index', ['reviews' => $reviews]);
    }

    public function reviews($id){
        $reviews = Review::with('personal:id,name,last_name')->where('id_course', $id)->get();
        // dd($reviews);
        return view('course.review.index', compact('id', 'reviews'));
    }

    public function create($id)
    {
        return view('course.review.create', ['id' => $id]);
    }

    public function store($id , Request $request){
        $validated= $request->validate([
            'comment' => 'required',
        ],[
            'comment.required' => 'Por favor, ingrese una reseña.',
        ]);
        $review = new Review();
        $review->id_course = $id;
        $review->id_personal = '1';
        $review->comment = request('comment');
        $review->date = date('Y-m-d');
        $review->created_at = date('Y-m-d H:i:s');
        $review->updated_at = date('Y-m-d H:i:s');
        $review->save();
        return redirect()->route('cursos.reviews', $id);
    }

    public function show($id)
    {
        $review = Review::find($id);
        return view('review.show', ['review' => $review]);
    }

    public function edit($id)
    {
        $review = Review::find($id);
        // dd($review);
        return view('course.review.edit', compact('id','review'));
    }

    public function update($id, Request $request){
        $validated= $request->validate([
            'comment' => 'required',
        ],[
            'comment.required' => 'Por favor, ingrese una reseña.',
        ]);
        $review = Review::find($id);
        $review->comment = request('comment');
        $review->save();
        return redirect()->route('cursos.reviews', $review->id_course);
    }

    public function destroy($id)
    {
        $review = Review::find($id);
        // dd($review);
        $review->delete();
        return redirect()->route('cursos.reviews', $review->id_course);
    }
}
