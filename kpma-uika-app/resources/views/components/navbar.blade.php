<!-- Top Announcement Bar -->
<div class="bg-gradient-to-r from-emerald-950 via-teal-900 to-emerald-900 text-slate-200 text-xs py-2 px-4 border-b border-emerald-800/60 shadow-sm">
    <div class="max-w-7xl mx-auto flex flex-col sm:flex-row justify-between items-center gap-2">
        <div class="flex items-center space-x-4">
            <span><i class="fa-solid me-1.5 text-emerald-400 fa-location-dot"></i> Jl. KH. Sholeh Iskandar, Kedung Badak, Tanah Sareal, Kota Bogor</span>
            <span class="hidden md:inline"><i class="fa-solid me-1.5 text-emerald-400 fa-envelope"></i> kpma@uika-bogor.ac.id</span>
        </div>
        <div class="flex items-center space-x-3 text-slate-300">
            <a href="#" class="hover:text-emerald-300 transition-colors" title="Facebook"><i class="fa-brands fa-facebook"></i></a>
            <a href="#" class="hover:text-emerald-300 transition-colors" title="Instagram"><i class="fa-brands fa-instagram"></i></a>
            <a href="#" class="hover:text-emerald-300 transition-colors" title="YouTube"><i class="fa-brands fa-youtube"></i></a>
        </div>
    </div>
</div>

