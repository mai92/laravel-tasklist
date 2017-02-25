<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::prefix('user')->group(function() {
	Route::get('/{user}', 'UserController@show');
});

Route::prefix('task')->group(function() {
	Route::post('/', 'TaskController@create')->name('task.add');
    Route::get('/position/{position}', 'TaskController@position')->name('task.position');
});
