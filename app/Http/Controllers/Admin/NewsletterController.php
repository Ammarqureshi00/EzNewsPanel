<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{

    public function index()
    {
        $newsletters = Newsletter::all();
        return  view('admin.newsletters.index', compact('newsletters'));
    }
    public function create()
    {
        return view('admin.newsletters.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:30'
        ]);

        $data = $request->only(['title', 'content']);

        if ($request->hasFile('image')) {
            $filename = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('uploads/newsletters'), $filename);
            $data['image'] = $filename;
        }

        Newsletter::create($data);

        return redirect()->route('admin.newsletters.index')->with('success', 'Newsletter created successfully!');
    }

    public function edit(Newsletter $newsletter)
    {
        return view('admin.newsletters.edit', compact('newsletter'));
    }

    public function update(Request $request, Newsletter $newsletter)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $data = $request->only(['title', 'content']);

        if ($request->hasFile('image')) {
            $filename = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('uploads/newsletters'), $filename);
            $data['image'] = $filename;
        }

        $newsletter->update($data);

        return redirect()->route('admin.newsletters.index')->with('success', 'Newsletter updated successfully!');
    }

    public function destroy(Newsletter $newsletter)
    {
        $newsletter->delete();
        return back()->with('success', 'Newsletter deleted successfully!');
    }
}
