<?php

namespace App\Http\Controllers;

use App\User;
use App\Mentee;
use Illuminate\Http\Request;

class MenteesController extends Controller
{
    public function index()
    {
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
}