<!-- Main Navigation Header -->
<header x-data="{ mobileOpen: false, activeDropdown: null }" class="sticky top-0 z-50 bg-white/95 backdrop-blur-md border-b border-slate-200/80 shadow-xs transition-all">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            
            <!-- Logo Brand -->
            <div class="flex items-center space-x-3">
                <a href="{{ route('home') }}" class="flex items-center space-x-3 group">
                    <div class="w-11 h-11 rounded-xl bg-gradient-to-tr from-emerald-700 to-teal-500 flex items-center justify-center text-white shadow-md shadow-emerald-900/30 group-hover:scale-105 transition-transform duration-300">
                        <i class="fa-solid fa-award text-2xl"></i>
                    </div>
                    <div>
                        <span class="block font-extrabold text-xl tracking-tight text-slate-900 group-hover:text-emerald-600 transition-colors">KPMA UIKA</span>
                        <span class="block text-[11px] font-semibold text-emerald-700 tracking-wider uppercase">Kantor Penjaminan Mutu & Akreditasi</span>
                    </div>
                </a>
            </div>

            <!-- Desktop Menu Dropdowns -->
            <nav class="hidden lg:flex items-center space-x-1 font-semibold text-sm text-slate-700">
                
                <!-- Home Link -->
                <a href="{{ route('home') }}" class="px-3.5 py-2 rounded-xl transition-all {{ request()->routeIs('home') ? 'text-emerald-700 bg-emerald-50' : 'hover:text-emerald-700 hover:bg-slate-100' }}">
                    <i class="fa-solid fa-house me-1 text-xs"></i> Beranda
                </a>

                <!-- 1. SPMI Dropdown -->
                <div class="relative" @mouseenter="activeDropdown = 'spmi'" @mouseleave="activeDropdown = null">
                    <button class="flex items-center space-x-1.5 px-3.5 py-2 rounded-xl transition-all {{ request()->is('spmi*') ? 'text-emerald-700 bg-emerald-50' : 'hover:text-emerald-700 hover:bg-slate-100' }}">
                        <i class="fa-solid fa-shield-halved text-xs text-emerald-600"></i>
                        <span>SPMI</span>
                        <i class="fa-solid fa-chevron-down text-[10px] transition-transform duration-200" :class="activeDropdown === 'spmi' ? 'rotate-180 text-emerald-600' : 'text-slate-400'"></i>
                    </button>
                    
                    <div x-show="activeDropdown === 'spmi'" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 translate-y-1" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 translate-y-1" class="absolute left-0 mt-1 w-64 bg-white rounded-2xl shadow-xl border border-slate-100 py-2 z-50 overflow-hidden">
                        <a href="{{ route('spmi.category', 'dokumen_spmi') }}" class="flex items-center space-x-3 px-4 py-2.5 text-xs text-slate-700 hover:bg-emerald-50 hover:text-emerald-700 transition-colors">
                            <i class="fa-solid fa-file-contract text-emerald-600 w-4"></i>
                            <span>Dokumen SPMI</span>
                        </a>
                        <a href="{{ route('spmi.category', 'pelaksanaan') }}" class="flex items-center space-x-3 px-4 py-2.5 text-xs text-slate-700 hover:bg-emerald-50 hover:text-emerald-700 transition-colors">
                            <i class="fa-solid fa-square-check text-emerald-600 w-4"></i>
                            <span>Pelaksanaan Standar</span>
                        </a>
                        <a href="{{ route('spmi.category', 'evaluasi') }}" class="flex items-center space-x-3 px-4 py-2.5 text-xs text-slate-700 hover:bg-emerald-50 hover:text-emerald-700 transition-colors">
                            <i class="fa-solid fa-magnifying-glass-chart text-emerald-600 w-4"></i>
                            <span>Evaluasi Pelaksanaan (AMI)</span>
                        </a>
                        <a href="{{ route('spmi.category', 'pengendalian') }}" class="flex items-center space-x-3 px-4 py-2.5 text-xs text-slate-700 hover:bg-emerald-50 hover:text-emerald-700 transition-colors">
                            <i class="fa-solid fa-sliders text-emerald-600 w-4"></i>
                            <span>Pengendalian Standar</span>
                        </a>
                        <a href="{{ route('spmi.category', 'peningkatan') }}" class="flex items-center space-x-3 px-4 py-2.5 text-xs text-slate-700 hover:bg-emerald-50 hover:text-emerald-700 transition-colors">
                            <i class="fa-solid fa-chart-line text-emerald-600 w-4"></i>
                            <span>Peningkatan Standar (RTM)</span>
                        </a>
                    </div>
                </div>

                <!-- 2. SPME Dropdown -->
                <div class="relative" @mouseenter="activeDropdown = 'spme'" @mouseleave="activeDropdown = null">
                    <button class="flex items-center space-x-1.5 px-3.5 py-2 rounded-xl transition-all {{ request()->is('spme*') ? 'text-emerald-700 bg-emerald-50' : 'hover:text-emerald-700 hover:bg-slate-100' }}">
                        <i class="fa-solid fa-ribbon text-xs text-teal-600"></i>
                        <span>SPME & Akreditasi</span>
                        <i class="fa-solid fa-chevron-down text-[10px] transition-transform duration-200" :class="activeDropdown === 'spme' ? 'rotate-180 text-teal-600' : 'text-slate-400'"></i>
                    </button>

                    <div x-show="activeDropdown === 'spme'" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 translate-y-1" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 translate-y-1" class="absolute left-0 mt-1 w-64 bg-white rounded-2xl shadow-xl border border-slate-100 py-2 z-50 overflow-hidden">
                        <a href="{{ route('spme.category', 'akreditasi_nasional') }}" class="flex items-center space-x-3 px-4 py-2.5 text-xs text-slate-700 hover:bg-teal-50 hover:text-teal-700 transition-colors">
                            <i class="fa-solid fa-award text-teal-600 w-4"></i>
                            <span>Akreditasi Nasional (BAN-PT)</span>
                        </a>
                        <a href="{{ route('spme.category', 'akreditasi_internasional') }}" class="flex items-center space-x-3 px-4 py-2.5 text-xs text-slate-700 hover:bg-teal-50 hover:text-teal-700 transition-colors">
                            <i class="fa-solid fa-globe text-teal-600 w-4"></i>
                            <span>Akreditasi Internasional</span>
                        </a>
                        <a href="{{ route('spme.category', 'cakupan_lam') }}" class="flex items-center space-x-3 px-4 py-2.5 text-xs text-slate-700 hover:bg-teal-50 hover:text-teal-700 transition-colors">
                            <i class="fa-solid fa-layer-group text-teal-600 w-4"></i>
                            <span>Cakupan LAM</span>
                        </a>
                        <a href="{{ route('spme.category', 'instrumen_panduan') }}" class="flex items-center space-x-3 px-4 py-2.5 text-xs text-slate-700 hover:bg-teal-50 hover:text-teal-700 transition-colors">
                            <i class="fa-solid fa-book-open text-teal-600 w-4"></i>
                            <span>Instrumen & Panduan</span>
                        </a>
                    </div>
                </div>

                <!-- 3. Peraturan Dropdown -->
                <div class="relative" @mouseenter="activeDropdown = 'peraturan'" @mouseleave="activeDropdown = null">
                    <button class="flex items-center space-x-1.5 px-3.5 py-2 rounded-xl transition-all {{ request()->routeIs('regulations.index') ? 'text-emerald-700 bg-emerald-50' : 'hover:text-emerald-700 hover:bg-slate-100' }}">
                        <i class="fa-solid fa-scale-balanced text-xs text-slate-600"></i>
                        <span>Peraturan</span>
                        <i class="fa-solid fa-chevron-down text-[10px] transition-transform duration-200" :class="activeDropdown === 'peraturan' ? 'rotate-180 text-emerald-600' : 'text-slate-400'"></i>
                    </button>

                    <div x-show="activeDropdown === 'peraturan'" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 translate-y-1" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 translate-y-1" class="absolute left-0 mt-1 w-64 bg-white rounded-2xl shadow-xl border border-slate-100 py-2 z-50 overflow-hidden">
                        <a href="{{ route('regulations.index', ['category' => 'uu_pemerintah']) }}" class="flex items-center space-x-3 px-4 py-2.5 text-xs text-slate-700 hover:bg-slate-50 hover:text-emerald-700 transition-colors">
                            <i class="fa-solid fa-landmark text-slate-500 w-4"></i>
                            <span>Peraturan Pemerintah / UU</span>
                        </a>
                        <a href="{{ route('regulations.index', ['category' => 'statuta_yayasan']) }}" class="flex items-center space-x-3 px-4 py-2.5 text-xs text-slate-700 hover:bg-slate-50 hover:text-emerald-700 transition-colors">
                            <i class="fa-solid fa-building text-slate-500 w-4"></i>
                            <span>Statuta & Peraturan Yayasan</span>
                        </a>
                        <a href="{{ route('regulations.index', ['category' => 'peraturan_rektor']) }}" class="flex items-center space-x-3 px-4 py-2.5 text-xs text-slate-700 hover:bg-slate-50 hover:text-emerald-700 transition-colors">
                            <i class="fa-solid fa-scroll text-slate-500 w-4"></i>
                            <span>Peraturan Rektor UIKA</span>
                        </a>
                        <a href="{{ route('regulations.index', ['category' => 'pedoman_operasional']) }}" class="flex items-center space-x-3 px-4 py-2.5 text-xs text-slate-700 hover:bg-slate-50 hover:text-emerald-700 transition-colors">
                            <i class="fa-solid fa-book-bookmark text-slate-500 w-4"></i>
                            <span>Pedoman Operasional</span>
                        </a>
                    </div>
                </div>

                <!-- 4. Informasi Dropdown -->
                <div class="relative" @mouseenter="activeDropdown = 'informasi'" @mouseleave="activeDropdown = null">
                    <button class="flex items-center space-x-1.5 px-3.5 py-2 rounded-xl transition-all {{ request()->routeIs('information.index') ? 'text-emerald-700 bg-emerald-50' : 'hover:text-emerald-700 hover:bg-slate-100' }}">
                        <i class="fa-solid fa-bullhorn text-xs text-amber-600"></i>
                        <span>Informasi</span>
                        <i class="fa-solid fa-chevron-down text-[10px] transition-transform duration-200" :class="activeDropdown === 'informasi' ? 'rotate-180 text-amber-600' : 'text-slate-400'"></i>
                    </button>

                    <div x-show="activeDropdown === 'informasi'" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 translate-y-1" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 translate-y-1" class="absolute left-0 mt-1 w-60 bg-white rounded-2xl shadow-xl border border-slate-100 py-2 z-50 overflow-hidden">
                        <a href="{{ route('information.index', ['category' => 'pengumuman_penting']) }}" class="flex items-center space-x-3 px-4 py-2.5 text-xs text-slate-700 hover:bg-amber-50 hover:text-amber-700 transition-colors">
                            <i class="fa-solid fa-circle-exclamation text-amber-600 w-4"></i>
                            <span>Pengumuman Penting</span>
                        </a>
                        <a href="{{ route('information.index', ['category' => 'agenda']) }}" class="flex items-center space-x-3 px-4 py-2.5 text-xs text-slate-700 hover:bg-amber-50 hover:text-amber-700 transition-colors">
                            <i class="fa-solid fa-calendar-days text-amber-600 w-4"></i>
                            <span>Agenda Kegiatan</span>
                        </a>
                        <a href="{{ route('information.index', ['category' => 'berita']) }}" class="flex items-center space-x-3 px-4 py-2.5 text-xs text-slate-700 hover:bg-amber-50 hover:text-amber-700 transition-colors">
                            <i class="fa-solid fa-newspaper text-amber-600 w-4"></i>
                            <span>Berita Mutu Terkini</span>
                        </a>
                    </div>
                </div>

            </nav>

            <!-- Right APPS KPMA Button -->
            <div class="hidden lg:flex items-center space-x-3">
                @auth
                    <a href="{{ url('/dashboard') }}" class="inline-flex items-center justify-center px-5 py-2.5 rounded-xl text-xs font-bold text-white bg-gradient-to-r from-emerald-600 via-teal-600 to-emerald-700 hover:from-emerald-700 hover:to-teal-800 shadow-md shadow-emerald-900/30 hover:scale-105 transition-all">
                        <i class="fa-solid fa-grip me-2"></i> APPS KPMA
                    </a>
                @else
                    <a href="{{ route('login') }}" class="inline-flex items-center justify-center px-5 py-2.5 rounded-xl text-xs font-bold text-white bg-gradient-to-r from-emerald-600 via-teal-600 to-emerald-700 hover:from-emerald-700 hover:to-teal-800 shadow-md shadow-emerald-900/30 hover:scale-105 transition-all">
                        <i class="fa-solid fa-right-to-bracket me-2"></i> APPS KPMA
                    </a>
                @endauth
            </div>

            <!-- Mobile menu button -->
            <div class="lg:hidden flex items-center">
                <button @click="mobileOpen = !mobileOpen" class="p-2 rounded-xl text-slate-600 hover:bg-slate-100 focus:outline-none">
                    <i class="fa-solid text-xl" :class="mobileOpen ? 'fa-xmark' : 'fa-bars'"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Navigation Drawer -->
    <div x-show="mobileOpen" x-transition class="lg:hidden bg-white border-b border-slate-200 px-4 pt-2 pb-6 space-y-3">
        <a href="{{ route('home') }}" class="block px-3 py-2 rounded-xl font-bold text-slate-800 hover:bg-slate-50">Beranda</a>
        
        <div class="border-t border-slate-100 pt-2 space-y-1">
            <span class="px-3 text-[10px] font-bold text-emerald-700 uppercase tracking-wider">SPMI</span>
            <a href="{{ route('spmi.category', 'dokumen_spmi') }}" class="block px-3 py-1.5 text-xs text-slate-600 hover:text-emerald-700">Dokumen SPMI</a>
            <a href="{{ route('spmi.category', 'pelaksanaan') }}" class="block px-3 py-1.5 text-xs text-slate-600 hover:text-emerald-700">Pelaksanaan Standar</a>
            <a href="{{ route('spmi.category', 'evaluasi') }}" class="block px-3 py-1.5 text-xs text-slate-600 hover:text-emerald-700">Evaluasi Pelaksanaan (AMI)</a>
            <a href="{{ route('spmi.category', 'pengendalian') }}" class="block px-3 py-1.5 text-xs text-slate-600 hover:text-emerald-700">Pengendalian Standar</a>
            <a href="{{ route('spmi.category', 'peningkatan') }}" class="block px-3 py-1.5 text-xs text-slate-600 hover:text-emerald-700">Peningkatan Standar (RTM)</a>
        </div>

        <div class="border-t border-slate-100 pt-2 space-y-1">
            <span class="px-3 text-[10px] font-bold text-teal-700 uppercase tracking-wider">SPME & Akreditasi</span>
            <a href="{{ route('spme.category', 'akreditasi_nasional') }}" class="block px-3 py-1.5 text-xs text-slate-600 hover:text-teal-700">Akreditasi Nasional</a>
            <a href="{{ route('spme.category', 'akreditasi_internasional') }}" class="block px-3 py-1.5 text-xs text-slate-600 hover:text-teal-700">Akreditasi Internasional</a>
            <a href="{{ route('spme.category', 'cakupan_lam') }}" class="block px-3 py-1.5 text-xs text-slate-600 hover:text-teal-700">Cakupan LAM</a>
            <a href="{{ route('spme.category', 'instrumen_panduan') }}" class="block px-3 py-1.5 text-xs text-slate-600 hover:text-teal-700">Instrumen & Panduan</a>
        </div>

        <div class="border-t border-slate-100 pt-2 space-y-1">
            <span class="px-3 text-[10px] font-bold text-slate-700 uppercase tracking-wider">Peraturan</span>
            <a href="{{ route('regulations.index') }}" class="block px-3 py-1.5 text-xs text-slate-600 hover:text-emerald-700">Semua Peraturan</a>
        </div>

        <div class="pt-3 border-t border-slate-100">
            @auth
                <a href="{{ url('/dashboard') }}" class="w-full inline-flex justify-center items-center py-2.5 rounded-xl text-xs font-bold text-white bg-emerald-600">APPS KPMA</a>
            @else
                <a href="{{ route('login') }}" class="w-full inline-flex justify-center items-center py-2.5 rounded-xl text-xs font-bold text-white bg-emerald-600">APPS KPMA</a>
            @endauth
        </div>
    </div>
</header>
