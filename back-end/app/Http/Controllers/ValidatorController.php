<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Mail\IsQuestions;
use App\Models\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ValidatorController extends Controller
{


    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator = Validator::where('email', $request->email)->first()) {
            if (!Hash::check($request->password, $validator->password)) {
                return response(['message' => 'Le mot de passe est incorrect', 'errors' => ['password' => ['Le mot de passe est incorrect']]], 422);
            }
        } else {
            return response(['message' => 'Cet utilisateur n\'existe pas', 'errors' => ['email' => ['Cet utilisateur n\'existe pas']]], 422);
        }

        return response([
            'token' => $validator->createToken('Validator')->plainTextToken
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
    /**
     * Store a newly created resource in storage.
     */


    /**
     * Display the specified resource.
     */
    public function show(Validator $validator)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Validator $validator)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Validator $validator)
    {
        //
    }
    
}
