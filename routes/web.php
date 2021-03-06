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

Route::get('/', 'WellcomeController@index');

Route::resource('profil', 'CarController');

Route::get('ok','OrgKemahasiswaanController@index')->name('ok.index');

Route::get('p3dk', 'ProposalController@indexPendahuluan');

Route::post('post','ProposalController@downloadTemplate')->name('post.word');

// Route::get('session/get','SessionController@accessSessionData');

// Route::get('session/set','SessionController@storeSessionData');

// Route::get('session/remove','SessionController@deleteSessionData');

Route::get('upload','ProposalController@indexUpload');

Route::get('status','ProposalController@indexStatus');

Route::get('status/detail','ProposalController@detailStatus');

Route::get('status/detail-revisi','ProposalController@detailRevisi');

Route::get('status/download','ProposalController@download');

Route::post('upload/file','ProposalController@uploadStorage');

Route::post('status/update','ProposalController@statusUpdate')->name('status.update');

Route::post('status/tambah','ProposalController@statusTambah')->name('status.tambah');

Route::post('status/upload', 'ProposalController@uploadRevision');

Route::post('status/delete', 'ProposalController@delete');

Route::get('user/mode', 'WellcomeController@userMode');

Route::get('dashboard', 'DashboardController@index');

Route::get('sendMail', 'DashboardController@sendMail');

Route::get('notify/{id}', 'DashboardController@notifyUser');

Route::get('pengaturan/profil', 'PengaturanController@profil')->name('pengaturan.profil');;

Route::get('pengaturan/privasi', 'PengaturanController@privasi')->name('pengaturan.privasi');

Route::post('pengaturan/profil/update', 'PengaturanController@update');

Route::post('pengaturan/profil/upload', 'PengaturanController@changePhoto');

Route::post('pengaturan/profil/change-password', 'PengaturanController@changePassword');

Route::post('dashboard/tambah-akun', 'DashboardController@tambahAkun');

Route::post('callback', 'LineController@callback');

Route::get('notification', 'LineController@notification');

Auth::routes();