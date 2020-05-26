<?php

namespace App\Http\Controllers;

use App\Admin;
use App\User;
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
    {  return ($request->all());
        $user = null;
        $action = '/admin/admins';

        return view('admin.admins.create', compact('user', 'action'));
    }
}
