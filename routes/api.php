<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/data','DataController@index');
Route::post('/data','DataController@store');
Route::put('/data/{id}','DataController@update');
Route::delete('/data/{id}','DataController@destroy');
//cara panngil
//DELETE    http://127.0.0.1:8000/api/data/1 sertakan id pada url
//PUT       http://127.0.0.1:8000/api/data/1 sertakan id pada url
//POST      http://127.0.0.1:8000/api/data jangan lupa isi paramnya dengan ->nama dan ->no_telepon
//GET       http://127.0.0.1:8000/api/data
//karna kita memakai api.php jadi kita sertakan api di urlnya