<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Pengumuman;
use App\Models\Jurusan;

class SearchController extends Controller
{
    public function index(Request $r)
    {
        $q = trim($r->get('q', ''));

        if ($q === '') {
            return view('search.results', [
                'q'          => $q,
                'berita'     => collect(),
                'pengumuman' => collect(),
                'prodi'      => collect(),
            ]);
        }

        // BERITA: kolom judul, isi, slug
        $berita = Berita::query()
            ->where(function ($w) use ($q) {
                $w->where('judul', 'like', "%{$q}%")
                    ->orWhere('isi', 'like', "%{$q}%");
            })
            ->orderByDesc('tanggal') // pakai kolom 'tanggal' di modelmu
            ->limit(10)->get();

        // PENGUMUMAN: kolom judul, isi, id; route('pengumuman.detail', $id)
        $pengumuman = Pengumuman::query()
            ->where(function ($w) use ($q) {
                $w->where('judul', 'like', "%{$q}%")
                    ->orWhere('isi', 'like', "%{$q}%");
            })
            ->orderByDesc('tanggal_posting')
            ->limit(10)->get();

        // JURUSAN/PROGRAM STUDI: kolom nama, deskripsi
        $prodi = Jurusan::query()
            ->where(function ($w) use ($q) {
                $w->where('nama', 'like', "%{$q}%")
                    ->orWhere('deskripsi', 'like', "%{$q}%");
            })
            ->orderBy('nama')
            ->limit(10)->get();

        return view('search.results', compact('q', 'berita', 'pengumuman', 'prodi'));
    }
}