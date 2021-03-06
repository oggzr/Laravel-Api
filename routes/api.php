<?php

use Illuminate\Http\Request;
use App\Article;

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

Route::post('register', 'Auth\RegisterController@register');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout');
Route::get('/user', function (Request $request) {
        return $request->user()->middleware('auth:api');
    });

Route::group(['middleware' => 'auth:api'], function() {
  Route::get('articles', 'ArticleController@index');
  Route::get('articles/{article}', 'ArticleController@show');
  Route::post('articles', 'ArticleController@store');
  Route::put('articles/{article}', 'ArticleController@update');
  Route::delete('articles/{article}', 'ArticleController@delete');
});


// Route::get('articles', function(){
//   return Article::all();
// });
//
// Route::get('articles/{id}', function($id) {
//   return Article::find($id);
// });
//
// Route::post('articles', function(Request $request) {
//   return Article::create($requestall->all());
// });
//
// Route::put('articles/{id}', function(Request $request, $id) {
//   $article = Article::findOrFail($id);
//   $article = Article::update($request->all());
//   return $article;
// });
//
// Route::delete('articles/{id}', function($id) {
//   Article::find($id)->delete();
//   return 204;
// });
