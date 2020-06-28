<?php

//use Illuminate\Http\Request;
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

// ### Namespace WebMain\Post
// Ex. access : [POST] domain.com/api/post/store
Route::namespace('WebMain\Posts')->group(function () {
  //group post
  Route::prefix('posts')->group(function(){
    Route::get('', 'PostController@index');
    //Route::get('{post}', 'PostController@show')->name('post.show'); //{post} => Object Model Post
    Route::get('{post:slug}', 'PostController@show')->name('post.show'); //{post:slug} => Object post model and spesific / key : slug
    //Route::get('{category:slug}/{post:slug}', 'PostController@show')->name('post.show'); //route domain.com/api/post/toefl/this-is-post-3
    Route::post('store', 'PostController@store');
  });

  //group category
  Route::prefix('categories')->group(function(){
    Route::get('', 'CategoryController@index');
  });
});
