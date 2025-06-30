<?php

namespace App\Http\Controllers;

use App\Models\SurveyLayanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SurveyLayananController extends Controller
{
    public function index()
    {
        return view('pages.survey-layanan');
    }

    public function form()
    {
        return view('pages.survey-layanan-form');
    }

    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telepon' => 'required|string|max:20',
            'kategori_responden' => 'required|in:mahasiswa,dosen,tenaga_kependidikan,alumni,pemangku_kepentingan',
            'program_studi' => 'nullable|string|max:100',
            'unit_kerja' => 'nullable|string|max:100',
            
            // Validasi penilaian (1-5)
            'kemudahan_akses' => 'required|integer|min:1|max:5',
            'kecepatan_pelayanan' => 'required|integer|min:1|max:5',
            'keramahan_petugas' => 'required|integer|min:1|max:5',
            'kejelasan_informasi' => 'required|integer|min:1|max:5',
            'kualitas_hasil' => 'required|integer|min:1|max:5',
            'kepuasan_keseluruhan' => 'required|integer|min:1|max:5',
            
            // Feedback
            'komentar_positif' => 'nullable|string|max:1000',
            'komentar_negatif' => 'nullable|string|max:1000',
            'saran_perbaikan' => 'nullable|string|max:1000',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            // Set default values for removed fields
            $data = $request->all();
            $data['jenis_layanan'] = 'umum';
            $data['layanan_spesifik'] = 'Layanan Umum Fakultas Teknik UNIMA';
            $data['tanggal_layanan'] = now()->toDateString();
            
            // Simpan data survey layanan
            $surveyLayanan = SurveyLayanan::create($data);

            return response()->json([
                'success' => true,
                'message' => 'Survey layanan berhasil disimpan! Terima kasih atas feedback Anda.',
                'data' => $surveyLayanan
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat menyimpan survey',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function show($id)
    {
        $surveyLayanan = SurveyLayanan::findOrFail($id);
        return view('pages.survey-layanan-detail', compact('surveyLayanan'));
    }

    public function statistics()
    {
        $stats = [
            'total_responses' => SurveyLayanan::active()->count(),
            'by_kategori_responden' => SurveyLayanan::active()
                ->selectRaw('kategori_responden, COUNT(*) as total')
                ->groupBy('kategori_responden')
                ->get(),
            'by_jenis_layanan' => SurveyLayanan::active()
                ->selectRaw('jenis_layanan, COUNT(*) as total')
                ->groupBy('jenis_layanan')
                ->get(),
            'average_ratings' => [
                'kemudahan_akses' => SurveyLayanan::active()->avg('kemudahan_akses'),
                'kecepatan_pelayanan' => SurveyLayanan::active()->avg('kecepatan_pelayanan'),
                'keramahan_petugas' => SurveyLayanan::active()->avg('keramahan_petugas'),
                'kejelasan_informasi' => SurveyLayanan::active()->avg('kejelasan_informasi'),
                'kualitas_hasil' => SurveyLayanan::active()->avg('kualitas_hasil'),
                'kepuasan_keseluruhan' => SurveyLayanan::active()->avg('kepuasan_keseluruhan'),
            ],
            'overall_satisfaction' => SurveyLayanan::active()->avg('kepuasan_keseluruhan'),
            'recent_surveys' => SurveyLayanan::active()
                ->orderBy('created_at', 'desc')
                ->limit(5)
                ->get(),
        ];

        return response()->json($stats);
    }
}
