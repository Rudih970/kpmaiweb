<?php

namespace App\Http\Controllers;

use App\Models\Regulation;
use Illuminate\Http\Request;

class RegulationController extends Controller
{
    /**
     * Display regulations listing with search and category filtering.
     */
    public function index(Request $request)
    {
        $categories = [
            'uu_pemerintah' => 'Peraturan Pemerintah / UU',
            'statuta_yayasan' => 'Statuta & Peraturan Yayasan',
            'peraturan_rektor' => 'Peraturan Rektor UIKA',
            'pedoman_operasional' => 'Pedoman Operasional Mutu',
        ];

        $query = Regulation::query();

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('title', 'like', "%{$search}%");
        }

        $regulations = $query->latest()->paginate(12);

        return view('regulations.index', compact('regulations', 'categories'));
    }
}
