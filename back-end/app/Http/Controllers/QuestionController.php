<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Mail\IsQuestions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

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
        return $question;
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
    public function destroy($id)
    {
        $question = Question::find($id);
        if (!$question) return response()->json(['message' => 'question introuvable']);
        $question->delete();
        return response()->json(['message' => 'question a ete supprime avec succes']);
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



    public function validateQuestion()
    {
        $rules = [
            'questions_id' => 'required|exists:questions,id',
            'points' => 'required|numeric',
            'commentaire' => 'required',
        ];

        $validate = Validator::make(request()->all(), $rules);
        if ($validate->fails()) return response($validate->errors(), 400);

        $request = request();

        $question = Question::find($request->questions_id);
        if (!$question) {
            return response(['message' => 'Questions introuvable'], 404);
        };
        if ($request->points < 70) {
            $question->is_accepted = false;
        };
        if ($request->points >= 70) {
            $question->is_accepted = true;
        };
        $question->is_visible = true;
        $question->commentaire = $request->commentaire;
        $question->points = $request->points;
        $question->save();
        return response(['message' => 'Bien Valide'], 200);
    }

    public function getAdminQuestions()
    {
        $questions = Question::where('is_visible', true)->get();
        return response()->json($questions);
    }

    public function downloadQuestions($id)
    {
        $question = Question::find($id);
        if ($question) {
            $fileName = $question->file_path;
            $filePath = storage_path('app/public/' . $fileName);

            if (!file_exists($filePath)) {
                return response()->json([
                    "status" => 404,
                    "message" => "cette question n'a pas une pdf"
                ]);
            }

            $namePdf = 'Exam_' . $question->file_name . '.pdf';
            return response()->download($filePath, $namePdf); 
        } else {
            return response()->json([
                "status" => 404,
                "message" => "question non trouvé"
            ]);
        }
    }
}
