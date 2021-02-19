<?php

use Illuminate\Http\Request;

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

/*Route::resource('categories', 'Api\CategoryController')->except(['create', 'edit']);*/

Route::apiResource('books', 'Api\BookController');