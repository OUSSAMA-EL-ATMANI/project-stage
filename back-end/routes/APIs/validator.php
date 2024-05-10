<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ValidatorController;

Route::middleware(['auth:validator'])->group(function () {
    Route::post('/accept', [QuestionController::class, 'accept']);
    Route::post('/reject', [QuestionController::class, 'reject']);
    Route::apiResources([
        'questions' => QuestionController::class,
    ]);
});
