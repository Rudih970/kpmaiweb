@extends('layouts.frontend')

@section('title', 'KPMA UIKA Bogor - Kantor Penjaminan Mutu & Akreditasi')

@section('content')

<!-- 1. Hero Slider Component -->
<x-hero-slider :slides="$heroSlides" />

<!-- 2. Quick Stats Bar -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-10 relative z-20">
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 bg-white rounded-2xl p-6 shadow-xl border border-slate-100">
        <div class="text-center p-3 border-r last:border-r-0 border-slate-100">
            <div class="text-3xl font-extrabold text-emerald-700">{{ $stats['spmi_count'] ?? 10 }}</div>
            <div class="text-xs text-slate-500 font-semibold mt-1">Dokumen Standar SPMI</div>
        </div>
        <div class="text-center p-3 border-r last:border-r-0 border-slate-100">
            <div class="text-3xl font-extrabold text-teal-700">100%</div>
            <div class="text-xs text-slate-500 font-semibold mt-1">Siklus AMI Berjalan</div>
        </div>
        <div class="text-center p-3 border-r last:border-r-0 border-slate-100">
            <div class="text-3xl font-extrabold text-amber-600">A / Unggul</div>
            <div class="text-xs text-slate-500 font-semibold mt-1">Akreditasi Institusi</div>
        </div>
        <div class="text-center p-3">
            <div class="text-3xl font-extrabold text-emerald-800">{{ number_format($stats['views_count'] ?? 4500) }}</div>
            <div class="text-xs text-slate-500 font-semibold mt-1">Total Pembaca Portal</div>
        </div>
    </div>
</div>

<!-- 3. Important Announcements Section (Pengumuman Penting Terbaru) -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="flex flex-col md:flex-row md:items-end justify-between mb-10 gap-4">
        <div>
            <span class="px-3 py-1 rounded-full text-[11px] font-bold bg-amber-100 text-amber-800 border border-amber-200 uppercase tracking-widest">
                <i class="fa-solid fa-bullhorn me-1"></i> Pengumuman Penting
            </span>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight mt-2">Pengumuman Resmi KPMA</h2>
        </div>
        <a href="{{ route('information.index', ['category' => 'pengumuman_penting']) }}" class="text-xs font-bold text-emerald-700 hover:text-emerald-800 flex items-center gap-1.5 group">
            <span>Lihat Semua Pengumuman</span>
            <i class="fa-solid fa-arrow-right text-[10px] group-hover:translate-x-1 transition-transform"></i>
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @forelse($announcements as $announcement)
            <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-xs hover:shadow-md transition-all flex flex-col justify-between">
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <span class="px-2.5 py-0.5 rounded-md text-[10px] font-bold bg-rose-100 text-rose-700 border border-rose-200 uppercase">Penting</span>
                        <span class="text-[11px] text-slate-400 font-medium"><i class="fa-regular fa-calendar me-1"></i> {{ $announcement->created_at ? $announcement->created_at->format('d M Y') : date('d M Y') }}</span>
                    </div>
                    <h3 class="text-base font-bold text-slate-900 leading-snug hover:text-emerald-600 transition-colors">
                        <a href="{{ route('information.show', $announcement->slug) }}">{{ $announcement->title }}</a>
                    </h3>
                    <p class="text-xs text-slate-600 line-clamp-3 leading-relaxed">
                        {{ Str::limit(strip_tags($announcement->content), 120) }}
                    </p>
                </div>
                <div class="pt-4 mt-4 border-t border-slate-100 flex justify-between items-center text-xs">
                    <span class="text-slate-400"><i class="fa-regular fa-eye me-1"></i> {{ number_format($announcement->views) }} views</span>
                    <a href="{{ route('information.show', $announcement->slug) }}" class="font-bold text-emerald-600 hover:text-emerald-700">Detail <i class="fa-solid fa-chevron-right text-[9px] me-0.5"></i></a>
                </div>
            </div>
        @empty
            <div class="col-span-3 text-center py-8 text-slate-400 text-sm">Belum ada pengumuman terbaru.</div>
        @endforelse
    </div>
