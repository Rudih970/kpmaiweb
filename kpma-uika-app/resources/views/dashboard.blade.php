@extends('layouts.backend')

@section('title', 'Dashboard Internal - KPMA UIKA Bogor')

@section('page-title')
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-900 tracking-tight">Dashboard Ringkasan Mutu</h1>
            <p class="text-xs text-slate-500 mt-1">Selamat datang kembali, <span class="font-semibold text-slate-700">{{ auth()->user()->name }}</span>! Berikut status ringkasan penjaminan mutu KPMA UIKA.</p>
        </div>
        <div class="flex items-center space-x-3">
            <button class="px-4 py-2 rounded-xl bg-white border border-slate-200 text-xs font-semibold text-slate-700 hover:bg-slate-50 shadow-xs flex items-center gap-2">
                <i class="fa-solid fa-download text-emerald-600"></i> Ekspor Laporan
            </button>
        </div>
    </div>
@endsection

@section('content')
<!-- Metric Cards -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    
    <!-- Metric 1 -->
    <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-xs flex items-center justify-between">
        <div>
            <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider block mb-1">Total Dokumen SPMI</span>
            <span class="text-2xl font-extrabold text-slate-900">124</span>
            <span class="text-[11px] font-semibold text-emerald-600 block mt-1"><i class="fa-solid fa-arrow-up me-1"></i> +8 Dokumen bulan ini</span>
        </div>
        <div class="w-12 h-12 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-xl">
            <i class="fa-solid fa-folder-tree"></i>
        </div>
    </div>

    <!-- Metric 2 -->
    <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-xs flex items-center justify-between">
        <div>
            <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider block mb-1">Status Siklus AMI</span>
            <span class="text-2xl font-extrabold text-teal-700">Aktif</span>
            <span class="text-[11px] font-semibold text-teal-600 block mt-1"><i class="fa-solid fa-clock me-1"></i> Siklus Tahun 2026/2027</span>
        </div>
        <div class="w-12 h-12 rounded-2xl bg-teal-50 text-teal-600 flex items-center justify-center text-xl">
            <i class="fa-solid fa-list-check"></i>
        </div>
    </div>

    <!-- Metric 3 -->
    <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-xs flex items-center justify-between">
        <div>
            <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider block mb-1">Akreditasi Prodi</span>
            <span class="text-2xl font-extrabold text-amber-600">32 Prodi</span>
            <span class="text-[11px] font-semibold text-amber-600 block mt-1"><i class="fa-solid fa-award me-1"></i> 85% Terakreditasi Unggul</span>
        </div>
        <div class="w-12 h-12 rounded-2xl bg-amber-50 text-amber-600 flex items-center justify-center text-xl">
            <i class="fa-solid fa-graduation-cap"></i>
        </div>
    </div>

    <!-- Metric 4 -->
    <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-xs flex items-center justify-between">
        <div>
            <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider block mb-1">Peran Terverifikasi</span>
            <span class="text-lg font-bold text-slate-800">
                @if(auth()->user()->hasRole('Admin'))
                    Administrator
                @elseif(auth()->user()->hasRole('Auditor'))
                    Auditor Mutu
                @else
                    Civitas User
                @endif
            </span>
            <span class="text-[11px] text-slate-500 block mt-1"><i class="fa-solid fa-circle-check text-emerald-500 me-1"></i> Hak Akses Aktif</span>
        </div>
        <div class="w-12 h-12 rounded-2xl bg-sky-50 text-sky-600 flex items-center justify-center text-xl">
            <i class="fa-solid fa-user-shield"></i>
        </div>
    </div>
</div>

