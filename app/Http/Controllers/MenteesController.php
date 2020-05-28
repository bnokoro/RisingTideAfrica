<?php

namespace App\Http\Controllers;

use App\Category;
use App\Mail\MentorAssigned;
use App\Mentor;
use App\Session;
use App\User;
use App\Mentee;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class MenteesController extends Controller
{
    public function index()
    {
        $mentees = Mentee::with('category', 'stage')->orderBy('first_name')->get()
            ->map(function ($mentee) {
                $time = '';
                if ($mentee->time_choosen == 5) {
                    $time = '5pm - 6pm';
                } else if ($mentee->time_choosen == 6) {
                    $time = '6pm - 7pm';
                }
                $mentee->time = $time;
                return $mentee;
            })
            ->toArray();
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
        $request->validate([
            'email' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'category_id' => 'required',
            'stage_id' => ['required', function ($attribute, $value, $fail) {
                if ($value == 1) {
                    $fail('Selected stage has no mentor. Please select another stage');
                }
            }],
            'time_choosen' => 'required',
            'day_choosen' => 'required',
        ]);

        $session = Session::whereActive(1)->first();

        if (!$session) {
            return redirect()->back()->with('error', 'There are no active sessions. Please check back later');
        }

        if (Mentee::whereEmail($request->email)->exists()) {
            return redirect()->back()->with('error', 'You\'ve registered before.');
        }

        $day_choosen = Carbon::createFromFormat('m/d/Y', $request->selected_date)->format('Y-m-d');

        if ( Mentee::whereDayChoosen($day_choosen)->exists()) {
            return redirect()->back()->with('error', 'Selected Day has been booked!');
        }

        // Mentor
        $mentor = Mentor::where('day_choosen', $day_choosen)->whereCategoryId($request->category_id)->first();

        if (!$mentor) {
            return redirect()->back()->with('error', 'There is no available mentor for selected date and category. Please choose another');
        }

        $image_path = '';
        if ($image = $request->file('company_file')) {
            $path = Storage::put('public/mentee_uploads', $image);
            $image_path = env('APP_URL') . Storage::url($path);
        }

        $mentee = Mentee::create($request->except('day_choosen', 'time_choosen', 'session_id') + [
                'day_choosen' => $day_choosen,
                'time_choosen' => mb_substr($request->time_choosen, 0, 1),
                'session_id' => $session->id,
                'company_file_url' => $image_path
            ]);

        $mentor->update(['mentee_id' => $mentee->id]);

        Mail::to($mentor->email)->send(new MentorAssigned($mentee, $mentor));

        return redirect()->back()->with('success', 'Booking Created');
    }
}
