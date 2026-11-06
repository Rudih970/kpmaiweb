<!-- Institutional Footer -->
<footer class="bg-slate-900 text-slate-300 border-t border-slate-800 mt-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-10">
            
            <!-- Column 1: Brand Info -->
            <div class="space-y-4 md:col-span-1">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-emerald-600 to-teal-500 flex items-center justify-center text-white font-bold shadow-md shadow-emerald-950/50">
                        <i class="fa-solid fa-award text-xl"></i>
                    </div>
                    <span class="font-extrabold text-lg text-white tracking-wide">KPMA UIKA</span>
                </div>
                <p class="text-xs text-slate-400 leading-relaxed">
                    Kantor Penjaminan Mutu & Akreditasi Universitas Ibn Khaldun Bogor. Berkomitmen menjamin mutu pendidikan tinggi berbasis nilai keislaman dan taraf internasional.
                </p>
                <div class="flex space-x-3 text-slate-400 pt-2">
                    <a href="#" class="w-8 h-8 rounded-lg bg-slate-800 flex items-center justify-center hover:bg-emerald-600 hover:text-white transition-colors"><i class="fa-brands fa-facebook-f text-xs"></i></a>
                    <a href="#" class="w-8 h-8 rounded-lg bg-slate-800 flex items-center justify-center hover:bg-emerald-600 hover:text-white transition-colors"><i class="fa-brands fa-instagram text-xs"></i></a>
                    <a href="#" class="w-8 h-8 rounded-lg bg-slate-800 flex items-center justify-center hover:bg-emerald-600 hover:text-white transition-colors"><i class="fa-brands fa-youtube text-xs"></i></a>
                </div>
            </div>

            <!-- Column 2: SPMI & Mutu Links -->
            <div>
                <h4 class="text-xs font-bold text-white uppercase tracking-wider mb-4 border-l-2 border-emerald-500 pl-2">Navigasi Mutu</h4>
                <ul class="space-y-2.5 text-xs text-slate-400">
                    <li><a href="{{ route('spmi.category', 'dokumen_spmi') }}" class="hover:text-emerald-400 transition-colors"><i class="fa-solid fa-chevron-right text-[9px] me-1.5 text-emerald-500"></i> Dokumen Kebijakan SPMI</a></li>
                    <li><a href="{{ route('spmi.category', 'evaluasi') }}" class="hover:text-emerald-400 transition-colors"><i class="fa-solid fa-chevron-right text-[9px] me-1.5 text-emerald-500"></i> Audit Mutu Internal (AMI)</a></li>
                    <li><a href="{{ route('spme.category', 'akreditasi_nasional') }}" class="hover:text-emerald-400 transition-colors"><i class="fa-solid fa-chevron-right text-[9px] me-1.5 text-emerald-500"></i> Status Akreditasi BAN-PT</a></li>
                    <li><a href="{{ route('spme.category', 'instrumen_panduan') }}" class="hover:text-emerald-400 transition-colors"><i class="fa-solid fa-chevron-right text-[9px] me-1.5 text-emerald-500"></i> Instrumen & Borang Mutu</a></li>
                </ul>
            </div>

            <!-- Column 3: Regulations -->
            <div>
                <h4 class="text-xs font-bold text-white uppercase tracking-wider mb-4 border-l-2 border-teal-500 pl-2">Regulasi & Acuan</h4>
                <ul class="space-y-2.5 text-xs text-slate-400">
                    <li><a href="{{ route('regulations.index', ['category' => 'uu_pemerintah']) }}" class="hover:text-teal-400 transition-colors"><i class="fa-solid fa-chevron-right text-[9px] me-1.5 text-teal-500"></i> Permendikbudristek SPMI</a></li>
                    <li><a href="{{ route('regulations.index', ['category' => 'statuta_yayasan']) }}" class="hover:text-teal-400 transition-colors"><i class="fa-solid fa-chevron-right text-[9px] me-1.5 text-teal-500"></i> Statuta Yayasan YPIK</a></li>
                    <li><a href="{{ route('regulations.index', ['category' => 'peraturan_rektor']) }}" class="hover:text-teal-400 transition-colors"><i class="fa-solid fa-chevron-right text-[9px] me-1.5 text-teal-500"></i> Peraturan Rektor UIKA</a></li>
                    <li><a href="{{ route('regulations.index', ['category' => 'pedoman_operasional']) }}" class="hover:text-teal-400 transition-colors"><i class="fa-solid fa-chevron-right text-[9px] me-1.5 text-teal-500"></i> Pedoman Operasional Mutu</a></li>
                </ul>
            </div>

            <!-- Column 4: Contact & Address -->
            <div>
                <h4 class="text-xs font-bold text-white uppercase tracking-wider mb-4 border-l-2 border-amber-500 pl-2">Kontak Alamat</h4>
                <ul class="space-y-3 text-xs text-slate-400">
                    <li class="flex items-start space-x-3">
                        <i class="fa-solid fa-building-columns mt-0.5 text-emerald-400"></i>
                        <span>Gedung Rektorat Lt. 2, Universitas Ibn Khaldun Bogor</span>
                    </li>
                    <li class="flex items-center space-x-3">
                        <i class="fa-solid fa-phone text-emerald-400"></i>
                        <span>(0251) 8335335</span>
                    </li>
                    <li class="flex items-center space-x-3">
                        <i class="fa-solid fa-envelope text-emerald-400"></i>
                        <span>kpma@uika-bogor.ac.id</span>
                    </li>
                </ul>
            </div>

        </div>

        <!-- Copyright Banner -->
        <div class="mt-12 pt-8 border-t border-slate-800 flex flex-col sm:flex-row justify-between items-center gap-4 text-xs text-slate-500">
            <p>&copy; {{ date('Y') }} KPMA Universitas Ibn Khaldun Bogor. All rights reserved.</p>
            <div class="flex space-x-6">
                <a href="#" class="hover:text-slate-400">Kebijakan Privasi</a>
                <a href="#" class="hover:text-slate-400">Syarat & Ketentuan</a>
            </div>
        </div>
    </div>
</footer>
