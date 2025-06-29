<?php

namespace App\Http\Controllers;

use App\Models\P3rpmContent;
use Illuminate\Http\Request;

class P3rpmController extends Controller
{
    public function index()
    {
        // Ambil semua konten P3RPM yang aktif, dikelompokkan berdasarkan section
        $contents = P3rpmContent::where('is_active', true)
            ->orderBy('order')
            ->get()
            ->groupBy('section');

        return view('pages.p3rpm', compact('contents'));
    }
}
