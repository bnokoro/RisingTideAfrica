<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Mentee;
use App\Mentor;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $mentors = Mentor::count();
        $mentees = Mentee::count();
        $users = User::count();
        $admins = Admin::count();

        return view('home', compact('mentors', 'mentees', 'users', 'admins'));
    }
}
