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
    $tasks = [
        ['task' => 'Start learning Laravel', 'completed' => true],
        ['task' => 'Keep learning Vue', 'completed' => true],
        ['task' => 'Keep learning Postgres', 'completed' => false],
        ['task' => 'Keep learning Redis', 'completed' => false],
        ['task' => 'Keep learning modern HTML/CSS', 'completed' => true],
        ['task' => 'Stay calm', 'completed' => false]
    ];

    return view('home', ['tasks' => $tasks]);
});


Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});
