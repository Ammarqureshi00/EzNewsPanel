<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $newsletters = Newsletter::latest()->get();
        return view('welcome', compact('newsletters'));
    }
    public function show(Newsletter $newsletter)
    {
        return view('singlenews', compact('newsletter'));
    }
    public function subscribe(Request $request, Newsletter $newsletter)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        return redirect()->back()->with('success', 'Subscribed successfully to ' . $newsletter->title . '!');
    }
}
