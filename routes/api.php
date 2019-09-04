<?php
// route for single page web apps
Route::post('login', 'AuthController@login');
//integrasi api
Route::get('integrasi', 'ArsipController@integrasi');
//berita terbaru terpopuler api
Route::get('terbaru', 'ApiController@terbaru');
Route::get('terpopuler', 'ApiController@terpopuler');
Route::get('produk-hukum/download/{slug}', 'ApiController@download')->name('arsip.download');
//setting data routes
Route::get('web-setting', 'ApiController@setting');
Route::get('web-setting/{name}', 'ApiController@findSetting');
//web arsip api
Route::post('web-arsip', 'ApiController@arsip');
//web berita api
Route::post('web-berita', 'ApiController@berita');
Route::get('web-berita/terbaru', 'ApiController@beritaTerbaru');
Route::get('web-berita/detail/{slug}', 'ApiController@beritaDetail');
//select data api
Route::get('category/list', 'CategoryController@list')->name('category.list');
Route::get('berita/list', 'BeritaController@list')->name('berita.list');
//chart api
Route::post('chart', 'HomeController@chart');


Route::group(['middleware' => ['auth:api']], function () {
    Route::group(['middleware' => ['role:super-admin']], function () {
        Route::resource('/user', 'UserController')->except(['show', 'update']);
    });
    Route::resource('arsip', 'ArsipController');

    Route::resource('berita', 'BeritaController');

    Route::resource('category', 'CategoryController');

    Route::resource('setting', 'SettingController');

    Route::resource('category-berita', 'CategoryBeritaController');


    Route::get('profile', 'ProfileController@edit')->name('profile.edit');
    Route::put('profile', 'ProfileController@update')->name('profile.update');
    Route::post('profile', 'ProfileController@avatar')->name('profile.avatar');


    Route::post('home/filter', 'HomeController@filter');
});