<?php

namespace App\Http\Controllers;

use App\Models\StrukturOrganisasi;

class StrukturOrganisasiController extends Controller
{
    public function index()
    {
        $record = \App\Models\StrukturOrganisasi::first();
        return view('pages.struktur-organisasi', [
            'title'     => $record->title ?? 'Struktur Organisasi',
            'subtitle'  => $record->subtitle ?? null,
            'imagePath' => $record->image_path ?? null,
        ]);
    }
}
