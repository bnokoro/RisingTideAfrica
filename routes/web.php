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

Route::get('/admin', function () {
    return view('backend/content_layout');
});


Route::get('/mentors', function () {
    return view('frontend/mentors');
});


Route::get('/mentees', function () {
    return view('frontend/mentees');
});