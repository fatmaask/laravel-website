<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', [
    'as' => '/',
     'uses' => 'PageControllers@getIndex'
]);
Route::get('latest', [
    'as' => 'latest',
     'uses' => 'PageControllers@getLatest'
]);
Route::get('movies', [
    'as' => 'movies',
     'uses' => 'PageControllers@getMovies'
]);
Route::get('top20', [
    'as' => 'top20',
     'uses' => 'PageControllers@getTop20'
]);
Route::get('actors', [
    'as' => 'actors',
     'uses' => 'PageControllers@getActors'
]);
Route::get('actor/{id}', [
    'as' => 'actor/{id}',
     'uses' => 'PageControllers@getActor'
]);
Route::get('genre/{id}', [
    'as' => 'genre/{id}',
     'uses' => 'PageControllers@getGenre'
]);
Route::get('about', [
    'as' => 'about',
     'uses' => 'PageControllers@getAbout'
]);

Route::get('user/{id}', [
    'as' => 'user/{id}',
     'uses' => 'PageControllers@getUser'
]);

Route::get('movie/{movie_id}/{name}', [
    'as' => 'movie/{movie_id}/{name}',
     'uses' => 'PageControllers@getMovie'
]);


/*Route::get('search', array(
     'as'    =>  'search',
     'uses'  =>  'SearchController@search'
 )); */

Route::post('movie/{movie_id}/{name}/comments', 'CommentsController@addComment');
Route::post('movie/{movie_id}/{name}/addToWatchlist', 'PageControllers@addToWatchlist');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('/', 'PageControllers@getIndex');
    Route::get('/latest', 'PageControllers@getLatest');
    Route::get('/movies', 'PageControllers@getMovies');
    Route::get('/movie/{movie_id}/{name}', 'PageControllers@getMovie');
    Route::get('/top20', 'PageControllers@getTop20');
    Route::get('/actors', 'PageControllers@getActors');
    Route::get('/actor/{id}', 'PageControllers@getActor');
    Route::get('/about', 'PageControllers@getAbout');
    Route::get('/genre/{id}', 'PageControllers@getGenre');
    Route::get('/user/{id}', 'PageControllers@getUser');
  //  Route::post('movie/{movie_id}/{name}/comments', 'CommentsController@addComment');
});
