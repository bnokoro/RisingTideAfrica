<?php

namespace App\Http\Controllers;

use App\Session;
use App\Time;
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
        $action = route('storeSession');
        $session = null;

        return view('admin.sessions.create', compact('action', 'session'));
    }

    public function edit(Session $session)
    {
        $action = route('updateSession', $session->id);

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

    public function indexTime()
    {
        $times = Time::latest()->get();
        $sn = 1;

        return view('admin.times.index', compact('times', 'sn'));
    }

    public function createTime()
    {
        $action = route('storeTime');
        $time = null;

        return view('admin.times.create', compact('action', 'time'));
    }

    public function editTime(Time $time)
    {
        $action = route('updateTime', $time->id);

        return view('admin.times.create', compact('action', 'time'));
    }

    public function storeTime(Request $request)
    {
        $request->validate([
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        $start_time_int = mb_substr($request->start_time, 0, 1, 'UTF-8');

        Time::create($request->all() + ['start_time_int' => $start_time_int]);

        return redirect('/admin/time-setting')->with('success', 'Created Successfully');
    }

    public function updateTime(Time $time, Request $request)
    {
        $request->validate([
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        $start_time_int = mb_substr($request->start_time, 0, 1, 'UTF-8');

        $time->update($request->all() + ['start_time_int' => $start_time_int]);

        return redirect('/admin/time-setting')->with('success', 'Updated Time');
    }

    public function destroyTime(Time $time)
    {
        $time->delete();

        return redirect('/admin/time-setting')->with('success', 'Deleted Time');
    }
}
