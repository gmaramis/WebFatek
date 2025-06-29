<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use Illuminate\Http\Request;

class AlumniController extends Controller
{
    public function index()
    {
        // Ambil statistik alumni
        $totalAlumni = Alumni::active()->count();
        $alumniBekerja = Alumni::active()->where('status_kerja', 'bekerja')->count();
        $alumniWirausaha = Alumni::active()->where('status_kerja', 'wirausaha')->count();
        $alumniLanjutStudi = Alumni::active()->where('status_kerja', 'lanjut_studi')->count();
        
        // Hitung tingkat penyerapan kerja
        $tingkatPenyerapan = $totalAlumni > 0 ? round((($alumniBekerja + $alumniWirausaha) / $totalAlumni) * 100, 1) : 0;
        
        // Ambil alumni berprestasi (yang memiliki prestasi)
        $alumniBerprestasi = Alumni::active()
            ->whereNotNull('prestasi')
            ->where('prestasi', '!=', '')
            ->orderBy('tahun_lulus', 'desc')
            ->limit(6)
            ->get();
        
        // Ambil data berdasarkan program studi
        $alumniByProgram = [
            'Teknik Informatika' => Alumni::active()->where('program_studi', 'ti')->count(),
            'Pendidikan Teknik Informatika & Komputer' => Alumni::active()->where('program_studi', 'ptik')->count(),
            'Teknik Sipil' => Alumni::active()->where('program_studi', 'ts')->count(),
            'Teknik Mesin' => Alumni::active()->where('program_studi', 'tm')->count(),
            'Teknik Elektro' => Alumni::active()->where('program_studi', 'te')->count(),
            'Arsitektur' => Alumni::active()->where('program_studi', 'ars')->count(),
            'Pendidikan Teknik Bangunan' => Alumni::active()->where('program_studi', 'ptb')->count(),
            'Pendidikan Kesejahteraan Keluarga' => Alumni::active()->where('program_studi', 'pkk')->count(),
        ];
        
        // Ambil data berdasarkan bidang industri
        $alumniByIndustri = [
            'Teknologi Informasi' => Alumni::active()->where('bidang_industri', 'teknologi')->count(),
            'Konstruksi & Real Estate' => Alumni::active()->where('bidang_industri', 'konstruksi')->count(),
            'Manufaktur' => Alumni::active()->where('bidang_industri', 'manufaktur')->count(),
            'Energi & Pertambangan' => Alumni::active()->where('bidang_industri', 'energi')->count(),
            'Keuangan & Perbankan' => Alumni::active()->where('bidang_industri', 'keuangan')->count(),
            'Pendidikan' => Alumni::active()->where('bidang_industri', 'pendidikan')->count(),
            'Kesehatan' => Alumni::active()->where('bidang_industri', 'kesehatan')->count(),
            'Pemerintahan' => Alumni::active()->where('bidang_industri', 'pemerintahan')->count(),
            'Lainnya' => Alumni::active()->where('bidang_industri', 'lainnya')->count(),
        ];
        
        return view('pages.alumni', compact(
            'totalAlumni',
            'tingkatPenyerapan',
            'alumniBerprestasi',
            'alumniByProgram',
            'alumniByIndustri'
        ));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|unique:alumnis,nim',
            'nama_lengkap' => 'required|string|max:255',
            'program_studi' => 'required|string',
            'tahun_lulus' => 'required|integer|min:1990|max:' . date('Y'),
            'email' => 'required|email|unique:alumnis,email',
            'nomor_telepon' => 'nullable|string',
            'alamat' => 'nullable|string',
            'pekerjaan' => 'nullable|string',
            'perusahaan' => 'nullable|string',
        ]);
        
        Alumni::create([
            'nim' => $request->nim,
            'nama_lengkap' => $request->nama_lengkap,
            'program_studi' => $request->program_studi,
            'tahun_lulus' => $request->tahun_lulus,
            'email' => $request->email,
            'nomor_telepon' => $request->nomor_telepon,
            'alamat' => $request->alamat,
            'pekerjaan' => $request->pekerjaan,
            'perusahaan' => $request->perusahaan,
            'is_active' => false, // Set false karena perlu verifikasi admin
            'newsletter' => $request->has('newsletter'),
        ]);
        
        return redirect()->back()->with('success', 'Pendaftaran alumni berhasil! Data Anda akan diverifikasi oleh admin.');
    }
}