</section>

<!-- 4. Agenda & Latest News Combined Section -->
<section class="bg-slate-100/70 border-y border-slate-200/60 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
            
            <!-- Left 8 Cols: Latest News (Berita Mutu Terkini) -->
            <div class="lg:col-span-8 space-y-8">
                <div class="flex items-center justify-between border-b border-slate-200 pb-4">
                    <h2 class="text-xl font-bold text-slate-900 flex items-center gap-2">
                        <i class="fa-solid fa-newspaper text-emerald-600"></i> Berita Mutu Terkini
                    </h2>
                    <a href="{{ route('information.index', ['category' => 'berita']) }}" class="text-xs font-bold text-emerald-700 hover:underline">Lihat Semua Berita</a>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    @forelse($latestNews as $news)
                        <div class="bg-white rounded-2xl overflow-hidden border border-slate-200/80 shadow-xs hover:shadow-md transition-all flex flex-col justify-between">
                            <div class="p-5 space-y-3">
                                <span class="text-[10px] font-bold text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded uppercase">Berita</span>
                                <h3 class="text-sm font-bold text-slate-900 leading-snug line-clamp-2 hover:text-emerald-600 transition-colors">
                                    <a href="{{ route('information.show', $news->slug) }}">{{ $news->title }}</a>
                                </h3>
                                <p class="text-xs text-slate-500 line-clamp-2 leading-relaxed">
                                    {{ Str::limit(strip_tags($news->content), 90) }}
                                </p>
                            </div>
                            <div class="px-5 py-3 bg-slate-50 border-t border-slate-100 flex justify-between items-center text-[11px] text-slate-400">
                                <span><i class="fa-regular fa-clock me-1"></i> {{ $news->created_at ? $news->created_at->format('d M Y') : date('d M Y') }}</span>
                                <a href="{{ route('information.show', $news->slug) }}" class="font-semibold text-emerald-600 hover:text-emerald-700">Baca <i class="fa-solid fa-arrow-right text-[9px]"></i></a>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-2 text-center py-6 text-slate-400 text-xs">Belum ada berita terkini.</div>
                    @endforelse
                </div>
            </div>

            <!-- Right 4 Cols: Upcoming Agendas (Agenda Kegiatan) -->
            <div class="lg:col-span-4 space-y-6">
                <div class="flex items-center justify-between border-b border-slate-200 pb-4">
                    <h2 class="text-xl font-bold text-slate-900 flex items-center gap-2">
                        <i class="fa-solid fa-calendar-days text-teal-600"></i> Agenda Kegiatan
                    </h2>
                    <a href="{{ route('information.index', ['category' => 'agenda']) }}" class="text-xs font-bold text-teal-700 hover:underline">Arsip Agenda</a>
                </div>

                <div class="space-y-4">
                    @forelse($agendas as $agenda)
                        <div class="bg-white rounded-2xl p-4 border border-slate-200/80 shadow-xs flex items-start space-x-4 hover:border-teal-500/50 transition-colors">
                            <div class="w-14 h-14 rounded-xl bg-teal-50 border border-teal-200 flex flex-col items-center justify-center text-teal-800 flex-shrink-0">
                                <span class="text-xs font-extrabold uppercase">{{ $agenda->event_date ? $agenda->event_date->format('M') : 'JAN' }}</span>
                                <span class="text-lg font-black leading-none">{{ $agenda->event_date ? $agenda->event_date->format('d') : '01' }}</span>
                            </div>
                            <div class="flex-1 min-w-0">
                                <h4 class="text-xs font-bold text-slate-900 truncate hover:text-teal-600">
                                    <a href="{{ route('information.show', $agenda->slug) }}">{{ $agenda->title }}</a>
                                </h4>
                                <p class="text-[11px] text-slate-500 line-clamp-2 mt-1">{{ Str::limit(strip_tags($agenda->content), 60) }}</p>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-6 text-slate-400 text-xs">Tidak ada agenda mendatang.</div>
                    @endforelse
                </div>
            </div>

        </div>
    </div>
</section>

@endsection
