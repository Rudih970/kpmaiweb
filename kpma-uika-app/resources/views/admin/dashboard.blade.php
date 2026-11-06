@extends('layouts.backend')

@section('title', 'Admin Dashboard - APPS KPMA UIKA')

@section('page-title')
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-900 tracking-tight">Dashboard Manajerial APPS KPMA</h1>
            <p class="text-xs text-slate-500 mt-1">Selamat datang kembali, <span class="font-semibold text-slate-700">{{ auth()->user()->name }}</span>! Kelola dokumen mutu dan posting publik secara terpusat.</p>
        </div>
        <div class="flex items-center space-x-3">
            <a href="{{ route('admin.spmi.create') }}" class="px-4 py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-xs font-semibold text-white shadow-sm flex items-center gap-2 transition-all">
                <i class="fa-solid fa-plus text-xs"></i> Unggah Dokumen SPMI
            </a>
        </div>
    </div>
@endsection

@section('content')
<!-- Metric Stats Grid -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    
    <!-- Stat 1: Total Dokumen SPMI -->
    <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-xs flex items-center justify-between">
        <div>
            <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider block mb-1">Total Dokumen SPMI</span>
            <span class="text-2xl font-extrabold text-slate-900">{{ $stats['total_spmi'] }}</span>
            <span class="text-[11px] font-semibold text-emerald-600 block mt-1"><i class="fa-solid fa-file-contract me-1"></i> Standar PPEPP</span>
        </div>
        <div class="w-12 h-12 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-xl">
            <i class="fa-solid fa-folder-tree"></i>
        </div>
    </div>

    <!-- Stat 2: Total Data SPME -->
    <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-xs flex items-center justify-between">
        <div>
            <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider block mb-1">Total Data SPME</span>
            <span class="text-2xl font-extrabold text-teal-700">{{ $stats['total_spme'] }}</span>
            <span class="text-[11px] font-semibold text-teal-600 block mt-1"><i class="fa-solid fa-ribbon me-1"></i> Akreditasi BAN-PT/LAM</span>
        </div>
        <div class="w-12 h-12 rounded-2xl bg-teal-50 text-teal-600 flex items-center justify-center text-xl">
            <i class="fa-solid fa-award"></i>
        </div>
    </div>

    <!-- Stat 3: Total Peraturan -->
    <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-xs flex items-center justify-between">
        <div>
            <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider block mb-1">Jumlah Peraturan</span>
            <span class="text-2xl font-extrabold text-slate-800">{{ $stats['total_regulations'] }}</span>
            <span class="text-[11px] font-semibold text-slate-600 block mt-1"><i class="fa-solid fa-scale-balanced me-1"></i> Regulasi Hukuman</span>
        </div>
        <div class="w-12 h-12 rounded-2xl bg-slate-100 text-slate-700 flex items-center justify-center text-xl">
            <i class="fa-solid fa-landmark"></i>
        </div>
    </div>

    <!-- Stat 4: Total Posting Informasi -->
    <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-xs flex items-center justify-between">
        <div>
            <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider block mb-1">Posting Informasi</span>
            <span class="text-2xl font-extrabold text-amber-600">{{ $stats['total_posts'] }}</span>
            <span class="text-[11px] font-semibold text-amber-600 block mt-1"><i class="fa-solid fa-bullhorn me-1"></i> Berita & Pengumuman</span>
        </div>
        <div class="w-12 h-12 rounded-2xl bg-amber-50 text-amber-600 flex items-center justify-center text-xl">
            <i class="fa-solid fa-newspaper"></i>
        </div>
    </div>
</div>

