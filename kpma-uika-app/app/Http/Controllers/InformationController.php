<?php

namespace App\Http\Controllers;

use App\Models\InformationPost;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    /**
     * Display listing of information posts (news, announcements, agendas).
     */
    public function index(Request $request)
    {
        $categories = [
            'pengumuman_penting' => 'Pengumuman Penting',
            'agenda' => 'Agenda Kegiatan',
            'berita' => 'Berita Mutu Terkini',
        ];

        $query = InformationPost::query();

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%");
            });
        }

        $posts = $query->latest()->paginate(9);

        return view('information.index', compact('posts', 'categories'));
    }

    /**
     * Display a single information post detail page and increment view counter.
     */
    public function show(string $slug)
    {
        $post = InformationPost::where('slug', $slug)->firstOrFail();

        // Increment views counter
        $post->increment('views');

        // Related posts
        $relatedPosts = InformationPost::where('category', $post->category)
            ->where('id', '!=', $post->id)
            ->latest()
            ->take(3)
            ->get();

        return view('information.show', compact('post', 'relatedPosts'));
    }
}
