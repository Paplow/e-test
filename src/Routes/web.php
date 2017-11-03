<?php

use Illuminate\Support\Facades\Route;

Route::namespace('Paplow\eTest\Controllers')
    ->middleware('web')->group(function (){

    Route::resource('e-test', 'eTestController');

});
