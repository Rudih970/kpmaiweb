@extends('layouts.frontend')

@section('title', 'Informasi & Berita - KPMA UIKA')

@section('content')
<!-- Page Banner Header -->
<div class="bg-gradient-to-r from-emerald-950 via-teal-900 to-slate-900 text-white py-16 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <span class="px-3 py-1 rounded-full text-[10px] font-bold bg-amber-500/20 text-amber-300 border border-amber-500/30 uppercase tracking-widest">Pusat Informasi Mutu</span>
        <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight mt-3">Informasi, Berita, & Agenda</h1>
        <p class="text-sm text-slate-300 max-w-2xl mt-2 font-normal">Pengumuman penting, berita kegiatan penjaminan mutu, dan agenda mendatang UIKA Bogor.</p>
    </div>
</div>

<!-- Main Listing Section -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    
    <!-- Filter Tabs -->
    <div class="flex flex-wrap gap-2 mb-8 border-b border-slate-200 pb-4">
        <a href="{{ route('information.index') }}" class="px-4 py-2 rounded-xl text-xs font-bold transition-all {{ !request('category') ? 'bg-amber-600 text-white shadow-md' : 'bg-white text-slate-600 border border-slate-200 hover:bg-slate-100' }}">
            Semua Informasi
        </a>
        @foreach($categories as $key => $label)
            <a href="{{ route('information.index', ['category' => $key]) }}" class="px-4 py-2 rounded-xl text-xs font-bold transition-all {{ request('category') === $key ? 'bg-amber-600 text-white shadow-md' : 'bg-white text-slate-600 border border-slate-200 hover:bg-slate-100' }}">
                {{ $label }}
            </a>
        @endforeach
    </div>

    <!-- Posts Cards Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @forelse($posts as $post)
            <div class="bg-white rounded-2xl border border-slate-200/80 overflow-hidden shadow-xs hover:shadow-lg transition-all flex flex-col justify-between">
                <div class="p-6 space-y-4">
                    <div class="flex items-center justify-between">
                        <span class="px-2.5 py-0.5 rounded-md text-[10px] font-bold bg-amber-100 text-amber-800 uppercase">
                            {{ $categories[$post->category] ?? $post->category }}
                        </span>
                        <span class="text-[11px] text-slate-400 font-medium">
                            <i class="fa-regular fa-calendar me-1"></i> {{ $post->created_at ? $post->created_at->format('d M Y') : date('d M Y') }}
                        </span>
                    </div>

                    <h3 class="text-base font-bold text-slate-900 leading-snug hover:text-amber-600 transition-colors">
                        <a href="{{ route('information.show', $post->slug) }}">{{ $post->title }}</a>
                    </h3>

                    <p class="text-xs text-slate-600 line-clamp-3 leading-relaxed">
                        {{ Str::limit(strip_tags($post->content), 120) }}
                    </p>
                </div>

                <div class="px-6 py-4 bg-slate-50 border-t border-slate-100 flex justify-between items-center text-xs">
                    <span class="text-slate-400"><i class="fa-regular fa-eye me-1"></i> {{ number_format($post->views) }} views</span>
                    <a href="{{ route('information.show', $post->slug) }}" class="font-bold text-amber-600 hover:text-amber-700">Baca Selengkapnya <i class="fa-solid fa-arrow-right text-[10px] ms-1"></i></a>
                </div>
            </div>
        @empty
            <div class="col-span-3 p-12 text-center text-slate-400 text-sm">Belum ada informasi yang dipublikasikan.</div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="mt-8">
        {{ $posts->links() }}
    </div>
</div>
@endsection
