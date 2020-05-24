<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Mail\ResetAdminPassword;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AdminsController extends Controller
{
    public function index()
    {
        $admins = User::onlyAdmins()->get();
        $sn = 1;

        
        
        return view('admin.admins.index', compact('admins', 'sn'));
        
    }

    public function create()
    {
        // return ($request->all());
        $user = null;
        $action = '/admin/admins';

        return view('admin.admins.create', compact('user', 'action'));
    }

    public function store(AdminRequest $request)
    {
        $user_password = Str::random(10);
        $password = Hash::make($user_password);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => $password,
            
        ]);

        Mail::to($user->email)->send(new ResetAdminPassword($user, $user_password));

        return redirect('/admin/admins')->with('success', 'Admin Created Successfully');
    }

    public function edit(User $admin)
    {
        $action = '/admin/admins/' . $admin->id;
        $user = $admin;

        return view('admin.admins.create', compact('user', 'action'));
    }

    public function update(User $admin, AdminRequest $request)
    {
        $admin->update($request->only('first_name', 'last_name', 'email'));

        return redirect('/admin/admins')->with('success', 'Admin Updated Successfully');
    }
}
