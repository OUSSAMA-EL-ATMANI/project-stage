<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:admin'])->group(function () {
    Route::apiResources([
        'designers' => \App\Http\Controllers\DesignerController::class,
        'validators' => \App\Http\Controllers\ValidatorController::class
    ]);
});