<!-- Detailed Panel Grid -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    
    <!-- Left 2 Cols: Activity & Audit Progress -->
    <div class="lg:col-span-2 space-y-6">
        <!-- Quick System Notice Card -->
        <div class="bg-gradient-to-r from-slate-900 to-emerald-950 text-white rounded-2xl p-6 shadow-md border border-slate-800 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
            <div>
                <span class="px-2.5 py-1 rounded-md text-[10px] font-bold bg-emerald-500/30 text-emerald-300 border border-emerald-500/40 uppercase">Sistem Siap</span>
                <h3 class="text-lg font-bold mt-2">Fondasi Proyek KPMA UIKA Berhasil Disiapkan</h3>
                <p class="text-xs text-slate-300 mt-1">Laravel 11, Breeze, Spatie Permissions (Admin, Auditor, User), Vite & Tailwind CSS terkonfigurasi dengan sempurna.</p>
            </div>
            <a href="{{ url('/') }}" target="_blank" class="px-4 py-2.5 rounded-xl text-xs font-bold bg-emerald-500 text-slate-950 hover:bg-emerald-400 transition-colors whitespace-nowrap">
                Buka Frontend <i class="fa-solid fa-arrow-up-right-from-square me-1"></i>
            </a>
        </div>

        <!-- Audit Activity Table Placeholder -->
        <div class="bg-white rounded-2xl border border-slate-200/80 p-6 shadow-xs">
            <h3 class="text-base font-bold text-slate-900 mb-4">Aktivitas Audit Mutu Terbaru</h3>
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <thead>
                        <tr class="border-b border-slate-100 text-slate-400 font-semibold uppercase">
                            <th class="pb-3">Unit / Prodi</th>
                            <th class="pb-3">Jenis Audit</th>
                            <th class="pb-3">Auditor</th>
                            <th class="pb-3">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 text-slate-700">
                        <tr>
                            <td class="py-3 font-semibold">S1 Teknik Informatika</td>
                            <td class="py-3">AMI Akademik</td>
                            <td class="py-3">Dr. H. Ahmad, M.T.</td>
                            <td class="py-3"><span class="px-2 py-0.5 rounded-md text-[10px] font-bold bg-emerald-100 text-emerald-700">Selesai</span></td>
                        </tr>
                        <tr>
                            <td class="py-3 font-semibold">S1 Hukum Keluarga Islam</td>
                            <td class="py-3">AMI Akademik</td>
                            <td class="py-3">Dr. Hj. Siti, M.Ag.</td>
                            <td class="py-3"><span class="px-2 py-0.5 rounded-md text-[10px] font-bold bg-amber-100 text-amber-700">Proses Evaluasi</span></td>
                        </tr>
                        <tr>
                            <td class="py-3 font-semibold">Fakultas Ekonomi & Bisnis</td>
                            <td class="py-3">AMI Tata Kelola</td>
                            <td class="py-3">Tim KPMA UIKA</td>
                            <td class="py-3"><span class="px-2 py-0.5 rounded-md text-[10px] font-bold bg-sky-100 text-sky-700">Terjadwal</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Right 1 Col: Registered Accounts & System Status -->
    <div class="space-y-6">
        <div class="bg-white rounded-2xl border border-slate-200/80 p-6 shadow-xs">
            <h3 class="text-base font-bold text-slate-900 mb-4">Akun Demo Terdaftar</h3>
            <p class="text-xs text-slate-500 mb-4">Akun hasil seeder Spatie Role untuk pengujian:</p>
            <div class="space-y-3 text-xs">
                <div class="p-3 rounded-xl bg-slate-50 border border-slate-100">
                    <span class="font-bold text-slate-800 block">Admin</span>
                    <span class="text-slate-500 block">admin@kpma.uika-bogor.ac.id</span>
                    <span class="text-[10px] text-slate-400">Password: <code class="bg-slate-200 px-1 rounded">password</code></span>
                </div>
                <div class="p-3 rounded-xl bg-slate-50 border border-slate-100">
                    <span class="font-bold text-slate-800 block">Auditor</span>
                    <span class="text-slate-500 block">auditor@kpma.uika-bogor.ac.id</span>
                    <span class="text-[10px] text-slate-400">Password: <code class="bg-slate-200 px-1 rounded">password</code></span>
                </div>
                <div class="p-3 rounded-xl bg-slate-50 border border-slate-100">
                    <span class="font-bold text-slate-800 block">User (Civitas)</span>
                    <span class="text-slate-500 block">user@kpma.uika-bogor.ac.id</span>
                    <span class="text-[10px] text-slate-400">Password: <code class="bg-slate-200 px-1 rounded">password</code></span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
