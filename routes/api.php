<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::prefix('tasks')->group(function () {
    Route::get('', 'App\Http\Controllers\Api\TaskController@index');
    Route::post('', 'App\Http\Controllers\Api\TaskController@store');
    Route::get('/{id}', 'App\Http\Controllers\Api\TaskController@show');
    Route::put('/{task}', 'App\Http\Controllers\Api\TaskController@update');
    Route::delete('/{id}', 'App\Http\Controllers\Api\TaskController@destroy');
});
Route::get('search', 'App\Http\Controllers\Api\TaskController@search');

