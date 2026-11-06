@extends('layouts.backend')

@section('title', 'Unggah Dokumen SPMI Baru - APPS KPMA UIKA')

@section('page-title')
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-slate-900 tracking-tight">Unggah Dokumen SPMI Baru</h1>
            <p class="text-xs text-slate-500 mt-1">Tambahkan berkas pedoman atau dokumen standar mutu internal baru.</p>
        </div>
        <a href="{{ route('admin.spmi.index') }}" class="px-4 py-2 rounded-xl bg-slate-100 text-slate-700 hover:bg-slate-200 text-xs font-bold transition-all">
            <i class="fa-solid fa-arrow-left me-1"></i> Kembali
        </a>
    </div>
@endsection

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="bg-white rounded-3xl border border-slate-200/80 p-8 shadow-xs">
        
        <form action="{{ route('admin.spmi.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- 1. Judul Dokumen -->
            <div>
                <label for="title" class="block text-xs font-bold text-slate-800 uppercase tracking-wider mb-2">Judul Dokumen SPMI <span class="text-rose-500">*</span></label>
                <input type="text" name="title" id="title" value="{{ old('title') }}" placeholder="Contoh: Kebijakan Penjaminan Mutu Internal Tahun 2026" required class="w-full bg-slate-50 border border-slate-200 rounded-xl text-xs py-3 px-4 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all @error('title') border-rose-500 @enderror">
                @error('title')
                    <p class="text-xs text-rose-500 mt-1 font-semibold">{{ $message }}</p>
                @enderror
            </div>

            <!-- 2. Kategori PPEPP -->
            <div>
                <label for="cycle_category" class="block text-xs font-bold text-slate-800 uppercase tracking-wider mb-2">Kategori Siklus PPEPP <span class="text-rose-500">*</span></label>
                <select name="cycle_category" id="cycle_category" required class="w-full bg-slate-50 border border-slate-200 rounded-xl text-xs py-3 px-4 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all @error('cycle_category') border-rose-500 @enderror">
                    <option value="">-- Pilih Kategori Siklus --</option>
                    @foreach($categories as $key => $label)
                        <option value="{{ $key }}" {{ old('cycle_category') === $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @error('cycle_category')
                    <p class="text-xs text-rose-500 mt-1 font-semibold">{{ $message }}</p>
                @enderror
            </div>

            <!-- 3. Upload File PDF -->
            <div>
                <label for="file" class="block text-xs font-bold text-slate-800 uppercase tracking-wider mb-2">Berkas PDF Dokumen <span class="text-rose-500">* (Max 10MB)</span></label>
                <input type="file" name="file" id="file" accept=".pdf" required class="w-full bg-slate-50 border border-slate-200 rounded-xl text-xs py-2.5 px-4 focus:ring-2 focus:ring-emerald-500 file:me-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-emerald-100 file:text-emerald-700 hover:file:bg-emerald-200 transition-all @error('file') border-rose-500 @enderror">
                @error('file')
                    <p class="text-xs text-rose-500 mt-1 font-semibold">{{ $message }}</p>
                @enderror
            </div>

            <!-- 4. Deskripsi Penjelas -->
            <div>
                <label for="description" class="block text-xs font-bold text-slate-800 uppercase tracking-wider mb-2">Deskripsi Dokumen (Opsional)</label>
                <textarea name="description" id="description" rows="4" placeholder="Tuliskan ringkasan cakupan dokumen mutu ini..." class="w-full bg-slate-50 border border-slate-200 rounded-xl text-xs py-3 px-4 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all @error('description') border-rose-500 @enderror">{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-xs text-rose-500 mt-1 font-semibold">{{ $message }}</p>
                @enderror
            </div>

            <!-- 5. Status Aktif Checkbox -->
            <div class="flex items-center space-x-3 p-4 rounded-xl bg-slate-50 border border-slate-200">
                <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', '1') == '1' ? 'checked' : '' }} class="w-4 h-4 text-emerald-600 rounded focus:ring-emerald-500 border-slate-300">
                <label for="is_active" class="text-xs font-bold text-slate-800 cursor-pointer">Publikasikan Dokumen (Aktif & Dapat Diunduh Publik)</label>
            </div>

            <!-- Submit Button -->
            <div class="pt-4 border-t border-slate-100 flex justify-end space-x-3">
                <a href="{{ route('admin.spmi.index') }}" class="px-5 py-2.5 rounded-xl bg-slate-100 text-slate-700 hover:bg-slate-200 text-xs font-bold transition-all">Batal</a>
                <button type="submit" class="px-6 py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-xs font-bold text-white shadow-md shadow-emerald-900/20 transition-all">
                    <i class="fa-solid fa-cloud-arrow-up me-1.5"></i> Simpan & Unggah Dokumen
                </button>
            </div>

        </form>

    </div>
</div>
@endsection
