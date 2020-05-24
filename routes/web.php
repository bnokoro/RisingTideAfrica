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

Route::get('/', function () {
    \Illuminate\Support\Facades\Mail::to('dj3plles@gmail.com')->send(new \App\Mail\MentorAssigned(\App\Mentee::first(), \App\Mentor::first()));
    return 'sent';
});

Route::get('/admin', function () {
    return view('backend/content_layout');
});


Route::get('/mentors', function () {
    $categories = App\Category::all();

    return view('frontend/mentors', compact('categories'));
});

Route::post('/mentors', 'MentorsController@store');

Route::post('/check-email', 'UsersController@checkEmail');
Route::post('/check-date', 'UsersController@checkDate');
Route::post('/check-date-mentee', 'UsersController@checkDateMentee');

Route::get('/mentees', function () {

    $categories = App\Category::all();
    $stages = App\Stage::all();
    return view('frontend/mentees', compact('categories','stages'));
});


Route::post('/mentees', 'MenteesController@store');

 Route::resource('mentorship-categories', 'MentorshipCategoriesController');

 Route::resource('mentee-stages', 'MenteeStagesController');


 Route::resource('mentors-back', 'MentorsController');

 Route::resource('mentees-back', 'MenteesController');


