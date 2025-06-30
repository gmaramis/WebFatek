<?php

namespace App\Http\Controllers;

use App\Models\MitraKerjasama;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class MitraKerjasamaController extends Controller
{
    public function index(Request $request)
    {
        // Sementara tanpa cache untuk debugging
        $query = MitraKerjasama::active()->ordered();

        // Filter berdasarkan kategori
        if ($request->has('kategori') && $request->kategori !== 'semua') {
            $query->byKategori($request->kategori);
        }

        // Filter berdasarkan jurusan
        if ($request->has('jurusan') && $request->jurusan !== 'semua') {
            $query->byJurusan($request->jurusan);
        }

        // Filter berdasarkan status
        if ($request->has('status') && $request->status !== 'semua') {
            $query->byStatus($request->status);
        }

        $mitraKerjasamas = $query->get();

        // Optimasi: Gunakan single query untuk mendapatkan semua data filter
        $filterData = MitraKerjasama::active()
            ->select('kategori', 'jurusan', 'status')
            ->get();

        // Extract unique values dari collection dan filter "Semua Jurusan"
        $kategoris = $filterData->pluck('kategori')->unique()->sort()->values();
        $jurusans = $filterData->pluck('jurusan')->unique()->sort()->values()->filter(function($jurusan) {
            return $jurusan !== 'Semua Jurusan';
        });
        $statuses = $filterData->pluck('status')->unique()->sort()->values();

        // Debug: Log jumlah data
        Log::info('Mitra Kerjasama Data Count: ' . $mitraKerjasamas->count());
        Log::info('First 3 items: ' . $mitraKerjasamas->take(3)->pluck('nama_instansi')->implode(', '));

        return view('pages.humas-kerjasama', [
            'mitraKerjasamas' => $mitraKerjasamas,
            'kategoris' => $kategoris,
            'jurusans' => $jurusans,
            'statuses' => $statuses,
        ]);
    }
}
