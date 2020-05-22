<?php

namespace App\Http\Controllers;

use App\User;
use App\Mentor;
use Illuminate\Http\Request;

class MentorsController extends Controller
{
       public function index()
    {
        $mentors= Mentor::orderBy('first_name')->get()->toArray();
        $sn = 1;

        return view('admin.mentors.index', compact('mentors', 'sn'));
    }
}
