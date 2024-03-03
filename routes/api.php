<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::prefix('tasks')->group(function () {
    Route::get('', 'App\Http\Controllers\Api\TaskController@index');
    Route::get('/{id}', 'App\Http\Controllers\Api\TaskController@show');
    Route::middleware('throttle:100')->group(function () {
        Route::post('', 'App\Http\Controllers\Api\TaskController@store');
        Route::put('/{task}', 'App\Http\Controllers\Api\TaskController@update');
        Route::delete('/{id}', 'App\Http\Controllers\Api\TaskController@destroy');
    });
});

