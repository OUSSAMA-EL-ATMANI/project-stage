<?php


use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'validator',
], function () {
    include 'Auth/validator.php';
    Route::middleware(['auth:validator'])->group(function () {
        include 'APIs/validator.php';
    });
});



Route::group([
    'prefix' => 'designer',
], function () {
    include 'Auth/designer.php';
    Route::middleware(['auth:designer'])->group(function () {
        include 'APIs/designer.php';
    });
});
