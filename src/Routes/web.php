<?php

use Illuminate\Support\Facades\Route;

Route::namespace('Paplow\eTest\Controllers')->middleware('web')->group(function (){

    Route::prefix('e-test')->group(function () {
        Route::get('/', 'eTestController@index')->name('e-test.index');

        Route::get('answer/showData/{subject}', 'AnswerController@getIndexData')->name('answer.indexData');
        Route::get('answer/{subject}', 'AnswerController@index')->name('answer.index');
        Route::get('answer/{subject}/{user}', 'AnswerController@show')->name('answer.show');

        Route::get('subject/indexData', 'SubjectController@getIndexData')->name('subject.indexData');
        Route::get('subject/showData/{subject}', 'SubjectController@getShowData')->name('subject.showData');
        Route::resource('subject', 'SubjectController', ['except' => ['create']]);

        Route::get('subject/{subject}/{question}', 'QuestionController@show')->name('question.show');
        Route::post('question/{subject}', 'QuestionController@store')->name('question.store');
        Route::resource('question', 'QuestionController', ['except' => ['store', 'show']]);

        Route::post('option/{question}', 'OptionController@store')->name('option.store');
        Route::resource('option', 'OptionController', ['except' => ['store']]);

        Route::get('/{subject}/start', 'TestController@start')->name('test.start');
        Route::post('/{subject}/finish', 'TestController@finish')->name('test.finish');
    });

});
