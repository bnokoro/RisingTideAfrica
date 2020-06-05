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
//        return \Illuminate\Support\Facades\Hash::make('asdfghjkl');

    
//     return redirect('admin');
// })->name('admin');


Route::prefix('admin')->group(function () {

    Route::get('/login', 'AuthController@index')->middleware('guest')->name('login');
    Route::post('login', 'AuthController@store')->middleware('guest');
    Route::post('logout', 'AuthController@logout');

    Route::middleware('auth')->group(function () {
        Route::get('/', 'AdminController@index');
        Route::resource('mentorship-categories', 'MentorshipCategoriesController');
        Route::resource('mentee-stages', 'MenteeStagesController');

        Route::resource('mentors', 'MentorsController');
        Route::resource('mentees', 'MenteesController');

        Route::get('users', 'UsersController@index');
        Route::delete('users/{user}', 'UsersController@destroy');

        Route::resource('admins', 'AdminsController');

        Route::get('sessions', 'SessionsController@index');
        Route::get('sessions/create', 'SessionsController@create');
        Route::get('sessions/{session}/edit', 'SessionsController@edit');
        Route::post('sessions', 'SessionsController@store');
        Route::patch('sessions/{session}', 'SessionsController@update');
        Route::delete('sessions/{session}', 'SessionsController@destroy');
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
    return view('frontend/mentees', compact('categories', 'stages'));
});

Route::get('slots-available', 'MentorsController@slotsOccupied');

Route::get('sessions/active', 'SessionsController@activeSession');


Route::post('/mentees', 'MenteesController@store');

Route::get('/home', 'HomeController@index')->name('home');
