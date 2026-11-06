@extends('layouts.frontend')

@section('title', $categoryTitle . ' - KPMA UIKA')

@section('content')
<!-- Page Banner Header -->
<div class="bg-gradient-to-r from-teal-950 via-emerald-900 to-slate-900 text-white py-16 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <span class="px-3 py-1 rounded-full text-[10px] font-bold bg-teal-500/20 text-teal-300 border border-teal-500/30 uppercase tracking-widest">Sistem Penjaminan Mutu Eksternal</span>
        <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight mt-3">{{ $categoryTitle }}</h1>
        <p class="text-sm text-slate-300 max-w-2xl mt-2 font-normal">Informasi status akreditasi BAN-PT, akreditasi internasional, dan instrumen panduan.</p>
    </div>
</div>

<!-- Main Items List Section -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    
    <!-- Category Tabs Filter -->
    <div class="flex flex-wrap gap-2 mb-8 border-b border-slate-200 pb-4">
        @foreach($validCategories as $key => $label)
            <a href="{{ route('spme.category', $key) }}" 
               class="px-4 py-2 rounded-xl text-xs font-bold transition-all {{ $category === $key ? 'bg-teal-600 text-white shadow-md shadow-teal-900/30' : 'bg-white text-slate-600 border border-slate-200 hover:bg-slate-100' }}">
                {{ $label }}
            </a>
        @endforeach
    </div>

    <!-- Items Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @forelse($items as $item)
            <div class="bg-white rounded-2xl border border-slate-200/80 p-6 shadow-xs hover:shadow-md transition-all flex flex-col justify-between">
                <div class="space-y-3">
                    <div class="w-12 h-12 rounded-xl bg-teal-50 text-teal-700 border border-teal-200 flex items-center justify-center text-xl font-bold">
                        <i class="fa-solid fa-award"></i>
                    </div>
                    <h3 class="text-base font-bold text-slate-900 leading-snug">{{ $item->title }}</h3>
                    <p class="text-xs text-slate-600 leading-relaxed">{{ $item->description }}</p>
                </div>
                <div class="pt-4 mt-4 border-t border-slate-100 flex items-center justify-between gap-3">
                    @if($item->file_path)
                        <a href="{{ asset('storage/' . $item->file_path) }}" target="_blank" class="px-4 py-2 rounded-xl bg-teal-600 text-white hover:bg-teal-700 text-xs font-semibold shadow-xs flex items-center gap-1.5 transition-all">
                            <i class="fa-solid fa-download text-xs"></i> Unduh File
                        </a>
                    @endif
                    @if($item->external_link)
                        <a href="{{ $item->external_link }}" target="_blank" class="px-4 py-2 rounded-xl bg-slate-100 text-slate-700 hover:bg-slate-200 text-xs font-semibold flex items-center gap-1.5 transition-all">
                            <i class="fa-solid fa-arrow-up-right-from-square text-xs"></i> Tautan Luar
                        </a>
                    @endif
                </div>
            </div>
        @empty
            <div class="col-span-2 p-12 text-center text-slate-400 text-sm">Belum ada data untuk kategori ini.</div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="mt-8">
        {{ $items->links() }}
    </div>
</div>
@endsection
