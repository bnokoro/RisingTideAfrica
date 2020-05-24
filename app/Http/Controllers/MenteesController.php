<?php

namespace App\Http\Controllers;

use App\Category;
use App\User;
use App\Mentee;
use Illuminate\Http\Request;
use Carbon\Carbon;

class MenteesController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('name')->get()->toArray();
        $mentees= Mentee::orderBy('first_name')->get()->toArray();
        $sn = 1;

        return view('admin.mentees.index', compact('mentees', 'sn'));
    }

    public function destroy(Mentee $mentee)
    {
        $message = 'Mentee deleted successfully';

        $mentee->delete();

        return redirect()->back()->with('success', $message);
    }

      public function store(Request $request)
    {
        
        // $request->validate([
        //     'email' => 'required',
        //     'first_name' => 'required',
        //     'last_name' => 'required',
        //     'phone' => 'required',
        //     'category_id' => 'required',
        //     'stage_id' => 'required',
        //     'time_choosen' => 'required',
        //     'day_choosen' => 'required',
        // ]);

        // //  if (Mentee::whereEmail($request->email)->exists()) {
        // //     return redirect()->back()->with('error', 'You\'ve registered before.');
        // // // }

        // $day_choosen = Carbon::createFromFormat('m/d/Y', $request->day_choosen)->format('Y-m-d');

        // if (
        // Mentee::whereDayChoosen($day_choosen)
        //     ->exists()
        // ) {
        //     return redirect()->back()->with('error', 'Selected Day has been booked!');
        // }

        // Mentee::create($request->except('day_choosen', 'time_choosen') + [
        //         'day_choosen' => $day_choosen,
        //         'time_choosen' => 5
        //     ]);

            
        // $mentee = Mentee::create($request->all());

        return redirect()->back()->with('success', 'Booking Created');
        // return ($request->all());
    }
}
