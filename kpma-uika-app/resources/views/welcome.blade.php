@extends('layouts.frontend')

@section('title', 'KPMA UIKA Bogor - Kantor Penjaminan Mutu & Akreditasi')

@section('content')
<!-- Hero Section -->
<div class="relative overflow-hidden bg-gradient-to-b from-emerald-900 via-teal-900 to-slate-900 text-white py-24 px-4 sm:px-6 lg:px-8">
    <!-- Decorative background glow -->
    <div class="absolute -top-40 -right-40 w-96 h-96 bg-emerald-500/20 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute -bottom-40 -left-40 w-96 h-96 bg-teal-500/20 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto relative z-10 text-center">
        <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-semibold bg-emerald-500/20 text-emerald-300 border border-emerald-500/30 mb-6 backdrop-blur-sm">
            <i class="fa-solid fa-star text-amber-400"></i> Terakreditasi Unggul & Berstandar Nasional
        </span>
        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight max-w-4xl mx-auto leading-tight">
            Kantor Penjaminan Mutu & Akreditasi <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 to-teal-200">UIKA Bogor</span>
        </h1>
        <p class="mt-6 text-lg sm:text-xl text-slate-300 max-w-2xl mx-auto font-normal leading-relaxed">
            Mewujudkan budaya mutu yang terintegrasi, berkelanjutan, dan berakhlakul karimah di lingkungan Universitas Ibn Khaldun Bogor.
        </p>

        <div class="mt-10 flex flex-wrap justify-center gap-4">
            <a href="{{ route('login') }}" class="px-8 py-3.5 rounded-xl font-semibold text-slate-900 bg-gradient-to-r from-emerald-400 to-teal-300 hover:from-emerald-300 hover:to-teal-200 shadow-lg shadow-emerald-950/50 hover:scale-105 transition-all">
                <i class="fa-solid fa-right-to-bracket me-2"></i> Masuk Portal Mutu
            </a>
            <a href="#layanan" class="px-8 py-3.5 rounded-xl font-semibold text-white bg-white/10 hover:bg-white/20 border border-white/20 backdrop-blur-md transition-all">
                <i class="fa-solid fa-circle-info me-2"></i> Jelajahi Layanan
            </a>
        </div>
    </div>
</div>

<!-- Quick Stats Bar -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-10 relative z-20">
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 bg-white rounded-2xl p-6 shadow-xl border border-slate-100">
        <div class="text-center p-3 border-r last:border-r-0 border-slate-100">
            <div class="text-3xl font-extrabold text-emerald-700">30+</div>
            <div class="text-xs text-slate-500 font-medium mt-1">Program Studi Terakreditasi</div>
        </div>
        <div class="text-center p-3 border-r last:border-r-0 border-slate-100">
            <div class="text-3xl font-extrabold text-teal-700">100%</div>
            <div class="text-xs text-slate-500 font-medium mt-1">Implementasi SPMI</div>
        </div>
        <div class="text-center p-3 border-r last:border-r-0 border-slate-100">
            <div class="text-3xl font-extrabold text-emerald-700">50+</div>
            <div class="text-xs text-slate-500 font-medium mt-1">Auditor Mutu Terekam</div>
        </div>
        <div class="text-center p-3">
            <div class="text-3xl font-extrabold text-amber-600">A / Unggul</div>
            <div class="text-xs text-slate-500 font-medium mt-1">Akreditasi Institusi</div>
        </div>
    </div>
</div>

<!-- Main Services Section -->
<div id="layanan" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
    <div class="text-center max-w-2xl mx-auto mb-16">
        <h2 class="text-xs font-bold text-emerald-700 uppercase tracking-widest mb-2">Layanan Utama KPMA</h2>
        <p class="text-3xl font-bold text-slate-900 tracking-tight">Fokus Penjaminan Mutu & Akreditasi</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Card 1: SPMI -->
        <div class="bg-white rounded-2xl p-8 border border-slate-200/80 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all">
            <div class="w-14 h-14 rounded-2xl bg-emerald-100 text-emerald-700 flex items-center justify-center text-2xl font-bold mb-6">
                <i class="fa-solid fa-shield-halved"></i>
            </div>
            <h3 class="text-xl font-bold text-slate-900 mb-3">Sistem Penjaminan Mutu Internal (SPMI)</h3>
            <p class="text-sm text-slate-600 leading-relaxed mb-6">
                Pengelolaan dan siklus PPEPP (Penetapan, Pelaksanaan, Evaluasi, Pengendalian, dan Peningkatan) standar mutu perguruan tinggi.
            </p>
            <a href="#" class="text-sm font-semibold text-emerald-700 hover:text-emerald-800 flex items-center gap-2 group">
                Dokumen SPMI <i class="fa-solid fa-arrow-right text-xs group-hover:translate-x-1 transition-transform"></i>
            </a>
        </div>

        <!-- Card 2: AMI -->
        <div class="bg-white rounded-2xl p-8 border border-slate-200/80 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all">
            <div class="w-14 h-14 rounded-2xl bg-teal-100 text-teal-700 flex items-center justify-center text-2xl font-bold mb-6">
                <i class="fa-solid fa-magnifying-glass-chart"></i>
            </div>
            <h3 class="text-xl font-bold text-slate-900 mb-3">Audit Mutu Internal (AMI)</h3>
            <p class="text-sm text-slate-600 leading-relaxed mb-6">
                Proses evaluasi berkala capaian standar akademik dan non-akademik di seluruh fakultas, lembaga, dan unit kerja UIKA.
            </p>
            <a href="#" class="text-sm font-semibold text-teal-700 hover:text-teal-800 flex items-center gap-2 group">
                Jadwal & Hasil AMI <i class="fa-solid fa-arrow-right text-xs group-hover:translate-x-1 transition-transform"></i>
            </a>
        </div>

        <!-- Card 3: Akreditasi -->
        <div class="bg-white rounded-2xl p-8 border border-slate-200/80 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all">
            <div class="w-14 h-14 rounded-2xl bg-amber-100 text-amber-700 flex items-center justify-center text-2xl font-bold mb-6">
                <i class="fa-solid fa-ribbon"></i>
            </div>
            <h3 class="text-xl font-bold text-slate-900 mb-3">Akreditasi & Fasilitasi</h3>
            <p class="text-sm text-slate-600 leading-relaxed mb-6">
                Fasilitasi penyusunan LED dan LKPS untuk re-akreditasi BAN-PT, LAM-PT, serta sertifikasi internasional.
            </p>
            <a href="#" class="text-sm font-semibold text-amber-700 hover:text-amber-800 flex items-center gap-2 group">
                Status Akreditasi <i class="fa-solid fa-arrow-right text-xs group-hover:translate-x-1 transition-transform"></i>
            </a>
        </div>
    </div>
</div>
@endsection
