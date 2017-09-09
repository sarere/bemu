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

use App\Car;

Route::get('/', 'WellcomeController@index');

Route::resource('profil', 'CarController');

Route::get('ok','OrgKemahasiswaanController@index')->name('ok.index');

Route::get('p3dk', 'CarController@index');

Route::post('post','CarController@store')->name('post.word');

// Route::get('session/get','SessionController@accessSessionData');

// Route::get('session/set','SessionController@storeSessionData');

// Route::get('session/remove','SessionController@deleteSessionData');

Route::get('upload','ProposalController@indexUpload');

Route::get('status','ProposalController@indexStatus');

Route::post('upload/file','ProposalController@uploadStorage');

Auth::routes();