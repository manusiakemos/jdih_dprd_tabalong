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

//Route::get('/{any}', 'FrontendController@home')->where('any', '.*');

Route::get('admin', 'FrontendController@admin')->name('login');

/*Route::get('berita', 'FrontendController@berita');
Route::get('berita/{slug}', 'FrontendController@beritaShow');

Route::get('galeri', 'FrontendController@galeri');

Route::get('produk-hukum', 'FrontendController@arsip');

Route::get('pages/{halaman}', 'FrontendController@halaman');*/

// Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');

// Route::post('sociallogin/{provider}', 'AuthController@SocialSignup');
// Route::get('auth/{provider}/callback', 'OutController@index')->where('provider', '.*');
