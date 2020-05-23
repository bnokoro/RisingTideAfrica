<?php

namespace App\Http\Controllers;

use App\User;
use App\Mentor;
use Illuminate\Http\Request;
use Carbon\Carbon;

class MentorsController extends Controller
{
    public function index()
    {
        $mentors = Mentor::orderBy('first_name')->get()->toArray();
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

        Mentor::create($request->except('day_choosen', 'time_choosen') + [
                'day_choosen' => $day_choosen,
                'time_choosen' => 5
            ]);

        return redirect()->back()->with('success', 'Booking Created');
    }
}
