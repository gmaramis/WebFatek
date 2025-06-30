<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index()
    {
        // Ambil berita terbaru untuk homepage (3 berita)
        $beritaTerbaru = Berita::orderBy('tanggal', 'desc')
            ->limit(3)
            ->get();

        // Ambil semua berita untuk halaman berita
        $semuaBerita = Berita::orderBy('tanggal', 'desc')
            ->paginate(9);

        // Ambil berita terbaru untuk sidebar (5 berita)
        $beritaTerbaruSidebar = Berita::orderBy('tanggal', 'desc')
            ->limit(5)
            ->get();

        return view('pages.berita', compact('beritaTerbaru', 'semuaBerita', 'beritaTerbaruSidebar'));
    }

    public function show($slug)
    {
        $berita = Berita::where('slug', $slug)->firstOrFail();
        
        // Ambil berita terkait (berita lain dengan tanggal terdekat)
        $beritaTerkait = Berita::where('id', '!=', $berita->id)
            ->orderBy('tanggal', 'desc')
            ->limit(3)
            ->get();

        return view('pages.detail-berita', compact('berita', 'beritaTerkait'));
    }

    public function getBeritaTerbaru()
    {
        // Method untuk mengambil berita terbaru (untuk homepage)
        return Berita::orderBy('tanggal', 'desc')
            ->limit(3)
            ->get();
    }
} 