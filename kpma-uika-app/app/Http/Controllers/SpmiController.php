<?php

namespace App\Http\Controllers;

use App\Models\SpmiDocument;
use Illuminate\Http\Request;

class SpmiController extends Controller
{
    /**
     * Display SPMI documents filtered by cycle category.
     */
    public function showByCategory(string $category)
    {
        $validCategories = [
            'dokumen_spmi' => 'Dokumen SPMI (Kebijakan, Manual, Standar)',
            'pelaksanaan' => 'Pelaksanaan Standar Mutu',
            'evaluasi' => 'Evaluasi Pelaksanaan Standar (AMI)',
            'pengendalian' => 'Pengendalian Standar Mutu',
            'peningkatan' => 'Peningkatan Standar Mutu (RTM)',
        ];

        $categoryTitle = $validCategories[$category] ?? 'Dokumen SPMI';

        $documents = SpmiDocument::active()
            ->byCategory($category)
            ->latest()
            ->paginate(10);

        return view('spmi.index', compact('documents', 'category', 'categoryTitle', 'validCategories'));
    }
}
