<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/users/{id}/{name}', function($id, $name){
// 	return 'This is user '.$name.' with an id of '.$id;
// });

Route::get('/', 'PagesController@index');
Route::get('/parmums', 'PagesController@about');
// Route::get('/contact', 'PagesController@contact');

Route::resource('raksti', 'PostsController');

Route::resource('komentars', 'CommentController', ['except' => ['create']]);

Route::resource('receptes', 'RecipesController');

// Route::resource('ingredients', 'IngredientsController');
Route::resource('kategorijas', 'CategoriesController');



Route::get('/kontakti', 'EmailController@contact');
Route::post('/kontakti/send', 'EmailController@send');
Route::post('/search', 'SearchController@search');

// Route::get('/app', 'PagesController@app');

// Route::get('/', function(){
// 	return view('welcome');
// });
 
//  Route::get('/about', function(){
// 	return view('pages.about');
// });


Auth::routes(['verify' => true]);

Route::get('/profils', 'DashboardController@index')->middleware('verified');
Route::post('/profils', 'DashboardController@update');
Route::get('/blogaRaksti', 'DashboardController@blogPosts');
Route::get('/recepsuRaksti', 'DashboardController@recipePosts');
