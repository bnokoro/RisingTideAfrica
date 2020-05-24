<?php

namespace App\Http\Controllers;

use App\Mentee;
use App\Mentor;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function checkEmail(Request $request)
    {
        $user = \App\User::whereEmail($request->email);
        if ($user->exists()) {
            return response()->json(['status' => true, 'user' => $user->first()]);
        } else {
            return response()->json(['status' => false]);
        }
    }

    public function checkDate(Request $request)
    {
        $date = Carbon::createFromFormat('m/d/Y', $request->selectedDate)->format('Y-m-d');

        return response()->json(['slot_exists' => Mentor::whereDayChoosen($date)->exists()]);
    }

    public function checkDateMentee(Request $request)
    {
        $date = Carbon::createFromFormat('m/d/Y', $request->selectedDate)->format('Y-m-d');

        if (!Mentor::whereDayChoosen($date)->exists()) {
            return response()->json(['mentor_exists' => false]);
        }

        return response()->json(['slot_exists' => Mentee::whereDayChoosen($date)->exists(), 'mentor_exists' => true]);
    }
}
