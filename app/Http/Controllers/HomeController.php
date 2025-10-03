<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Models\Berita;
use App\Models\Pengumuman;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil slider yang aktif
        $sliders = Slider::where('is_active', true)
            ->orderBy('urutan', 'asc')
            ->take(3)
            ->get();

        // Ambil berita terbaru untuk section berita
        $beritaTerbaru = Berita::orderBy('tanggal', 'desc')
            ->limit(3)
            ->get();

        // Ambil pengumuman terbaru untuk section pengumuman
        $pengumumanTerbaru = Pengumuman::where('status', 'published')
            ->orderBy('tanggal_posting', 'desc')
            ->limit(3)
            ->get();

        return view('home', compact('sliders', 'beritaTerbaru', 'pengumumanTerbaru'));
    }
}