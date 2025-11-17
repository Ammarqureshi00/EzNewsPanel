<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Newsletter;
use App\Models\Subscriber;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $newsletters = Newsletter::all();
        $subscribers = Subscriber::all();
        $recentNewsletters = Newsletter::latest()->take(5)->get();
        $sentThisMonth = Newsletter::whereMonth('created_at', now()->month)->count();
        // $drafts = Newsletter::where('status', 'draft')->count();

        // For chart
        $months = collect(range(1, 12))->map(fn($m) => date('M', mktime(0, 0, 0, $m, 1)))->toArray();
        $newSubscribers = [];
        foreach (range(1, 12) as $m) {
            $newSubscribers[] = Subscriber::whereMonth('created_at', $m)->count();
        }

        return view('admin.dashboard', compact(
            'newsletters',
            'subscribers',
            'recentNewsletters',
            'recentNewsletters',
            'sentThisMonth',
            // 'drafts',
            'months',
            'newSubscribers'
        ));
    }
}
