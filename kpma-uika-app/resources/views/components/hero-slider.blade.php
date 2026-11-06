@props(['slides' => []])

<div x-data="{ 
        currentSlide: 0, 
        totalSlides: {{ count($slides) > 0 ? count($slides) : 1 }},
        autoplayTimer: null,
        startAutoplay() {
            this.autoplayTimer = setInterval(() => {
                this.nextSlide();
            }, 5000);
        },
        stopAutoplay() {
            if (this.autoplayTimer) clearInterval(this.autoplayTimer);
        },
        nextSlide() {
            this.currentSlide = (this.currentSlide + 1) % this.totalSlides;
        },
        prevSlide() {
            this.currentSlide = (this.currentSlide - 1 + this.totalSlides) % this.totalSlides;
        }
    }" 
    x-init="startAutoplay()"
    @mouseenter="stopAutoplay()"
    @mouseleave="startAutoplay()"
    class="relative overflow-hidden bg-slate-900 text-white min-h-[460px] md:min-h-[520px] flex items-center shadow-xl">

    <!-- Background Decorative Glow -->
    <div class="absolute -top-32 -right-32 w-96 h-96 bg-emerald-500/20 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute -bottom-32 -left-32 w-96 h-96 bg-teal-500/20 rounded-full blur-3xl pointer-events-none"></div>

    <!-- Slides Container -->
    <div class="w-full relative z-10">
        @if(count($slides) > 0)
            @foreach($slides as $index => $slide)
                <div x-show="currentSlide === {{ $index }}" 
                     x-transition:enter="transition ease-out duration-700 transform" 
                     x-transition:enter-start="opacity-0 scale-95" 
                     x-transition:enter-end="opacity-100 scale-100" 
                     x-transition:leave="transition ease-in duration-300 transform" 
                     x-transition:leave-start="opacity-100 scale-100" 
                     x-transition:leave-end="opacity-0 scale-95"
                     class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
                    
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                        
                        <!-- Left Content Overlay -->
                        <div class="lg:col-span-8 space-y-6">
                            <div class="flex items-center space-x-3">
                                <span class="px-3 py-1 rounded-full text-xs font-extrabold bg-emerald-500/20 text-emerald-300 border border-emerald-500/30 uppercase tracking-widest backdrop-blur-md">
                                    <i class="fa-solid fa-star me-1 text-amber-400"></i> Featured Slide {{ $index + 1 }}
                                </span>
                                <span class="text-xs text-slate-400">
                                    <i class="fa-regular fa-clock me-1"></i> {{ $slide->created_at ? $slide->created_at->translatedFormat('d M Y') : date('d M Y') }}
                                </span>
                            </div>

                            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight leading-tight text-white drop-shadow-sm">
                                {{ $slide->title }}
                            </h1>

                            <p class="text-sm sm:text-base text-slate-300 max-w-2xl font-normal leading-relaxed line-clamp-3">
                                {{ Str::limit(strip_tags($slide->content), 180) }}
                            </p>

                            <div class="pt-2 flex flex-wrap items-center gap-4">
                                <a href="{{ route('information.show', $slide->slug) }}" class="inline-flex items-center justify-center px-6 py-3 rounded-xl font-bold text-xs text-slate-950 bg-gradient-to-r from-emerald-400 to-teal-300 hover:from-emerald-300 hover:to-teal-200 shadow-lg shadow-emerald-950/50 hover:scale-105 transition-all">
                                    <span>Baca Selengkapnya</span>
                                    <i class="fa-solid fa-arrow-right ms-2 text-xs"></i>
                                </a>
                                <a href="{{ route('information.index') }}" class="inline-flex items-center justify-center px-6 py-3 rounded-xl font-bold text-xs text-white bg-white/10 hover:bg-white/20 border border-white/20 backdrop-blur-md transition-all">
                                    <span>Arsip Informasi</span>
                                </a>
                            </div>
                        </div>

                        <!-- Right Graphic Badge Card -->
                        <div class="lg:col-span-4 hidden lg:flex justify-center">
                            <div class="w-72 h-72 rounded-3xl bg-gradient-to-tr from-emerald-800/40 via-teal-900/60 to-slate-800/80 border border-emerald-500/30 p-6 flex flex-col justify-between backdrop-blur-md shadow-2xl relative overflow-hidden group">
                                <div class="w-14 h-14 rounded-2xl bg-emerald-500/20 flex items-center justify-center text-emerald-300 text-2xl font-bold border border-emerald-500/40">
                                    <i class="fa-solid fa-award"></i>
                                </div>
                                <div class="space-y-2">
                                    <span class="text-xs font-bold text-emerald-400 uppercase tracking-widest">KPMA UIKA Bogor</span>
                                    <h3 class="text-lg font-bold text-white leading-snug">Sistem Penjaminan Mutu Internal</h3>
                                </div>
                                <div class="pt-4 border-t border-slate-700/60 flex justify-between items-center text-xs text-slate-400">
                                    <span>Universitas Ibn Khaldun</span>
                                    <span class="text-emerald-400 font-semibold"><i class="fa-solid fa-circle text-[8px] me-1 text-emerald-400"></i> Aktif</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>

    <!-- Navigation Controls (Prev/Next) -->
    <button @click="prevSlide()" class="absolute left-4 top-1/2 -translate-y-1/2 z-20 w-11 h-11 rounded-full bg-slate-800/60 hover:bg-emerald-600 text-white flex items-center justify-center border border-white/10 backdrop-blur-md transition-all">
        <i class="fa-solid fa-chevron-left text-sm"></i>
    </button>
    <button @click="nextSlide()" class="absolute right-4 top-1/2 -translate-y-1/2 z-20 w-11 h-11 rounded-full bg-slate-800/60 hover:bg-emerald-600 text-white flex items-center justify-center border border-white/10 backdrop-blur-md transition-all">
        <i class="fa-solid fa-chevron-right text-sm"></i>
    </button>

    <!-- Slide Indicators -->
    <div class="absolute bottom-6 left-1/2 -translate-x-1/2 z-20 flex space-x-2">
        @foreach($slides as $index => $slide)
            <button @click="currentSlide = {{ $index }}" 
                    class="h-2 rounded-full transition-all duration-300"
                    :class="currentSlide === {{ $index }} ? 'w-8 bg-emerald-400' : 'w-2 bg-white/30 hover:bg-white/60'">
            </button>
        @endforeach
    </div>
</div>
