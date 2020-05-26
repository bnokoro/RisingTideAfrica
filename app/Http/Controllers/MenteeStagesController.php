<?php

namespace App\Http\Controllers;

use App\Stage;
use Illuminate\Http\Request;

class MenteeStagesController extends Controller
{
    public function index()
    {
        $stages = Stage::orderBy('name', 'ASC')->get();
        $sn = 1;

        return view('admin.mentee-stages.index', compact('stages', 'sn'));
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required']);

        if (Stage::whereName($request->name)->exists()) {
            return redirect()->back()->with('error', 'Mentee Stage Already Exists!');
        }

        $stage = Stage::create($request->all());

        return redirect('/admin/mentee-stages')->with('success', $stage->name . 'Mentee Stage created successfully!');
    }

    public function create()
    {
        $stage = null;
        $action = '/admin/mentee-stages';
        return view('admin.mentee-stages.create', compact('stage', 'action'));
    }

    public function show(Stage $stage)
    {

    }

    public function edit(Stage $mentee_stage)
    {
        $stage = $mentee_stage;
        $action = '/admin/mentee-stages/' . $mentee_stage->id;

        return view('admin.mentee-stages.create', compact('stage', 'action'));
    }

    public function update(Stage $mentee_stage, Request $request)
    {
        $message = $request->name . ' mentee stage created successfully.';

        $request->validate(['name' => 'required']);
        $mentee_stage->update(['name' => $request->name]);

        return redirect('/admin/mentee-stages')->with('success', $message);
    }

    public function destroy(Stage $mentee_stage)
    {
        $message = $mentee_stage->name . ' mentee stage has been deleted!';
        $mentee_stage->delete();

        return redirect()->back()->with('success', $message);
    }
}
