<?php

use Illuminate\Support\Facades\Route;

Route::namespace('Paplow\eTest\Controllers')
    ->middleware('web')->group(function (){

    Route::prefix('e-test')->group(function () {
        Route::resource('subject', 'SubjectController');
    });
    Route::resource('e-test', 'eTestController');

});
