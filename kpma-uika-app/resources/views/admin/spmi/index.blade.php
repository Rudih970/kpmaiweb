@extends('layouts.backend')

@section('title', 'Kelola SPMI - APPS KPMA UIKA')

@section('page-title')
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-900 tracking-tight">Modul Pengelolaan SPMI</h1>
            <p class="text-xs text-slate-500 mt-1">Kelola berkas PDF dokumen SPMI berdasarkan 5 siklus PPEPP.</p>
        </div>
        <div>
            <a href="{{ route('admin.spmi.create') }}" class="px-4 py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-xs font-bold text-white shadow-md shadow-emerald-900/20 flex items-center gap-2 transition-all">
                <i class="fa-solid fa-plus text-xs"></i> Unggah Dokumen Baru
            </a>
        </div>
    </div>
@endsection

@section('content')
<!-- Success Alert Banner -->
@if(session('success'))
    <div class="mb-6 p-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs font-semibold flex items-center justify-between shadow-xs">
        <div class="flex items-center space-x-2">
            <i class="fa-solid fa-circle-check text-emerald-600 text-base"></i>
            <span>{{ session('success') }}</span>
        </div>
    </div>
@endif

<!-- Search & Category Filter Header -->
<div class="bg-white rounded-2xl p-4 border border-slate-200/80 shadow-xs mb-6 flex flex-col sm:flex-row items-center justify-between gap-4">
    <form method="GET" action="{{ route('admin.spmi.index') }}" class="flex flex-col sm:flex-row gap-3 w-full items-center">
        <div class="w-full sm:w-64">
            <select name="category" onchange="this.form.submit()" class="w-full bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold text-slate-700 py-2.5 px-3 focus:ring-2 focus:ring-emerald-500">
                <option value="">-- Semua Kategori PPEPP --</option>
                @foreach($categories as $key => $label)
                    <option value="{{ $key }}" {{ request('category') === $key ? 'selected' : '' }}>{{ $label }}</option>
                @endforeach
            </select>
        </div>

        <div class="relative w-full sm:w-72">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari judul dokumen..." class="w-full pl-9 pr-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs focus:ring-2 focus:ring-emerald-500">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400">
                <i class="fa-solid fa-magnifying-glass text-xs"></i>
            </span>
        </div>

        <button type="submit" class="px-4 py-2 rounded-xl bg-slate-900 text-white text-xs font-bold hover:bg-slate-800 transition-colors w-full sm:w-auto">Filter</button>
    </form>
</div>

<!-- Data Table -->
<div class="bg-white rounded-2xl border border-slate-200/80 shadow-xs overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left text-xs">
            <thead>
                <tr class="bg-slate-50 border-b border-slate-200 text-slate-500 font-bold uppercase">
                    <th class="py-4 px-6">Dokumen</th>
                    <th class="py-4 px-6">Kategori Siklus PPEPP</th>
                    <th class="py-4 px-6">Status Publik</th>
                    <th class="py-4 px-6">Tanggal Unggah</th>
                    <th class="py-4 px-6 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 text-slate-700">
                @forelse($documents as $doc)
                    <tr class="hover:bg-slate-50 transition-colors">
                        <td class="py-4 px-6">
                            <div class="flex items-start space-x-3">
                                <i class="fa-solid fa-file-pdf text-emerald-600 text-lg mt-0.5"></i>
                                <div>
                                    <p class="font-bold text-slate-900 text-xs">{{ $doc->title }}</p>
                                    <p class="text-[11px] text-slate-400 mt-0.5 line-clamp-1">{{ $doc->description ?? 'Tidak ada deskripsi.' }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="py-4 px-6">
                            <span class="px-2.5 py-1 rounded-lg text-[10px] font-bold bg-slate-100 text-slate-700 border border-slate-200 uppercase">
                                {{ strtoupper(str_replace('_', ' ', $doc->cycle_category)) }}
                            </span>
                        </td>
                        <td class="py-4 px-6">
                            @if($doc->is_active)
                                <span class="px-2.5 py-1 rounded-lg text-[10px] font-bold bg-emerald-100 text-emerald-700 border border-emerald-200"><i class="fa-solid fa-check me-1"></i> Aktif</span>
                            @else
                                <span class="px-2.5 py-1 rounded-lg text-[10px] font-bold bg-slate-100 text-slate-500 border border-slate-200">Nonaktif</span>
                            @endif
                        </td>
                        <td class="py-4 px-6 text-slate-500 font-medium">
                            {{ $doc->created_at ? $doc->created_at->format('d M Y, H:i') : '-' }}
                        </td>
                        <td class="py-4 px-6 text-right">
                            <div class="flex items-center justify-end space-x-2">
                                @if($doc->file_path)
                                    <a href="{{ asset('storage/' . $doc->file_path) }}" target="_blank" class="p-2 rounded-lg bg-emerald-50 text-emerald-600 hover:bg-emerald-100 transition-colors" title="Unduh File PDF">
                                        <i class="fa-solid fa-download text-xs"></i>
                                    </a>
                                @endif
                                <a href="{{ route('admin.spmi.edit', $doc->id) }}" class="p-2 rounded-lg bg-amber-50 text-amber-600 hover:bg-amber-100 transition-colors" title="Edit Dokumen">
                                    <i class="fa-solid fa-pen-to-square text-xs"></i>
                                </a>
                                <form action="{{ route('admin.spmi.destroy', $doc->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus dokumen ini?');" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 rounded-lg bg-rose-50 text-rose-600 hover:bg-rose-100 transition-colors" title="Hapus Dokumen">
                                        <i class="fa-solid fa-trash text-xs"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="py-12 text-center text-slate-400 text-xs">Belum ada dokumen SPMI yang terdaftar.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="p-4 border-t border-slate-100">
        {{ $documents->links() }}
    </div>
</div>
@endsection
