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

Route::get('/posts', 'Api\PostController@index')->name('api.posts');
Route::get('/posts/{slug}', 'Api\PostController@show')->name('api.show');
Route::get('/tags', 'Api\TagsController@index')->name('api.tags');
Route::get('/tags/{slug}', 'Api\TagsController@show')->name('api.tag.show');
Route::post('/leads', 'Api\LeadController@store')->name('api.leads.store');