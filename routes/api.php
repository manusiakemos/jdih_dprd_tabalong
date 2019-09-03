<?php
// route for single page web apps

Route::post('login', 'AuthController@login');

Route::get('integrasi', 'ArsipController@integrasi');

Route::get('terbaru', 'ApiController@terbaru');
Route::get('terpopuler', 'ApiController@terpopuler');

Route::post('web-arsip', 'ApiController@arsip');

Route::post('web-berita', 'ApiController@berita');
Route::get('web-berita/terbaru', 'ApiController@beritaTerbaru');
Route::get('web-berita/detail/{slug}', 'ApiController@beritaDetail');

Route::get('category/list', 'CategoryController@list')->name('category.list');
Route::get('berita/list', 'BeritaController@list')->name('berita.list');


Route::group(['middleware' => ['auth:api']], function () {
    Route::group(['middleware' => ['role:super-admin']], function () {
        Route::resource('/user', 'UserController')->except(['show', 'update']);
    });
    Route::resource('arsip', 'ArsipController');

    Route::resource('berita', 'BeritaController');

    Route::resource('category', 'CategoryController');

    Route::resource('category-berita', 'CategoryBeritaController');


    Route::get('profile', 'ProfileController@edit')->name('profile.edit');
    Route::put('profile', 'ProfileController@update')->name('profile.update');
    Route::post('profile', 'ProfileController@avatar')->name('profile.avatar');


    Route::post('home/filter', 'HomeController@filter');
});