<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-slate-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Dashboard Backend - KPMA UIKA Bogor')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">

    <!-- FontAwesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Scripts & Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
    @stack('styles')
</head>
<body class="h-full antialiased text-slate-800 selection:bg-emerald-500 selection:text-white" x-data="{ sidebarOpen: false }">

    <div class="min-h-screen flex bg-slate-100">
        
        <!-- Sidebar Overlay for Mobile -->
        <div x-show="sidebarOpen" x-transition:enter="transition-opacity ease-linear duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 bg-slate-900/60 z-40 lg:hidden" @click="sidebarOpen = false"></div>

        <!-- Sidebar Panel -->
        <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" class="fixed lg:static inset-y-0 left-0 z-50 w-64 bg-slate-900 text-slate-300 transition-transform duration-300 ease-in-out lg:translate-x-0 flex flex-col flex-shrink-0 border-r border-slate-800 shadow-xl lg:shadow-none">
            
            <!-- Sidebar Header Brand -->
            <div class="h-20 flex items-center px-6 border-b border-slate-800/80 bg-slate-950/40">
                <a href="{{ url('/dashboard') }}" class="flex items-center space-x-3 group">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-emerald-600 to-teal-500 flex items-center justify-center text-white font-bold shadow-md shadow-emerald-900/40 group-hover:scale-105 transition-transform">
                        <i class="fa-solid fa-award text-lg"></i>
                    </div>
                    <div>
                        <span class="block font-bold text-base text-white tracking-wide">KPMA UIKA</span>
                        <span class="block text-[10px] font-semibold text-emerald-400 uppercase tracking-wider">Internal Portal</span>
                    </div>
                </a>
            </div>

            <!-- Role Badge -->
            <div class="px-6 py-3 bg-slate-800/40 border-b border-slate-800/60 flex items-center justify-between text-xs">
                <span class="text-slate-400 font-medium">Peran Akses:</span>
                @if(auth()->user()->hasRole('Admin'))
                    <span class="px-2 py-0.5 rounded-md text-[11px] font-bold bg-amber-500/20 text-amber-300 border border-amber-500/30"><i class="fa-solid fa-user-shield me-1"></i> Admin</span>
                @elseif(auth()->user()->hasRole('Auditor'))
                    <span class="px-2 py-0.5 rounded-md text-[11px] font-bold bg-sky-500/20 text-sky-300 border border-sky-500/30"><i class="fa-solid fa-clipboard-check me-1"></i> Auditor</span>
                @else
                    <span class="px-2 py-0.5 rounded-md text-[11px] font-bold bg-emerald-500/20 text-emerald-300 border border-emerald-500/30"><i class="fa-solid fa-user me-1"></i> Civitas User</span>
                @endif
            </div>

            <!-- Navigation Links -->
            <nav class="flex-1 overflow-y-auto px-4 py-6 space-y-6">
                <!-- Group 1: Utamanya -->
                <div>
                    <h5 class="px-3 text-[11px] font-bold uppercase tracking-wider text-slate-400/80 mb-2">Utama</h5>
                    <div class="space-y-1">
                        <a href="{{ url('/dashboard') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded-xl text-sm font-semibold transition-all {{ request()->is('dashboard') ? 'bg-emerald-600 text-white shadow-md shadow-emerald-900/50' : 'hover:bg-slate-800/80 hover:text-white text-slate-300' }}">
                            <i class="fa-solid fa-chart-pie w-5 text-center"></i>
                            <span>Dashboard</span>
                        </a>
                    </div>
                </div>

                <!-- Group 2: Modul SPMI & AMI -->
                <div>
                    <h5 class="px-3 text-[11px] font-bold uppercase tracking-wider text-slate-400/80 mb-2">Mutu & Audit</h5>
                    <div class="space-y-1">
                        <a href="#" class="flex items-center space-x-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all hover:bg-slate-800/80 hover:text-white text-slate-300">
                            <i class="fa-solid fa-file-contract w-5 text-center text-emerald-400"></i>
                            <span>Dokumen Mutu SPMI</span>
                        </a>
                        <a href="#" class="flex items-center space-x-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all hover:bg-slate-800/80 hover:text-white text-slate-300">
                            <i class="fa-solid fa-clipboard-list w-5 text-center text-emerald-400"></i>
                            <span>Audit Mutu (AMI)</span>
                        </a>
                        <a href="#" class="flex items-center space-x-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all hover:bg-slate-800/80 hover:text-white text-slate-300">
                            <i class="fa-solid fa-ribbon w-5 text-center text-emerald-400"></i>
                            <span>Akreditasi Prodi</span>
                        </a>
                    </div>
                </div>

                <!-- Group 3: Pengaturan Admin (Role Gated) -->
                @role('Admin')
                <div>
                    <h5 class="px-3 text-[11px] font-bold uppercase tracking-wider text-amber-400/90 mb-2">Administrasi</h5>
                    <div class="space-y-1">
                        <a href="#" class="flex items-center space-x-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all hover:bg-slate-800/80 hover:text-white text-slate-300">
                            <i class="fa-solid fa-users w-5 text-center text-amber-400"></i>
                            <span>Manajemen Pengguna</span>
                        </a>
                        <a href="#" class="flex items-center space-x-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all hover:bg-slate-800/80 hover:text-white text-slate-300">
                            <i class="fa-solid fa-user-gear w-5 text-center text-amber-400"></i>
                            <span>Role & Izin (Spatie)</span>
                        </a>
                    </div>
                </div>
                @endrole
            </nav>

            <!-- Sidebar Footer User Quick Controls -->
            <div class="p-4 border-t border-slate-800 bg-slate-950/40">
                <a href="{{ route('profile.edit') }}" class="flex items-center space-x-3 p-2 rounded-xl hover:bg-slate-800 transition-colors group">
                    <div class="w-9 h-9 rounded-lg bg-emerald-700 flex items-center justify-center text-white font-bold text-sm">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-semibold text-white truncate group-hover:text-emerald-400 transition-colors">{{ auth()->user()->name }}</p>
                        <p class="text-xs text-slate-400 truncate">{{ auth()->user()->email }}</p>
                    </div>
                </a>
            </div>
        </aside>

        <!-- Main Workspace Area -->
        <div class="flex-1 flex flex-col min-w-0">
            
            <!-- Top Dashboard Header Navigation -->
            <header class="h-20 bg-white border-b border-slate-200/80 flex items-center justify-between px-4 sm:px-8 sticky top-0 z-30 shadow-xs">
                
                <!-- Left: Sidebar Toggle & Search Bar -->
                <div class="flex items-center space-x-4">
                    <button @click="sidebarOpen = !sidebarOpen" class="p-2 rounded-xl text-slate-500 hover:bg-slate-100 lg:hidden">
                        <i class="fa-solid fa-bars text-lg"></i>
                    </button>

                    <div class="relative hidden sm:block w-64 md:w-80">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-slate-400">
                            <i class="fa-solid fa-magnifying-glass text-xs"></i>
                        </span>
                        <input type="text" placeholder="Cari dokumen, standar, audit..." class="w-full pl-9 pr-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all">
                    </div>
                </div>

                <!-- Right: Quick Actions & Profile Dropdown -->
                <div class="flex items-center space-x-3" x-data="{ userMenuOpen: false }">
                    <a href="{{ url('/') }}" target="_blank" class="p-2 rounded-xl text-slate-500 hover:text-emerald-600 hover:bg-slate-100 transition-all text-sm font-semibold flex items-center gap-1.5" title="Lihat Website Utama">
                        <i class="fa-solid fa-globe"></i>
                        <span class="hidden md:inline">Website Front</span>
                    </a>

                    <!-- Notification Indicator -->
                    <button class="p-2 rounded-xl text-slate-500 hover:bg-slate-100 relative transition-all">
                        <i class="fa-regular fa-bell text-lg"></i>
                        <span class="absolute top-1.5 right-1.5 w-2 h-2 rounded-full bg-emerald-500 ring-2 ring-white"></span>
                    </button>

                    <!-- User Profile Dropdown -->
                    <div class="relative">
                        <button @click="userMenuOpen = !userMenuOpen" class="flex items-center space-x-3 p-1.5 rounded-xl hover:bg-slate-100 transition-all focus:outline-none">
                            <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-emerald-600 to-teal-700 text-white font-bold flex items-center justify-center shadow-xs">
                                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                            </div>
                            <span class="hidden md:block text-xs font-semibold text-slate-700">{{ auth()->user()->name }}</span>
                            <i class="fa-solid fa-chevron-down text-[10px] text-slate-400"></i>
                        </button>

                        <div x-show="userMenuOpen" @click.away="userMenuOpen = false" x-transition class="absolute right-0 mt-2 w-48 bg-white rounded-2xl shadow-xl border border-slate-100 py-2 z-50">
                            <div class="px-4 py-2 border-b border-slate-100">
                                <p class="text-xs font-bold text-slate-800">{{ auth()->user()->name }}</p>
                                <p class="text-[11px] text-slate-400 truncate">{{ auth()->user()->email }}</p>
                            </div>
                            <a href="{{ route('profile.edit') }}" class="flex items-center space-x-2 px-4 py-2 text-xs text-slate-600 hover:bg-slate-50 hover:text-emerald-600 transition-colors">
                                <i class="fa-solid fa-user-pen"></i>
                                <span>Edit Profil</span>
                            </a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full flex items-center space-x-2 px-4 py-2 text-xs text-rose-600 hover:bg-rose-50 transition-colors text-left">
                                    <i class="fa-solid fa-right-from-bracket"></i>
                                    <span>Keluar (Logout)</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Page Main Content Area -->
            <main class="flex-1 p-6 sm:p-8">
                <!-- Page Title Header Slot -->
                @hasSection('page-title')
                    <div class="mb-6">
                        @yield('page-title')
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    @stack('scripts')
</body>
</html>
