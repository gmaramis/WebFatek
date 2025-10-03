<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;

class JurusanController extends Controller
{
    public function index()
    {
        $jurusans = Jurusan::query()
            ->where('is_active', 1)   // ada di tabel kamu
            ->orderBy('nama', 'asc')  // ganti urutan pakai 'nama'
            ->get();

        return view('pages.jurusan', compact('jurusans'));
    }

    public function show(\App\Models\Jurusan $jurusan)
    {
        $related = \App\Models\Jurusan::query()
            ->where('id', '!=', $jurusan->id)
            ->when(method_exists(\App\Models\Jurusan::class, 'scopeActive'), fn($q) => $q->active())
            ->when($jurusan->jenjang, fn($q) => $q->where('jenjang', $jurusan->jenjang))
            ->orderBy('nama')
            ->limit(6)
            ->get();

        return view('jurusan.show', compact('jurusan', 'related'));
    }
}