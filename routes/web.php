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

// Route::get('/', function () {
//     \Illuminate\Support\Facades\Mail::to('dj3plles@gmail.com')->send(new \App\Mail\MentorAssigned(\App\Mentee::first(), \App\Mentor::first()));
//     return 'sent';
// });

// Route::get('/', function () {
//        return \Illuminate\Support\Facades\Hash::make('asdfghjkl');
//         return redirect('admin');
// })->name('admin');

Route::prefix('admin')->group(function () {

//    Auth::routes();
    Route::get('/login', 'AuthController@index')->middleware('guest')->name('login');
    Route::post('login', 'AuthController@store')->middleware('guest');
    Route::post('logout', 'AuthController@logout');

    Route::get('/', function () {
        return view('home');
    });

    Route::middleware('auth')->group(function () {
        Route::resource('mentorship-categories', 'MentorshipCategoriesController');
        Route::resource('mentee-stages', 'MenteeStagesController');

        Route::resource('mentors', 'MentorsController');
        Route::resource('mentees', 'MenteesController');

        Route::get('users', 'UsersController@index');
        Route::delete('users/{user}', 'UsersController@destroy');

        Route::resource('admins', 'AdminsController');
    });

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





Route::get('/home', 'HomeController@index')->name('home');
//
