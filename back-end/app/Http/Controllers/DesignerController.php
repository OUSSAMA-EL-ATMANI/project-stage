<?php

namespace App\Http\Controllers;

use App\Models\Designer;
use App\Models\Question;
use App\Mail\QuestionMail;
use App\Models\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class DesignerController extends Controller
{


    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($designer = Designer::where('email', $request->email)->first()) {
            if (!Hash::check($request->password, $designer->password)) {
                return response(['message' => 'Le mot de passe est incorrect', 'errors' => ['password' => ['Le mot de passe est incorrect']]], 422);
            }
        } else {
            return response(['message' => 'Cet utilisateur n\'existe pas', 'errors' => ['email' => ['Cet utilisateur n\'existe pas']]], 422);
        }

        return response([
            'token' => $designer->createToken('Designer')->plainTextToken
        ]);
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }
    public function push(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Designer $designer)
    {
        //
    }

    public function sendQuestions(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,txt,pdf,doc|max:5000',
        ]);

        // Save file
        $uploadedFile = $request->file('file');
        $fileName = $uploadedFile->getClientOriginalName();
        $fileExtension = $uploadedFile->extension();
        $filePath = $fileName . '.' . $fileExtension;

        // Check if the file already exists, delete if it does
        if (Storage::disk('public')->exists($filePath)) {
            Storage::disk('public')->delete($filePath);
        }

        // Store the new file
        Storage::disk('public')->put($filePath, file_get_contents($uploadedFile));

        // Save question with file name
        $question = new Question();
        $question->file_path = $filePath; // Set file path here
        $question->designer_id = auth('designer')->user()->id;
        $question->save();
        Validator::each(function ($validator) use ($question) {
            Mail::to($validator->email)->send(new QuestionMail(auth('designer')->user(), $question));
        });
        return response(['message' => 'Questions envoyée']);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Designer $designer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Designer $designer)
    {
        //
    }
}