<!-- Detailed Recent Uploads Grid -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
    
    <!-- Left: Recent SPMI Documents -->
    <div class="bg-white rounded-2xl border border-slate-200/80 p-6 shadow-xs space-y-4">
        <div class="flex items-center justify-between border-b border-slate-100 pb-3">
            <h3 class="text-base font-bold text-slate-900 flex items-center gap-2">
                <i class="fa-solid fa-file-pdf text-emerald-600"></i> Unggahan Dokumen SPMI Terbaru
            </h3>
            <a href="{{ route('admin.spmi.index') }}" class="text-xs font-bold text-emerald-700 hover:underline">Kelola SPMI</a>
        </div>

        <div class="divide-y divide-slate-100 text-xs">
            @forelse($recentSpmi as $doc)
                <div class="py-3 flex items-center justify-between">
                    <div>
                        <p class="font-bold text-slate-800">{{ $doc->title }}</p>
                        <span class="text-[10px] text-slate-400">Kategori: {{ strtoupper(str_replace('_', ' ', $doc->cycle_category)) }}</span>
                    </div>
                    <span class="px-2 py-0.5 rounded text-[10px] font-bold {{ $doc->is_active ? 'bg-emerald-100 text-emerald-700' : 'bg-slate-100 text-slate-500' }}">
                        {{ $doc->is_active ? 'Aktif' : 'Draft' }}
                    </span>
                </div>
            @empty
                <p class="text-slate-400 py-4 text-center">Belum ada dokumen SPMI diunggah.</p>
            @endforelse
        </div>
    </div>

    <!-- Right: Quick Activity Modules -->
    <div class="bg-white rounded-2xl border border-slate-200/80 p-6 shadow-xs space-y-4">
        <div class="border-b border-slate-100 pb-3">
            <h3 class="text-base font-bold text-slate-900">Modul Pengelolaan Utama</h3>
            <p class="text-xs text-slate-500">Pilih modul manajerial untuk mengedit konten:</p>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <a href="{{ route('admin.spmi.index') }}" class="p-4 rounded-xl bg-slate-50 hover:bg-emerald-50 border border-slate-200 hover:border-emerald-300 transition-all group">
                <div class="w-10 h-10 rounded-lg bg-emerald-600 text-white flex items-center justify-center text-lg mb-2 shadow-xs group-hover:scale-105 transition-transform">
                    <i class="fa-solid fa-shield-halved"></i>
                </div>
                <h4 class="text-xs font-bold text-slate-900 group-hover:text-emerald-700">SPMI Manager</h4>
                <p class="text-[10px] text-slate-500">Upload PDF & PPEPP</p>
            </a>

            <a href="#" class="p-4 rounded-xl bg-slate-50 hover:bg-teal-50 border border-slate-200 hover:border-teal-300 transition-all group">
                <div class="w-10 h-10 rounded-lg bg-teal-600 text-white flex items-center justify-center text-lg mb-2 shadow-xs group-hover:scale-105 transition-transform">
                    <i class="fa-solid fa-ribbon"></i>
                </div>
                <h4 class="text-xs font-bold text-slate-900 group-hover:text-teal-700">SPME Manager</h4>
                <p class="text-[10px] text-slate-500">Link & Borang LAM</p>
            </a>

            <a href="#" class="p-4 rounded-xl bg-slate-50 hover:bg-amber-50 border border-slate-200 hover:border-amber-300 transition-all group">
                <div class="w-10 h-10 rounded-lg bg-amber-600 text-white flex items-center justify-center text-lg mb-2 shadow-xs group-hover:scale-105 transition-transform">
                    <i class="fa-solid fa-newspaper"></i>
                </div>
                <h4 class="text-xs font-bold text-slate-900 group-hover:text-amber-700">Informasi Manager</h4>
                <p class="text-[10px] text-slate-500">Berita & Agenda</p>
            </a>

            <a href="#" class="p-4 rounded-xl bg-slate-50 hover:bg-slate-100 border border-slate-200 transition-all group">
                <div class="w-10 h-10 rounded-lg bg-slate-800 text-white flex items-center justify-center text-lg mb-2 shadow-xs group-hover:scale-105 transition-transform">
                    <i class="fa-solid fa-landmark"></i>
                </div>
                <h4 class="text-xs font-bold text-slate-900">Peraturan Manager</h4>
                <p class="text-[10px] text-slate-500">Pedoman Hukum</p>
            </a>
        </div>
    </div>
</div>
@endsection
