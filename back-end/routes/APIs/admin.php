<?php

use App\Http\Controllers\FiliereController;
use App\Http\Controllers\QuestionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:admin'])->group(function () {
    Route::get('/filieres', [FiliereController::class, 'index']);
    Route::delete('/filieres/{filiere}', [FiliereController::class, 'destroy']);
    Route::get('/get-questions', [QuestionController::class, 'getAdminQuestions']);
    Route::get('/download-questions/{id}', [QuestionController::class, 'downloadQuestions']);
    Route::apiResources([
        'designers' => \App\Http\Controllers\DesignerController::class,
        'validators' => \App\Http\Controllers\ValidatorController::class
    ]);
});
