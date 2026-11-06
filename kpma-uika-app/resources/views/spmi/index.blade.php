@extends('layouts.frontend')

@section('title', $categoryTitle . ' - KPMA UIKA')

@section('content')
<!-- Page Banner Header -->
<div class="bg-gradient-to-r from-emerald-950 via-teal-900 to-slate-900 text-white py-16 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <span class="px-3 py-1 rounded-full text-[10px] font-bold bg-emerald-500/20 text-emerald-300 border border-emerald-500/30 uppercase tracking-widest">Sistem Penjaminan Mutu Internal</span>
        <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight mt-3">{{ $categoryTitle }}</h1>
        <p class="text-sm text-slate-300 max-w-2xl mt-2 font-normal">Daftar dokumen standar mutu dan pedoman operasional SPMI Universitas Ibn Khaldun Bogor.</p>
    </div>
</div>

<!-- Main Documents List Section -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    
    <!-- Category Tabs Filter -->
    <div class="flex flex-wrap gap-2 mb-8 border-b border-slate-200 pb-4">
        @foreach($validCategories as $key => $label)
            <a href="{{ route('spmi.category', $key) }}" 
               class="px-4 py-2 rounded-xl text-xs font-bold transition-all {{ $category === $key ? 'bg-emerald-600 text-white shadow-md shadow-emerald-900/30' : 'bg-white text-slate-600 border border-slate-200 hover:bg-slate-100' }}">
                {{ $label }}
            </a>
        @endforeach
    </div>

    <!-- Documents List Grid -->
    <div class="bg-white rounded-2xl border border-slate-200/80 shadow-xs overflow-hidden">
        <div class="p-6 border-b border-slate-100 flex items-center justify-between">
            <h2 class="text-base font-bold text-slate-900">Berkas Dokumen Terdaftar</h2>
            <span class="text-xs text-slate-500">Total: <strong class="text-slate-800">{{ $documents->total() }}</strong> dokumen</span>
        </div>

        <div class="divide-y divide-slate-100">
            @forelse($documents as $doc)
                <div class="p-6 hover:bg-slate-50 transition-colors flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                    <div class="flex items-start space-x-4">
                        <div class="w-11 h-11 rounded-xl bg-emerald-50 text-emerald-700 border border-emerald-200 flex items-center justify-center text-xl flex-shrink-0">
                            <i class="fa-regular fa-file-pdf"></i>
                        </div>
                        <div>
                            <h3 class="text-sm font-bold text-slate-900 leading-snug">{{ $doc->title }}</h3>
                            <p class="text-xs text-slate-500 mt-1 line-clamp-2">{{ $doc->description ?? 'Dokumen resmi penjaminan mutu internal UIKA Bogor.' }}</p>
                            <span class="inline-block mt-2 text-[10px] font-semibold text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded">Diperbarui: {{ $doc->updated_at ? $doc->updated_at->format('d M Y') : date('d M Y') }}</span>
                        </div>
                    </div>
                    <div class="flex items-center space-x-2 w-full sm:w-auto justify-end">
                        <a href="{{ asset('storage/' . $doc->file_path) }}" target="_blank" class="px-4 py-2 rounded-xl bg-emerald-600 text-white hover:bg-emerald-700 text-xs font-semibold shadow-xs flex items-center gap-1.5 transition-all">
                            <i class="fa-solid fa-download text-xs"></i> Unduh PDF
                        </a>
                    </div>
                </div>
            @empty
                <div class="p-12 text-center text-slate-400 text-sm">Belum ada dokumen untuk kategori ini.</div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="p-4 border-t border-slate-100">
            {{ $documents->links() }}
        </div>
    </div>
</div>
@endsection
