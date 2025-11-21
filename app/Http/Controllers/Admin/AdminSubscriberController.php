<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Illuminate\Support\Facades\DB;

class AdminSubscriberController extends Controller
{
    public function index()
    {
        $subscribers = Subscriber::with('newsletter')->get();

        return view('admin.subscribers.index', compact('subscribers'));
    }

    public function destroy($id)
    {
        $subscriber = Subscriber::findOrFail($id);
        $subscriber->newsletter()->detach();
        $subscriber->delete();
        return back()->with('success', 'Subscription deleted successfully');
    }
}
