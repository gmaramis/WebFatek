<?php

namespace App\Http\Controllers;

use App\Models\TracerStudy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class TracerStudyController extends Controller
{
    public function index()
    {
        return view('pages.tracer-study');
    }

    public function form()
    {
        return view('pages.tracer-study-form');
    }

    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'nama_lengkap' => 'required|string|max:255',
            'nim' => 'required|string|max:20|unique:tracer_studies,nim',
            'program_studi' => 'required|string|max:100',
            'tahun_lulus' => 'required|integer|min:2010|max:' . (date('Y') + 1),
            'email' => 'required|email|max:255',
            'telepon' => 'required|string|max:20',
            'ipk' => 'nullable|numeric|min:0|max:4',
            'alamat' => 'nullable|string|max:500',
            
            // Informasi Pekerjaan
            'status_pekerjaan' => 'required|in:bekerja,wirausaha,belum_bekerja,lanjut_studi',
            'waktu_tunggu_kerja' => 'nullable|integer|min:0|max:60',
            'nama_perusahaan' => 'nullable|string|max:255',
            'jabatan' => 'nullable|string|max:255',
            'gaji' => 'nullable|numeric|min:0|max:100',
            'kesesuaian_bidang' => 'nullable|in:sangat_sesuai,sesuai,kurang_sesuai,tidak_sesuai',
            'jenis_perusahaan' => 'nullable|string|max:255',
            'bidang_pekerjaan' => 'nullable|string|max:255',
            
            // Informasi Pencarian Kerja
            'sumber_informasi_lowongan' => 'nullable|string|max:255',
            'metode_mencari_kerja' => 'nullable|string|max:255',
            'lamanya_mencari_kerja' => 'nullable|integer|min:0|max:60',
            'jumlah_lamaran' => 'nullable|integer|min:0|max:1000',
            'jumlah_wawancara' => 'nullable|integer|min:0|max:100',
            
            // Informasi Tambahan
            'alasan_belum_bekerja' => 'nullable|string|max:500',
            'rencana_kedepan' => 'nullable|string|max:500',
            'kompetensi_yang_dibutuhkan' => 'nullable|string|max:500',
            'kompetensi_yang_dimiliki' => 'nullable|string|max:500',
            
            // Survey Kepuasan
            'kepuasan_kurikulum' => 'nullable|integer|min:1|max:5',
            'relevansi_ilmu' => 'nullable|integer|min:1|max:5',
            'saran_pengembangan' => 'nullable|string|max:1000',
            'saran_untuk_almamater' => 'nullable|string|max:1000',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            // Simpan data tracer study
            $tracerStudy = TracerStudy::create($request->all());

            // Kirim email notifikasi (opsional)
            // $this->sendNotificationEmail($tracerStudy);

            return response()->json([
                'success' => true,
                'message' => 'Data tracer study berhasil disimpan!',
                'data' => $tracerStudy
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat menyimpan data',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function show($id)
    {
        $tracerStudy = TracerStudy::findOrFail($id);
        return view('pages.tracer-study-detail', compact('tracerStudy'));
    }

    public function statistics()
    {
        $stats = [
            'total_responses' => TracerStudy::active()->count(),
            'by_program_studi' => TracerStudy::active()
                ->selectRaw('program_studi, COUNT(*) as total')
                ->groupBy('program_studi')
                ->get(),
            'by_status_pekerjaan' => TracerStudy::active()
                ->selectRaw('status_pekerjaan, COUNT(*) as total')
                ->groupBy('status_pekerjaan')
                ->get(),
            'average_gaji' => TracerStudy::active()
                ->whereNotNull('gaji')
                ->avg('gaji'),
            'average_waktu_tunggu' => TracerStudy::active()
                ->whereNotNull('waktu_tunggu_kerja')
                ->avg('waktu_tunggu_kerja'),
            'average_kepuasan' => TracerStudy::active()
                ->whereNotNull('kepuasan_kurikulum')
                ->avg('kepuasan_kurikulum'),
            'average_relevansi' => TracerStudy::active()
                ->whereNotNull('relevansi_ilmu')
                ->avg('relevansi_ilmu'),
        ];

        return response()->json($stats);
    }

    private function sendNotificationEmail($tracerStudy)
    {
        // Implementasi email notification jika diperlukan
        // Mail::to($tracerStudy->email)->send(new TracerStudySubmitted($tracerStudy));
    }
} 