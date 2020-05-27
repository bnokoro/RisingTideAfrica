<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function __construct()
    {
        return $this->middleware('guest')->except('logout');
    }

    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|exists:admins,email',
            'password' => 'required'
        ]);

        $admin = Admin::whereEmail($request->email)->first();

        if (!Hash::check($request->password, $admin->password)) {
            return redirect()->back()->with('error', 'Incorrect Password');
        }

        auth()->login($admin);

        return redirect()->intended('admin');
    }

    public function logout(Request $request)
    {
        auth()->logout();

        return redirect('admin/login');
    }
}
