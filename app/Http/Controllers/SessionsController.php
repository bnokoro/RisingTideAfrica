<?php

namespace App\Http\Controllers;

use App\Session;
use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function index(Request $request)
    {
        $sessions = Session::latest()->get();

        if ($request->expectsJson()) {
            return response()->json(['data' => $sessions]);
        }

        $sn = 1;

        return view('admin.sessions.index', compact('sessions', 'sn'));
    }

    public function activeSession()
    {
        return response()->json(['data' => Session::whereActive(1)->first()]);
    }

    public function create()
    {
        $action = '/admin/sessions/';
        $session = null;

        return view('admin.sessions.create', compact('action', 'session'));
    }

    public function edit(Session $session)
    {
//        return $session;
        $action = '/admin/sessions/' . $session->id;

        return view('admin.sessions.create', compact('action', 'session'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        if ($request->active) {
            Session::query()->update(['active' => false]);
        }

        Session::create($request->all());

        return redirect('/admin/sessions')->with('success', 'Created Session');
    }

    public function update(Session $session, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        if ($request->active) {
            Session::query()->update(['active' => false]);
        }

        $session->update($request->all());

        return redirect('/admin/sessions')->with('success', 'Updated Session');
    }

    public function destroy(Session $session)
    {
        $session->delete();

        return redirect('/admin/sessions')->with('success', 'Deleted Session');
    }
}
