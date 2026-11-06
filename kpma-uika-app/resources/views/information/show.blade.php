@extends('layouts.frontend')

@section('title', $post->title . ' - KPMA UIKA')

@section('content')
<!-- Page Header Breadcrumb Banner -->
<div class="bg-gradient-to-r from-slate-950 via-teal-950 to-slate-900 text-white py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto">
        <div class="flex items-center space-x-2 text-xs text-slate-400 mb-4">
            <a href="{{ route('home') }}" class="hover:text-emerald-400">Beranda</a>
            <span>/</span>
            <a href="{{ route('information.index') }}" class="hover:text-emerald-400">Informasi</a>
            <span>/</span>
            <span class="text-slate-200 truncate max-w-xs">{{ $post->title }}</span>
        </div>
        <span class="px-3 py-1 rounded-full text-[10px] font-bold bg-emerald-500/20 text-emerald-300 border border-emerald-500/30 uppercase tracking-widest">
            {{ $post->category }}
        </span>
        <h1 class="text-2xl sm:text-4xl font-extrabold tracking-tight mt-3 leading-snug">{{ $post->title }}</h1>
        
        <div class="flex flex-wrap items-center gap-4 text-xs text-slate-400 mt-4 pt-4 border-t border-slate-800">
            <span><i class="fa-regular fa-calendar me-1"></i> {{ $post->created_at ? $post->created_at->format('d M Y') : date('d M Y') }}</span>
            <span><i class="fa-regular fa-eye me-1"></i> {{ number_format($post->views) }} Pembaca</span>
            <span><i class="fa-regular fa-building me-1"></i> KPMA UIKA Bogor</span>
        </div>
    </div>
</div>

<!-- Article Detail Body -->
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="bg-white rounded-3xl p-8 sm:p-12 border border-slate-200/80 shadow-xs space-y-6">
        
        <!-- Main Text Content -->
        <div class="prose prose-emerald max-w-none text-slate-800 text-sm sm:text-base leading-relaxed space-y-4">
            {!! nl2br(e($post->content)) !!}
        </div>

        <!-- Back Button & Share Links -->
        <div class="pt-8 border-t border-slate-100 flex flex-col sm:flex-row items-center justify-between gap-4">
            <a href="{{ route('information.index') }}" class="px-5 py-2.5 rounded-xl bg-slate-100 text-slate-700 hover:bg-slate-200 text-xs font-semibold flex items-center gap-2">
                <i class="fa-solid fa-arrow-left text-xs"></i> Kembali ke Daftar Informasi
            </a>

            <div class="flex items-center space-x-3 text-xs text-slate-500">
                <span class="font-semibold">Bagikan:</span>
                <a href="#" class="w-8 h-8 rounded-lg bg-slate-100 flex items-center justify-center hover:bg-emerald-600 hover:text-white transition-colors"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="#" class="w-8 h-8 rounded-lg bg-slate-100 flex items-center justify-center hover:bg-emerald-600 hover:text-white transition-colors"><i class="fa-brands fa-twitter"></i></a>
                <a href="#" class="w-8 h-8 rounded-lg bg-slate-100 flex items-center justify-center hover:bg-emerald-600 hover:text-white transition-colors"><i class="fa-brands fa-whatsapp"></i></a>
            </div>
        </div>

    </div>

    <!-- Related Posts Section -->
    @if(count($relatedPosts) > 0)
        <div class="mt-16 space-y-6">
            <h3 class="text-xl font-bold text-slate-900 border-b border-slate-200 pb-3">Informasi Terkait</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($relatedPosts as $related)
                    <div class="bg-white rounded-2xl p-5 border border-slate-200/80 shadow-xs flex flex-col justify-between hover:shadow-md transition-all">
                        <div class="space-y-2">
                            <span class="text-[10px] font-bold text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded uppercase">{{ $related->category }}</span>
                            <h4 class="text-xs font-bold text-slate-900 line-clamp-2 hover:text-emerald-600">
                                <a href="{{ route('information.show', $related->slug) }}">{{ $related->title }}</a>
                            </h4>
                        </div>
                        <a href="{{ route('information.show', $related->slug) }}" class="mt-4 text-[11px] font-bold text-emerald-600 flex items-center gap-1">
                            Baca <i class="fa-solid fa-arrow-right text-[9px]"></i>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
</div>
@endsection
