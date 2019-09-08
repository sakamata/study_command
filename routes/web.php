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
    return view('welcome');
});

Route::get('/no_args', function () {
    Artisan::call('output:test');
});

// php artisan hello:option --param=1 --param=2

Route::get('/with_args', function () {
    Artisan::call('hello:option', [
        'arg' => 'value',
        '--switch' => 'false',
    ]);
});
