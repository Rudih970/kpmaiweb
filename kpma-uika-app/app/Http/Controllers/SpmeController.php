<?php

namespace App\Http\Controllers;

use App\Models\SpmeItem;
use Illuminate\Http\Request;

class SpmeController extends Controller
{
    /**
     * Display SPME items filtered by category.
     */
    public function showByCategory(string $category)
    {
        $validCategories = [
            'akreditasi_nasional' => 'Akreditasi Nasional (BAN-PT)',
            'akreditasi_internasional' => 'Akreditasi Internasional',
            'cakupan_lam' => 'Cakupan Lembaga Akreditasi Mandiri (LAM)',
            'instrumen_panduan' => 'Instrumen & Panduan Akreditasi',
        ];

        $categoryTitle = $validCategories[$category] ?? 'Akreditasi SPME';

        $items = SpmeItem::byCategory($category)
            ->latest()
            ->paginate(10);

        return view('spme.index', compact('items', 'category', 'categoryTitle', 'validCategories'));
    }
}
