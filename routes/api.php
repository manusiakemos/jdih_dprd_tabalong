<?php
// route for single page web apps
Route::post('login', 'AuthController@login');
//integrasi api
Route::get('integrasi', 'ArsipController@integrasi');
//berita terbaru terpopuler api
Route::get('web-menu', 'ApiController@webMenu');
Route::get('web-halaman/{halaman}', 'ApiController@webHalaman');
Route::get('terbaru', 'ApiController@terbaru');
Route::get('terpopuler', 'ApiController@terpopuler');
Route::get('produk-hukum/download/{slug}', 'ApiController@download')->name('arsip.download');
//setting data routes
Route::get('web-setting', 'ApiController@setting');
Route::get('web-setting/{name}', 'ApiController@findSetting');
//web arsip api
Route::post('web-arsip', 'ApiController@arsip');
//web gallery
Route::get('web-gallery', 'ApiController@gallery');
//web slider
Route::get('web-slider', 'ApiController@slider');
//web berita api
Route::post('web-berita', 'ApiController@berita');
Route::get('web-berita/terbaru', 'ApiController@beritaTerbaru');
Route::get('web-berita/terpopuler', 'ApiController@beritaTerpopuler');
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
    Route::resource('category', 'CategoryController');

    Route::resource('arsip', 'ArsipController');

    Route::resource('category-berita', 'CategoryBeritaController');

    Route::resource('berita', 'BeritaController');

    Route::resource('halaman', 'HalamanController');

    Route::resource('gallery', 'GalleryController');

    Route::resource('setting', 'SettingController');

    Route::resource('slider', 'SliderController');

    Route::resource('menu', 'MenuController');
    Route::post('menu-set-order', 'MenuController@setOrder');

    Route::get('profile', 'ProfileController@edit')->name('profile.edit');
    Route::put('profile', 'ProfileController@update')->name('profile.update');
    Route::post('profile', 'ProfileController@avatar')->name('profile.avatar');

    Route::post('home/filter', 'HomeController@filter');
});
