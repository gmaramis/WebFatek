<?php

namespace App\Http\Controllers;

use App\Models\ZonaIntegritasContent;
use Illuminate\Http\Request;

class ZonaIntegritasController extends Controller
{
    public function index()
    {
        // Ambil semua konten Zona Integritas yang aktif, dikelompokkan berdasarkan section
        $contents = ZonaIntegritasContent::where('is_active', true)
            ->orderBy('order')
            ->get()
            ->groupBy('section');

        return view('pages.zona-integritas', compact('contents'));
    }
}
