<?php

use Illuminate\Http\Request;

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
Route::post('/check-date', 'UsersController@checkDate');

Route::get('/mentees', function () {
    return view('frontend/mentees');
});

 Route::resource('mentorship-categories', 'MentorshipCategoriesController');

 Route::resource('mentee-stages', 'MenteeStagesController');


//  Route::resource('mentors', 'MentorsController');

//  Route::resource('mentees', 'MenteesController');


