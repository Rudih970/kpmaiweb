<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSpmiRequest;
use App\Http\Requests\UpdateSpmiRequest;
use App\Models\SpmiDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SpmiDocumentController extends Controller
{
    /**
     * Categories array mapping for PPEPP cycle.
     */
    protected array $categories = [
        'dokumen_spmi' => 'Dokumen SPMI (Kebijakan, Manual, Standar)',
        'pelaksanaan' => 'Pelaksanaan Standar Mutu',
        'evaluasi' => 'Evaluasi Pelaksanaan Standar (AMI)',
        'pengendalian' => 'Pengendalian Standar Mutu',
        'peningkatan' => 'Peningkatan Standar Mutu (RTM)',
    ];

    /**
     * Display a listing of SPMI documents.
     */
    public function index(Request $request)
    {
        $query = SpmiDocument::query();

        if ($request->filled('category')) {
            $query->where('cycle_category', $request->category);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('title', 'like', "%{$search}%");
        }

        $documents = $query->latest()->paginate(10);
        $categories = $this->categories;

        return view('admin.spmi.index', compact('documents', 'categories'));
    }

    /**
     * Show the form for creating a new SPMI document.
     */
    public function create()
    {
        $categories = $this->categories;
        return view('admin.spmi.create', compact('categories'));
    }

    /**
     * Store a newly created SPMI document in storage.
     */
    public function store(StoreSpmiRequest $request)
    {
        $validated = $request->validated();

        // 1. Upload PDF File
        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('documents/spmi', 'public');
            $validated['file_path'] = $path;
        }

        // 2. Generate Slug
        $baseSlug = Str::slug($validated['title']);
        $slug = $baseSlug;
        $count = 1;
        while (SpmiDocument::where('slug', $slug)->exists()) {
            $slug = "{$baseSlug}-{$count}";
            $count++;
        }
        $validated['slug'] = $slug;

        // 3. Active Checkbox Default
        $validated['is_active'] = $request->has('is_active') ? true : false;

        SpmiDocument::create($validated);

        return redirect()->route('admin.spmi.index')
            ->with('success', 'Dokumen SPMI berhasil diunggah dan disimpan.');
    }

    /**
     * Show the form for editing the specified SPMI document.
     */
    public function edit(SpmiDocument $spmi)
    {
        $categories = $this->categories;
        return view('admin.spmi.edit', compact('spmi', 'categories'));
    }

    /**
     * Update the specified SPMI document in storage.
     */
    public function update(UpdateSpmiRequest $request, SpmiDocument $spmi)
    {
        $validated = $request->validated();

        // 1. Handle New PDF File Upload
        if ($request->hasFile('file')) {
            // Delete old file from public storage if exists
            if ($spmi->file_path && Storage::disk('public')->exists($spmi->file_path)) {
                Storage::disk('public')->delete($spmi->file_path);
            }

            $path = $request->file('file')->store('documents/spmi', 'public');
            $validated['file_path'] = $path;
        }

        // 2. Update Slug if title changed
        if ($spmi->title !== $validated['title']) {
            $baseSlug = Str::slug($validated['title']);
            $slug = $baseSlug;
            $count = 1;
            while (SpmiDocument::where('slug', $slug)->where('id', '!=', $spmi->id)->exists()) {
                $slug = "{$baseSlug}-{$count}";
                $count++;
            }
            $validated['slug'] = $slug;
        }

        $validated['is_active'] = $request->has('is_active') ? true : false;

        $spmi->update($validated);

        return redirect()->route('admin.spmi.index')
            ->with('success', 'Dokumen SPMI berhasil diperbarui.');
    }

    /**
     * Remove the specified SPMI document from storage.
     */
    public function destroy(SpmiDocument $spmi)
    {
        // Delete PDF file from storage
        if ($spmi->file_path && Storage::disk('public')->exists($spmi->file_path)) {
            Storage::disk('public')->delete($spmi->file_path);
        }

        $spmi->delete();

        return redirect()->route('admin.spmi.index')
            ->with('success', 'Dokumen SPMI berhasil dihapus dari sistem.');
    }
}
