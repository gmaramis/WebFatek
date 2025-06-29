<?php

namespace App\Http\Controllers;

use App\Models\Jurnal;
use Illuminate\Http\Request;

class JurnalController extends Controller
{
    public function index()
    {
        // Ambil semua jurnal yang aktif, dikelompokkan berdasarkan jurusan
        $jurnals = Jurnal::where('status', 'aktif')
            ->orderBy('urutan')
            ->get()
            ->groupBy('jurusan');

        // Statistik publikasi
        $statistik = [
            'total_jurnal' => Jurnal::where('status', 'aktif')->count(),
            'jurnal_terpublikasi' => 150, // Data statis untuk contoh
            'peneliti_aktif' => 25, // Data statis untuk contoh
            'program_studi' => 8, // Data statis untuk contoh
            'kolaborasi' => 50, // Data statis untuk contoh
        ];

        return view('pages.p3ki', compact('jurnals', 'statistik'));
    }
}
