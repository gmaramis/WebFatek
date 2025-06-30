<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    public function index(Request $request)
    {
        $query = Pengumuman::query()->where('status', 'published');

        // Filter kategori
        if ($request->filled('kategori')) {
            $query->where('kategori', $request->kategori);
        }

        // Pencarian
        if ($request->filled('q')) {
            $q = $request->q;
            $query->where(function($sub) use ($q) {
                $sub->where('judul', 'like', "%$q%")
                    ->orWhere('isi', 'like', "%$q%")
                    ->orWhere('kategori', 'like', "%$q%")
                ;
            });
        }

        // Urutan
        $sort = $request->input('sort', 'latest');
        if ($sort === 'oldest') {
            $query->orderBy('tanggal_posting', 'asc');
        } elseif ($sort === 'title') {
            $query->orderBy('judul', 'asc');
        } else {
            $query->orderBy('tanggal_posting', 'desc');
        }

        $pengumumans = $query->paginate(8)->withQueryString();

        // Untuk sidebar: kategori unik
        $kategoriList = Pengumuman::select('kategori')->distinct()->pluck('kategori');

        return view('pages.pengumuman', compact('pengumumans', 'kategoriList'));
    }

    public function show($id)
    {
        $pengumuman = Pengumuman::where('id', $id)->where('status', 'published')->firstOrFail();
        return view('pages.detail-pengumuman', compact('pengumuman'));
    }
} 