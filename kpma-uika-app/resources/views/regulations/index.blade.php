@extends('layouts.frontend')

@section('title', 'Peraturan & Regulasi - KPMA UIKA')

@section('content')
<!-- Page Banner Header -->
<div class="bg-gradient-to-r from-slate-900 via-slate-800 to-emerald-950 text-white py-16 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <span class="px-3 py-1 rounded-full text-[10px] font-bold bg-slate-700/60 text-slate-300 border border-slate-600 uppercase tracking-widest">Landasan Hukum & Acuan</span>
        <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight mt-3">Peraturan & Pedoman Mutu</h1>
        <p class="text-sm text-slate-300 max-w-2xl mt-2 font-normal">Kumpulan peraturan pemerintah, statuta yayasan, peraturan rektor, dan pedoman operasional mutu.</p>
    </div>
</div>

<!-- Main Section -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    
    <!-- Search & Filter Form -->
    <form method="GET" action="{{ route('regulations.index') }}" class="bg-white rounded-2xl p-4 border border-slate-200/80 shadow-xs mb-8 flex flex-col sm:flex-row gap-4 justify-between items-center">
        <div class="flex flex-wrap items-center gap-2 w-full sm:w-auto">
            <a href="{{ route('regulations.index') }}" class="px-3.5 py-2 rounded-xl text-xs font-bold transition-all {{ !request('category') ? 'bg-slate-900 text-white' : 'bg-slate-100 text-slate-700 hover:bg-slate-200' }}">
                Semua Kategori
            </a>
            @foreach($categories as $key => $label)
                <a href="{{ route('regulations.index', ['category' => $key]) }}" class="px-3.5 py-2 rounded-xl text-xs font-bold transition-all {{ request('category') === $key ? 'bg-emerald-600 text-white' : 'bg-slate-100 text-slate-700 hover:bg-slate-200' }}">
                    {{ $label }}
                </a>
            @endforeach
        </div>

        <div class="relative w-full sm:w-72">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari judul peraturan..." class="w-full pl-9 pr-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400">
                <i class="fa-solid fa-magnifying-glass text-xs"></i>
            </span>
        </div>
    </form>

    <!-- Regulations Table -->
    <div class="bg-white rounded-2xl border border-slate-200/80 shadow-xs overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-200 text-slate-500 font-bold uppercase">
                        <th class="py-4 px-6">Tahun</th>
                        <th class="py-4 px-6">Judul Peraturan</th>
                        <th class="py-4 px-6">Kategori</th>
                        <th class="py-4 px-6 text-right">Unduh</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-slate-700">
                    @forelse($regulations as $reg)
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="py-4 px-6 font-extrabold text-slate-900">{{ $reg->year ?? '-' }}</td>
                            <td class="py-4 px-6 font-bold text-slate-900">{{ $reg->title }}</td>
                            <td class="py-4 px-6">
                                <span class="px-2.5 py-0.5 rounded-md text-[10px] font-bold bg-slate-100 text-slate-700 border border-slate-200">
                                    {{ $categories[$reg->category] ?? $reg->category }}
                                </span>
                            </td>
                            <td class="py-4 px-6 text-right">
                                <a href="{{ asset('storage/' . $reg->file_path) }}" target="_blank" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-emerald-600 text-white hover:bg-emerald-700 text-xs font-semibold shadow-xs">
                                    <i class="fa-solid fa-download text-xs"></i> PDF
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="py-12 text-center text-slate-400 text-sm">Tidak ditemukan peraturan yang sesuai.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="p-4 border-t border-slate-100">
            {{ $regulations->links() }}
        </div>
    </div>
</div>
@endsection
