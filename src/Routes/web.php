<?php

use Illuminate\Support\Facades\Route;

Route::namespace('Paplow\eTest\Controllers')
    ->middleware('web')->group(function (){

    Route::prefix('e-test')->group(function () {
        Route::resource('subject', 'SubjectController');
        Route::post('question/{subject}', 'QuestionController@store')->name('question.store');
        Route::resource('question', 'QuestionController', ['except' => 'store']);
    });
    Route::resource('e-test', 'eTestController');

});
