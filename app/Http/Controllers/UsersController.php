<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function checkEmail(Request $request)
    {
        if (\App\User::whereEmail($request->email)->exists()) {
            return response()->json(true);
        } else {
            return response()->json(false);
        }
    }
}
