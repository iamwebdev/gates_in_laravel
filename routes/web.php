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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/private', 'HomeController@private')->name('private');
Route::get('/add','HomeController@showForm');
Route::post('/add','HomeController@saveData');


# Policy Routes
Route::get('service/post/view', 'PostController@view');
Route::get('service/post/create', 'PostController@create');
Route::get('service/post/update', 'PostController@update');
Route::get('service/post/delete', 'PostController@delete');



#Collection Routes

Route::get('/collection',function(){
	$collection = collect(['John Doe', 'Jane Doe']);
	$collection->each(function($item, $key){
		dump($item);
	});
	dd('Stop');
});

Route::get('/spread',function(){
	$collection = collect([['John Doe', 35], ['Jane Doe', 33]]);
	$collection->eachSpread(function ($name, $age) {
    	dump($age);	
	});
	dd('Stop');
});
