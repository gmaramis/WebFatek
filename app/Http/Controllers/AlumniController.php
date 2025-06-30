<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\AlumniContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlumniController extends Controller
{
    public function index()
    {
        // Optimasi: Gunakan single query untuk mendapatkan semua statistik
        $statistics = DB::table('alumnis')
            ->where('is_active', true)
            ->selectRaw('
                COUNT(*) as total_alumni,
                SUM(CASE WHEN status_kerja = "bekerja" THEN 1 ELSE 0 END) as alumni_bekerja,
                SUM(CASE WHEN status_kerja = "wirausaha" THEN 1 ELSE 0 END) as alumni_wirausaha,
                SUM(CASE WHEN status_kerja = "lanjut_studi" THEN 1 ELSE 0 END) as alumni_lanjut_studi,
                SUM(CASE WHEN program_studi = "ti" THEN 1 ELSE 0 END) as ti_count,
                SUM(CASE WHEN program_studi = "ptik" THEN 1 ELSE 0 END) as ptik_count,
                SUM(CASE WHEN program_studi = "ts" THEN 1 ELSE 0 END) as ts_count,
                SUM(CASE WHEN program_studi = "tm" THEN 1 ELSE 0 END) as tm_count,
                SUM(CASE WHEN program_studi = "te" THEN 1 ELSE 0 END) as te_count,
                SUM(CASE WHEN program_studi = "ars" THEN 1 ELSE 0 END) as ars_count,
                SUM(CASE WHEN program_studi = "ptb" THEN 1 ELSE 0 END) as ptb_count,
                SUM(CASE WHEN program_studi = "pkk" THEN 1 ELSE 0 END) as pkk_count,
                SUM(CASE WHEN bidang_industri = "teknologi" THEN 1 ELSE 0 END) as teknologi_count,
                SUM(CASE WHEN bidang_industri = "konstruksi" THEN 1 ELSE 0 END) as konstruksi_count,
                SUM(CASE WHEN bidang_industri = "manufaktur" THEN 1 ELSE 0 END) as manufaktur_count,
                SUM(CASE WHEN bidang_industri = "energi" THEN 1 ELSE 0 END) as energi_count,
                SUM(CASE WHEN bidang_industri = "keuangan" THEN 1 ELSE 0 END) as keuangan_count,
                SUM(CASE WHEN bidang_industri = "pendidikan" THEN 1 ELSE 0 END) as pendidikan_count,
                SUM(CASE WHEN bidang_industri = "kesehatan" THEN 1 ELSE 0 END) as kesehatan_count,
                SUM(CASE WHEN bidang_industri = "pemerintahan" THEN 1 ELSE 0 END) as pemerintahan_count,
                SUM(CASE WHEN bidang_industri = "lainnya" THEN 1 ELSE 0 END) as lainnya_count
            ')
            ->first();

        $totalAlumni = $statistics->total_alumni;
        $alumniBekerja = $statistics->alumni_bekerja;
        $alumniWirausaha = $statistics->alumni_wirausaha;
        $alumniLanjutStudi = $statistics->alumni_lanjut_studi;
        
        // Hitung tingkat penyerapan kerja
        $tingkatPenyerapan = $totalAlumni > 0 ? round((($alumniBekerja + $alumniWirausaha) / $totalAlumni) * 100, 1) : 0;
        
        // Ambil alumni berprestasi (yang memiliki prestasi)
        $alumniBerprestasi = Alumni::active()
            ->whereNotNull('prestasi')
            ->where('prestasi', '!=', '')
            ->orderBy('tahun_lulus', 'desc')
            ->limit(6)
            ->get();
        
        // Data berdasarkan program studi dari single query
        $alumniByProgram = [
            'Teknik Informatika' => $statistics->ti_count,
            'Pendidikan Teknik Informatika & Komputer' => $statistics->ptik_count,
            'Teknik Sipil' => $statistics->ts_count,
            'Teknik Mesin' => $statistics->tm_count,
            'Teknik Elektro' => $statistics->te_count,
            'Arsitektur' => $statistics->ars_count,
            'Pendidikan Teknik Bangunan' => $statistics->ptb_count,
            'Pendidikan Kesejahteraan Keluarga' => $statistics->pkk_count,
        ];
        
        // Data berdasarkan bidang industri dari single query
        $alumniByIndustri = [
            'Teknologi Informasi' => $statistics->teknologi_count,
            'Konstruksi & Real Estate' => $statistics->konstruksi_count,
            'Manufaktur' => $statistics->manufaktur_count,
            'Energi & Pertambangan' => $statistics->energi_count,
            'Keuangan & Perbankan' => $statistics->keuangan_count,
            'Pendidikan' => $statistics->pendidikan_count,
            'Kesehatan' => $statistics->kesehatan_count,
            'Pemerintahan' => $statistics->pemerintahan_count,
            'Lainnya' => $statistics->lainnya_count,
        ];

        // Ambil konten dari CMS
        $cmsContent = [
            'hero' => AlumniContent::getSectionContent('hero'),
            'statistik' => AlumniContent::getSectionContent('statistik'),
            'testimonial' => AlumniContent::getSectionContent('testimonial'),
            'galeri_kegiatan' => AlumniContent::getSectionContent('galeri_kegiatan'),
            'jaringan_alumni' => AlumniContent::getSectionContent('jaringan_alumni'),
            'kontribusi' => AlumniContent::getSectionContent('kontribusi'),
        ];
        
        return view('pages.alumni', compact(
            'totalAlumni',
            'tingkatPenyerapan',
            'alumniBerprestasi',
            'alumniByProgram',
            'alumniByIndustri',
            'cmsContent'
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
