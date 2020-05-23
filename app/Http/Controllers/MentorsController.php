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
        $mentors= Mentor::orderBy('first_name')->get()->toArray();
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

      

        if (
            Mentor::whereCategoryId($request->category_id)
            ->whereDayChoosen($request->day_choosen)
            ->whereTimeChoosen($request->time_choosen)
            ->exists()
            ) {
                return redirect()->back()->with('error', 'Select Day and Time has been booked!');
            }

        Mentor::create($request->except('day_choosen') + [
            'day_choosen' => Carbon::createFromFormat('d-m-Y', $request->day_choosen)->format('Y-m-d')
        ]);

        return redirect()->back()->with('success', 'Booking Created');
    }
}
