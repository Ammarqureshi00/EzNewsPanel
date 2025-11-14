<?php

use App\Http\Controllers\Controller;
use App\Models\Newsletter;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        $subscriber = Subscriber::firstOrCreate(
            ['email' => $request->email],
            ['name' => $request->name]
        );

        // Subscribe user to all existing newsletters (or choose logic)
        $newsletterIds = Newsletter::pluck('id');
        $subscriber->newsletters()->syncWithoutDetaching($newsletterIds);

        return back()->with('success', 'Subscribed successfully!');
    }

    public function index()
    {
        $subscribers = Subscriber::with('newsletters')->get();
        return view('admin.subscribers.index', compact('subscribers'));
    }
}
