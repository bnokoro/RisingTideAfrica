<?php

namespace App\Http\Controllers;

use App\Category;
use App\Mentee;
use App\Session;
use App\User;
use App\Mentor;
use Illuminate\Http\Request;
use Carbon\Carbon;

class MentorsController extends Controller
{
    public function index()
    {
        $mentors = Mentor::with('category', 'mentee')->orderBy('first_name')->get()
            ->map(function ($mentor) {
                $time = '';
                if ($mentor->time_choosen == 5) {
                    $time = '5pm - 6pm';
                } else if ($mentor->time_choosen == 6) {
                    $time = '6pm - 7pm';
                }
                $mentor->time = $time;
                return $mentor;
            })
            ->toArray();
        $sn = 1;

        return view('admin.mentors.index', compact('mentors', 'sn'));
    }

    public function destroy(Mentor $mentor)
    {
        $message = 'Mentor deleted successfully';

        $mentor->delete();


        return redirect()->back()->with('success', $message);
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'category_id' => 'required',
            'time_choosen' => 'required',
            'day_choosen' => 'required',
        ]);

        $session = Session::whereActive(1)->first();

        if (!$session) {
            return redirect()->back()->with('error', 'There are no active sessions. Please check back later');
        }

        if (Mentor::whereEmail($request->email)->exists()) {
            return redirect()->back()->with('error', 'You\'ve registered before.');
        }

        $day_choosen = Carbon::createFromFormat('m/d/Y', $request->selected_date)->format('Y-m-d');

        if (
        Mentor::whereDayChoosen($day_choosen)
            ->exists()
        ) {
            return redirect()->back()->with('error', 'Selected Day has been booked!');
        }

        Mentor::create($request->except('day_choosen', 'session_id') + [
                'day_choosen' => $day_choosen,
                'session_id' => $session->id
            ]);

        return redirect()->back()->with('success', 'Booking Created');
    }

    public function slotsOccupied()
    {
        $current_session = Session::whereActive(1)->first();

        if (!$current_session) {
            return response()->json(['mentor' => false, 'mentor' => false]);
        }

        $no_days = Carbon::parse($current_session->end_date)->diffInDays(Carbon::parse($current_session->start_date)) + 1;

        $mentors = Mentor::whereSessionId($current_session->id)->count() < $no_days;
        $mentees = Mentee::whereSessionId($current_session->id)->count() < $no_days;

        return response()->json(['mentor' => false, 'mentee' => false]);
    }
}
