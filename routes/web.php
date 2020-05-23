<?php

use Illuminate\Http\Request;
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
// Route::get('/', function () {
//     return view('test');
// });

// Route::post('/', function (Request $request) {
    
//     $path = $request->file('file')->getRealPath();
//     $data = array_map('str_getcsv', file($path));
    
//     foreach ($data as $user) {
//         App\User::create([
//             'first_name' => $user[0],
//             'last_name' => $user[1],
//             'email' => $user[2]
//         ]);
//     }

//     return 'done';
// });

Route::get('/admin', function () {
    return view('backend/content_layout');
});


Route::get('/mentors', function () {
    $categories = App\Category::all();

    return view('frontend/mentors', compact('categories', $categories));
});

Route::post('/mentors', 'MentorsController@store');

Route::post('/check-email', 'UsersController@checkEmail');

Route::get('/mentees', function () {
    return view('frontend/mentees');
});

 Route::resource('mentorship-categories', 'MentorshipCategoriesController');

 Route::resource('mentee-stages', 'MenteeStagesController');

 
 Route::resource('mentors-back', 'MentorsController');

 
 Route::resource('mentees-back', 'MenteesController');


