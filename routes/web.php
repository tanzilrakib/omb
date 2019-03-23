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

Route::get('/', 'MainController@index')->middleware(['auth.shop','billable'])->name('home');

Route::get('/main-script', 'MainController@mainScript')->middleware(['auth.shop'])->name('main-script');
