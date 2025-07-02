<?php

namespace App\Http\Controllers;

use App\Models\StrukturPimpinan;
use Illuminate\Http\Request;

class StrukturPimpinanController extends Controller
{
    public function index()
    {
        // Ambil data struktur pimpinan yang aktif, diurutkan berdasarkan level dan urutan
        $dekan = StrukturPimpinan::active()
            ->where('level', 'dekan')
            ->ordered()
            ->first();

        $wakilDekan = StrukturPimpinan::active()
            ->where('level', 'wakil_dekan')
            ->ordered()
            ->get();

        $kepalaJurusan = StrukturPimpinan::active()
            ->where('level', 'kepala_jurusan')
            ->ordered()
            ->get();

        return view('pages.struktur', compact('dekan', 'wakilDekan', 'kepalaJurusan'));
    }
} 