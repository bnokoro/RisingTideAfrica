<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class MentorshipCategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('name', 'ASC')->get();
        $sn = 1;

        return view('admin.mentorship-categories.index', compact('categories', 'sn'));
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required']);

        if (Category::whereName($request->name)->exists()) {
            return redirect()->back()->with('error', 'Category Already Exists!');
        }

        $category = Category::create($request->all());

        return redirect('/admin/mentorship-categories')->with('success', $category->name . ' category created successfully!');
    }

    public function create()
    {
        $category = null;
        $action = '/admin/mentorship-categories';
        return view('admin.mentorship-categories.create', compact('category', 'action'));
    }

    public function show(Category $category)
    {

    }

    public function edit(Category $mentorship_category)
    {
        $category = $mentorship_category;
        $action = '/admin/mentorship-categories/' . $mentorship_category->id;

        return view('admin.mentorship-categories.create', compact('category', 'action'));
    }

    public function update(Category $mentorship_category, Request $request)
    {
        $message = $request->name . ' category created successfully.';

        $request->validate(['name' => 'required']);
        $mentorship_category->update(['name' => $request->name]);

        return redirect('/admin/mentorship-categories')->with('success', $message);
    }

    public function destroy(Category $mentorship_category)
    {
        $message = $mentorship_category->name . ' category has been deleted!';
        $mentorship_category->delete();

        return redirect()->back()->with('success', $message);
    }
}
