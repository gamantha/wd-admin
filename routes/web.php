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

Route::get('/', function () {
    return view('home');
});

Route::prefix('admin')->group(function () {

    Route::get('/', function () {
        return view('home');
    });

    Route::prefix('report-template')->group(function () {
        Route::get('/', 'ReportTemplateController@index');
        Route::get('/add', 'ReportTemplateController@add');
        Route::post('/store', 'ReportTemplateController@store');
        Route::get('/del/{id}', 'ReportTemplateController@del');
    });

    Route::prefix('category')->group(function () {
        Route::get('/', 'CategoryController@index');
        Route::get('/add', 'CategoryController@add');
        Route::post('/store', 'CategoryController@store');
        Route::get('/del/{id}', 'CategoryController@del');
    });

    Route::prefix('indicator')->group(function () {
        Route::get('/', 'IndicatorController@index');
        Route::get('/add', 'IndicatorController@add');
        Route::post('/store', 'IndicatorController@store');
        Route::get('/del/{id}', 'IndicatorController@del');
    });

    Route::prefix('mapping')->group(function () {
        Route::get('/', 'MappingController@index');
        Route::get('/add', 'MappingController@add');
        Route::post('/store', 'MappingController@store');
        Route::get('/del/{id}', 'MappingController@del');
    });
});
