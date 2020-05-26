<?php

namespace App\Http\Controllers;

use App\User;
use App\Mentee;
use App\Mentor;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::with('mentor', 'mentee')->orderBy('first_name')->get()->toArray();
        $sn = 1;

        return view('admin.users.index', compact('users', 'sn'));
    }

    public function destroy(User $user)
    {
        $message = 'User deleted successfully';

        $user->delete();

        return redirect()->back()->with('success', $message);
    }

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

        $mentor = Mentor::whereDayChoosen($date);

        if (!$mentor->exists()) {
            return response()->json(['mentor_exists' => false]);
        }

        $time_choosen = $mentor->first()->time_choosen;

        return response()->json(['slot_exists' => Mentee::whereDayChoosen($date)->exists(), 'mentor_exists' => true, 'time_choosen' => $time_choosen]);
    }
}
