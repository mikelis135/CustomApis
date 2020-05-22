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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

    Route::get('/getstudents', 'ApiController@getStudent')->middleware('client');
    Route::post('/createstudent', 'ApiController@create');
    Route::get('/student/{id}', 'ApiController@getStudentById')->middleware('client');
    Route::get('/deletestudent/{id}', 'ApiController@deleteStudentById')->middleware('client');
    Route::put('/updatestudent', 'ApiController@updateStudentById')->middleware('client');
    Route::post('/register', 'Api\AuthController@register')->middleware('client');;
    Route::post('/login', 'Api\AuthController@login');

