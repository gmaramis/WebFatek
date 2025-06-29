<?php

namespace App\Http\Controllers;

use App\Models\UnitPenjaminanMutu;
use App\Models\GugusPenjaminanMutu;
use App\Models\DokumenAmi;
use Illuminate\Http\Request;

class UnitPenjaminanMutuController extends Controller
{
    public function index()
    {
        // Ambil data ketua UPM
        $ketuaUPM = UnitPenjaminanMutu::active()->first();
        
        // Ambil data GPM per program studi
        $gpmList = GugusPenjaminanMutu::active()->ordered()->get();
        
        // Ambil data dokumen AMI dikelompokkan per tahun
        $dokumenAMI = DokumenAmi::active()
            ->ordered()
            ->get()
            ->groupBy('tahun');
        
        // Ambil tahun-tahun yang tersedia untuk accordion
        $tahunList = $dokumenAMI->keys()->sort()->reverse();
        
        return view('pages.penjaminan-mutu', compact('ketuaUPM', 'gpmList', 'dokumenAMI', 'tahunList'));
    }
}
