<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SpmiDocument;
use App\Models\SpmeItem;
use App\Models\Regulation;
use App\Models\InformationPost;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    /**
     * Display the internal CMS admin dashboard with summary statistics & logs.
     */
    public function index()
    {
        $stats = [
            'total_spmi' => SpmiDocument::count(),
            'total_spme' => SpmeItem::count(),
            'total_regulations' => Regulation::count(),
            'total_posts' => InformationPost::count(),
            'total_users' => User::count(),
        ];

        // Recent SPMI document uploads
        $recentSpmi = SpmiDocument::latest()->take(5)->get();

        // Recent Information Posts
        $recentPosts = InformationPost::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentSpmi', 'recentPosts'));
    }
}
