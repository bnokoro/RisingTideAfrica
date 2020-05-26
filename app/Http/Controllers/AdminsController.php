<?php

namespace App\Http\Controllers;

use App\Admin;
use App\User;
use App\Http\Requests\AdminRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AdminsController extends Controller
{
   public function index()
    {
        $admins = Admin::latest()->get();
        $sn = 1;

        return view('admin.admins.index', compact('admins', 'sn'));
    }

    public function create()
    {  
        // return ($request->all());
        $admin = null;
        $action = '/admin/admins';

        return view('admin.admins.create', compact('admin',  'action'));
    }

     public function store(AdminRequest $request)
    {
        $user_password = Str::random(10);
        $password = Hash::make($user_password);

        $admin = Admin::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => $password,
           
            ]);


        return redirect('/admin/admins')->with('success', 'Admin Created Successfully');
    }

       public function edit(Admin $admin)
    {
        $action = '/admin/admins/' . $admin->id;
        $user = $admin;

        return view('admin.admins.create', compact('admin', 'action'));
    }

     public function update(Admin $admin, AdminRequest $request)
    {
        $admin->update($request->only('first_name', 'last_name', 'email'));

        return redirect('/admin/admins')->with('success', 'Admin Updated Successfully');
    }

    public function destroy(Admin $admin)
    {
        $message = 'Admin deleted successfully';

        $admin->delete();

        return redirect()->back()->with('success', $message);
    }

}
