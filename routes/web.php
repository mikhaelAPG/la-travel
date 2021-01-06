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


Route::get('/', function () {
    return view('landing');
})->middleware('log');

Route::get('/menu', function () {
    return view('user.menu');
})->name('menu')->middleware('log');

Route::get('/destination', 'FilesController@index_dest')->middleware('log');
Route::get('/hotel','FilesController@index_hotel')->middleware('log');
Route::get('/culinary', 'FilesController@index_cul')->middleware('log');
Route::get('/detail/{title}', 'FilesController@show')->middleware('log');

Route::get('/profile', 'AuthController@show')->middleware('log');
Route::get('/edit', 'AuthController@edit')->middleware('log');
Route::patch('/edit', 'AuthController@update')->middleware('log');

Route::get('/forgot', 'AuthController@forgot')->middleware('log');

//=========================On Development=============================
Route::post('/forgot', 'AuthController@forgot_password')->middleware('log');
//====================================================================

Route::get('/new', function () {
    return view('auth.passwords.newPass');
})->middleware('log');


Route::get('/login','AuthController@getLogin')->middleware('guest');
Route::post('/login','AuthController@postLogin')->name('login')->middleware('guest');
Route::get('/register','AuthController@getRegister')->middleware('guest');
Route::post('/register','AuthController@postRegister')->name('register')->middleware('guest');
Route::get('/logout','AuthController@logout')->middleware('auth');

//Admin

Route::get('/admin', function () {
    return view('admin.admin');
})->name('admin')->middleware('admin');

Route::get('/admin/createData', 'FilesController@create')->name('admin')->middleware('admin');
Route::post('/admin/createData', 'FilesController@store')->name('admin')->middleware('admin');
Route::get('/admin/editDestination','FilesController@index_editDest')->middleware('admin');
Route::get('/admin/editCulinary', 'FilesController@index_editCul')->middleware('admin');
Route::get('/admin/editHotel','FilesController@index_editHotel')->middleware('admin');
Route::get('/admin/editDestination/{title}','FilesController@edit')->middleware('admin');
Route::get('/admin/editCulinary/{title}', 'FilesController@edit')->middleware('admin');
Route::get('/admin/editHotel/{title}','FilesController@edit')->middleware('admin');
Route::patch('/update/{title}/{type}','FilesController@update')->middleware('admin');
Route::delete('/delete/{title}/{name}', 'FilesController@destroyGal')->middleware('admin');
Route::delete('/edit/delete/{type}/{title}', 'FilesController@destroy')->middleware('admin');
