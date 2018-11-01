<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/notes', ['uses'=> 'NoteController@index', 'as' => 'api.notes']);
Route::get('/note/{id}', ['uses'=> 'NoteController@single', 'as' => 'api.note']);
Route::post('/note/create', ['uses'=> 'NoteController@create', 'as' => 'api.note.create']);
Route::post('/note/delete', ['uses'=> 'NoteController@delete', 'as' => 'api.note.delete']);
Route::post('/note/update', ['uses'=> 'NoteController@update', 'as' => 'api.note.update']);