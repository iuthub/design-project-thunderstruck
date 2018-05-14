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

Route::get('/', "IndexController@index")->name('index');
Route::post('/sendMessage', "IndexController@message")->name('message');


Route::get('/categories', "IndexController@categories")->name('categories');
Route::prefix('booking')->group(function () {
	Route::match(['get', 'post'], '/book', "IndexController@book")->name('book');
	Route::get('/available', "IndexController@available")->name('available');
});


Route::prefix('admin')->group(function () {
	
	$c = "Admin\MainController";
	
	Auth::routes();
  Route::get('/', $c."@index")->name('admin-index');
  Route::match(['get', 'post'], '/profile', $c."@profile")->name('admin-profile');
  Route::match(['get', 'post'], '/mainpage', "{$c}@mainPage")->name('admin-mainpage');
  
  Route::prefix('roomscategories')->group(function () {	
  	$c = "Admin\MainController";

	  Route::get('/', $c."@roomsCategory")->name('admin-roomsCategory');
	  Route::match(['get', 'post'], '/add', "{$c}@roomsCategoryAdd")->name('admin-roomsCategoryAdd');
	  Route::match(['get', 'post'], '/edit/{id}',"{$c}@roomsCategoryEdit")->name('admin-roomsCategoryEdit');
	  Route::get('/delete/{id}', "{$c}@roomsCategoryDelete")->name('admin-roomsCategoryDelete');
	});

	Route::prefix('rooms')->group(function () {	
  	$c = "Admin\MainController";

	  Route::get('/', $c."@rooms")->name('admin-rooms');
	  Route::match(['get', 'post'], '/add', "{$c}@roomsAdd")->name('admin-roomsAdd');
	  Route::match(['get', 'post'], '/edit/{id}',"{$c}@roomsEdit")->name('admin-roomsEdit');
	  Route::get('/delete/{id}', "{$c}@roomsDelete")->name('admin-roomsDelete');
	});

	Route::prefix('gallery')->group(function () {	
  	$c = "Admin\MainController";

	  Route::match(['get', 'post'], '/add', "{$c}@images")->name('admin-images');
	  Route::get('/delete/{id}', "{$c}@imageDelete")->name('admin-imageDelete');
	});

	Route::prefix('carousel')->group(function () {	
  	$c = "Admin\MainController";

	  Route::match(['get', 'post'], '/add', "{$c}@carousel")->name('admin-carousel');
	  Route::get('/delete/{id}', "{$c}@carouselDelete")->name('admin-carouselDelete');
	});

});



Route::prefix('api')->group(function () {

	Route::resource('/main', "Api\Main");
	Route::resource('/message', "Api\Main");

});

Route::get("/view", function(){
	return view("3d");
})->name("3d");

