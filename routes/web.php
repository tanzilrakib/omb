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

Route::get('/plans', 'MainController@plans')->middleware(['auth.shop'])->name('plans');

Route::get('/main-script', 'MainController@mainScript')->middleware(['auth.shop'])->name('main-script');

Route::get('/settings', 'MainController@viewSettings')->middleware(['auth.shop'])->name('settings');

Route::get('/get-liquid', 'LiquidController@getLiquidContents')->middleware(['auth.shop'])->name('get-liquid');
Route::get('/alter-liquid', 'LiquidController@alterLiquidContents')->middleware(['auth.shop'])->name('alter-liquid');
Route::get('/restore-searchbar', 'LiquidController@restoreOriginalSearchBar')->middleware(['auth.shop'])->name('restore-searchbar');
