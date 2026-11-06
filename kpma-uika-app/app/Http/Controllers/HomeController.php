<?php

namespace App\Http\Controllers;

use App\Models\InformationPost;
use App\Models\SpmiDocument;
use App\Models\SpmeItem;
use App\Models\Regulation;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display the public landing page with Hero Slider & Latest Posts.
     */
    public function index()
    {
        // 1. Featured Information Posts for Hero Banner Slider (Max 5)
        $heroSlides = InformationPost::featured()
            ->latest()
            ->take(5)
            ->get();

        // 2. Latest 3 Important Announcements (Pengumuman Penting)
        $announcements = InformationPost::byCategory('pengumuman_penting')
            ->latest()
            ->take(3)
            ->get();

        // 3. Upcoming Agendas (Agenda)
        $agendas = InformationPost::byCategory('agenda')
            ->whereNotNull('event_date')
            ->orderBy('event_date', 'asc')
            ->take(4)
            ->get();

        // 4. Latest News (Berita Terkini)
        $latestNews = InformationPost::byCategory('berita')
            ->latest()
            ->take(6)
            ->get();

        // 5. Quick counts for Hero stats
        $stats = [
            'spmi_count' => SpmiDocument::active()->count(),
            'spme_count' => SpmeItem::count(),
            'regulation_count' => Regulation::count(),
            'views_count' => InformationPost::sum('views'),
        ];

        return view('index', compact('heroSlides', 'announcements', 'agendas', 'latestNews', 'stats'));
    }
}
