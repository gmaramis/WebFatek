<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function getActiveSliders()
    {
        // Ambil slider yang aktif, diurutkan berdasarkan urutan
        $sliders = Slider::where('is_active', true)
            ->orderBy('urutan', 'asc')
            ->get();

        return $sliders;
    }

    public function index()
    {
        // Method untuk halaman khusus slider (jika diperlukan)
        $sliders = $this->getActiveSliders();
        
        return view('pages.sliders', compact('sliders'));
    }
}
