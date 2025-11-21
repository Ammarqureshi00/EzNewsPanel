<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use App\Models\Subscriber;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use App\Notifications\NewSubscriptionNotification;
use App\Notifications\SubscriptionConfirmedNotification;
use Illuminate\Support\Facades\Notification;

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
    // AJAX Subscription Handler
    public function subscribe(Request $request, Newsletter $newsletter)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email'
        ]);

        // 1. Check if subscriber exists
        $subscriber = DB::table('news_subscriber')
            ->where('email', $request->email)
            ->first();

        $isNewSubscriber = false;

        if (!$subscriber) {
            // 2. Create new subscriber (guest)
            $subscriberId = DB::table('news_subscriber')->insertGetId([
                'name' => $request->name,
                'email' => $request->email,
                'created_at' => now(),
                'updated_at' => now()
            ]);

            $isNewSubscriber = true;
        } else {
            // Use existing subscriber id
            $subscriberId = $subscriber->id;
        }

        // 3. Store subscription in news_subscription table
        DB::table('news_subscription')->insert([
            'news_id' => $newsletter->id,
            'subscriber_id' => $subscriberId,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // 4. Return response
        return response()->json([
            'success' => true,
            'register_popup' => $isNewSubscriber
        ]);
    }
}
