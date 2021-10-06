<?php

use Illuminate\Support\Facades\Route;

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
Auth::routes();



// Route::get('/isi_post', function(){
// 	return view('blog.isi_post');
// });

// Route::get('/home', function () {
//     return view('home');
// })->name('home');

Route::get('/', 'BlogController@index');
Route::get('/isi_post/{id}', 'BlogController@isi_post')->name('post.isi');
Route::get('/list_post', 'BlogController@list_post')->name('post.list');
Route::get('/list_category/{category}', 'BlogController@list_category')->name('blog.category');
Route::get('/cari', 'BlogController@cari')->name('blog.cari');




Route::group(['middleware' => 'auth'], function(){
Route::get('/home', 'HomeController@index')->name('home');
	//category
Route::get('/category','CategoryController@index')->name('cat.index');
Route::get('/category/create','CategoryController@create')->name('cat.create');
Route::post('/category/store','CategoryController@store')->name('cat.store');
Route::get('/category/edit/{id}','CategoryController@edit')->name('cat.edit');
Route::post('/category/update/{id}','CategoryController@update')->name('cat.update');
Route::delete('/category/delete/{id}','CategoryController@destroy')->name('cat.delete');

//tag
Route::get('/tag','TagsController@index')->name('tag.index');
Route::get('/tag/create','TagsController@create')->name('tag.create');
Route::post('/tag/store','TagsController@store')->name('tag.store');
Route::get('/tag/edit/{id}','TagsController@edit')->name('tag.edit');
Route::post('/tag/update/{id}','TagsController@update')->name('tag.update');
Route::delete('/tag/delete/{id}','TagsController@destroy')->name('tag.delete');

//post
Route::get('/post','PostController@index')->name('pos.index');
Route::get('/post/create','PostController@create')->name('pos.create');
Route::post('/post/store','PostController@store')->name('pos.store');
Route::get('/post/edit/{id}','PostController@edit')->name('pos.edit');
Route::post('/post/update/{id}','PostController@update')->name('pos.update');
Route::delete('/post/delete/{id}','PostController@destroy')->name('pos.delete');
//soft delete
Route::get('/post/tampilHapus','PostController@tampil_hapus')->name('pos.tampilHapus');
Route::get('/post/restore/{id}','PostController@restore')->name('pos.restore');
Route::delete('/post/kill/{id}','PostController@kill')->name('pos.kill');

//user
Route::get('/user','UserController@index')->name('user.index');
Route::get('/user/create','UserController@create')->name('user.create');
Route::post('/user/store','UserController@store')->name('user.store');
Route::get('/user/edit/{id}','UserController@edit')->name('user.edit');
Route::post('/user/update/{id}','UserController@update')->name('user.update');
Route::delete('/user/delete/{id}','UserController@destroy')->name('user.destroy');
});




