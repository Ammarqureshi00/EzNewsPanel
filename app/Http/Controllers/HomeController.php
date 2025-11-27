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
        try {
            $request->validate([
                'name'  => 'required|string|max:255',
                'email' => 'required|email|max:255',
            ]);

            $user = User::where('email', $request->email)->first();

            if ($user) {
                // Registered user: add to subscriptions
                $user->subscribed_newsletters()->syncWithoutDetaching([$newsletter->id]);

                // Optional: notify admin
                Notification::route('mail', 'admin@example.com')
                    ->notify(new NewSubscriptionNotification($user->name, $user->email));

                return response()->json(['success' => true]);
            }

            // Guest subscriber
            $subscriber = Subscriber::firstOrCreate(
                ['email' => $request->email],
                ['name' => $request->name]
            );

            // Add to news_subscription
            DB::table('news_subscription')->updateOrInsert(
                ['news_id' => $newsletter->id, 'subscriber_id' => $subscriber->id],
                ['created_at' => now(), 'updated_at' => now()]
            );

            // Optional: notify admin and subscriber
            Notification::route('mail', 'admin@example.com')
                ->notify(new NewSubscriptionNotification($subscriber->name, $subscriber->email));

            Notification::route('mail', $subscriber->email)
                ->notify(new SubscriptionConfirmedNotification());

            // Show popup to guest user
            return response()->json(['register_popup' => true]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Something went wrong. Please try again.'], 500);
        }
    }
}
