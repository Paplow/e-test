<?php

use Illuminate\Support\Facades\Route;

Route::namespace('Paplow\eTest\Controllers')
    ->middleware('web')->group(function (){

    Route::prefix('e-test')->group(function () {
        Route::resource('subject', 'SubjectController', ['except' => ['create']]);

        Route::get('/{subject}/start', 'TestController@start')->name('test.start');
        Route::post('/{subject}/finish', 'TestController@finish')->name('test.finish');
        Route::get('subject/{subject}/{question}', 'QuestionController@show')->name('question.show');
        Route::post('question/{subject}', 'QuestionController@store')->name('question.store');
        Route::resource('question', 'QuestionController', ['except' => ['store', 'show']]);

        Route::post('option/{question}', 'OptionController@store')->name('option.store');
        Route::resource('option', 'OptionController', ['except' => ['store']]);
    });
    Route::resource('e-test', 'eTestController');

});
