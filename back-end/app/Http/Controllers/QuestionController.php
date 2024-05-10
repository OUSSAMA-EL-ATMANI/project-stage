<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Mail\IsQuestions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Question::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        //
    }

    public function accept()
    {
        $request = request();
        $request->validate([
            'questions_id' => 'required|exists:questions,id',
        ]);
        $question = Question::find($request->questions_id);
        if (!$question) return response(['message' => 'Questions introuvable'], 404);


        $question->is_accepted = true;
        $question->save();

        Mail::to($question->designer->email)->send(new IsQuestions($question, true));
    }

    public function reject()
    {
        $request = request();
        $request->validate([
            'questions_id' => 'required|exists:questions,id',
        ]);
        $question = Question::find($request->questions_id);
        if (!$question) return response(['message' => 'Questions introuvable'], 404);


        $question->is_accepted = false;
        $question->save();

        Mail::to($question->designer->email)->send(new IsQuestions($question, false));
    }
}
