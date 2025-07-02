<?php

use Illuminate\Support\Facades\Route;
use App\Models\Kebijakan;
use App\Http\Controllers\AlumniController;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

// API Routes
Route::get('/api/kebijakan/{id}', function ($id) {
    $kebijakan = Kebijakan::active()->find($id);
    
    if ($kebijakan) {
        return response()->json([
            'success' => true,
            'kebijakan' => $kebijakan
        ]);
    } else {
        return response()->json([
            'success' => false,
            'message' => 'Kebijakan tidak ditemukan'
        ], 404);
    }
});

// Profil
Route::get('/sejarah', function () {
    return view('pages.sejarah');
});
Route::get('/visi-misi', function () {
    return view('pages.visi-misi');
});
Route::get('/struktur', [App\Http\Controllers\StrukturPimpinanController::class, 'index']);
Route::get('/dosen', function () {
    return view('pages.dosen');
});
Route::get('/kebijakan', function () {
    return view('pages.kebijakan');
});

// Jurusan
Route::get('/jurusan', function () {
    return view('pages.jurusan');
});
Route::get('/teknik-informatika', function() {
    return view('pages.teknik-informatika');
});
Route::get('/teknik-sipil', function() {
    return view('pages.teknik-sipil');
});
Route::get('/arsitektur', function() {
    return view('pages.arsitektur');
});
Route::get('/teknik-mesin', function() {
    return view('pages.teknik-mesin');
});
Route::get('/teknik-elektro', function() {
    return view('pages.teknik-elektro');
});
Route::get('/pkk', function() {
    return view('pages.pkk');
});
Route::get('/ptik', function() {
    return view('pages.ptik');
});
Route::get('/teknik-bangunan', function() {
    return view('pages.teknik-bangunan');
});


// Akademik
Route::get('/magang-kkn', function () {
    return view('pages.magang-kkn');
});
Route::get('/pedoman-akademik', function () {
    return view('pages.pedoman-akademik');
});
Route::get('/kalender-akademik', function () {
    return view('pages.kalender-akademik');
});
Route::get('/si-unima', function () {
    return view('pages.si-unima');
});
Route::get('/lms-unima', function () {
    return view('pages.lms-unima');
});


// Kemahasiswaan
Route::get('/ormawa', function () {
    return view('pages.ormawa');
});
Route::get('/alumni', [AlumniController::class, 'index']);
Route::post('/alumni/daftar', [AlumniController::class, 'store'])->name('alumni.store');


// Unit
Route::get('/penjaminan-mutu', [App\Http\Controllers\UnitPenjaminanMutuController::class, 'index']);
Route::get('/p3ki', [App\Http\Controllers\JurnalController::class, 'index']);
Route::get('/p3rpm', [App\Http\Controllers\P3rpmController::class, 'index']);
Route::get('/zona-integritas', [App\Http\Controllers\ZonaIntegritasController::class, 'index']);
Route::get('/humas-kerjasama', [App\Http\Controllers\MitraKerjasamaController::class, 'index'])->name('humas-kerjasama');
Route::get('/test-filter', function() {
    $data = App\Models\MitraKerjasama::active()->ordered()->get();
    return view('test-filter', compact('data'));
});
Route::view('/unit-penjaminan-mutu', 'pages.unit-penjaminan-mutu')->name('unit-penjaminan-mutu');

// Informasi
Route::get('/akreditasi', function () {
    return view('pages.akreditasi');
});
Route::get('/survei-layanan', function () {
    return view('pages.survei-layanan');
});
Route::get('/laboratorium', function () {
    return view('pages.laboratorium');
});
Route::get('/layanan-akademik', function () {
    return view('pages.layanan-akademik');
});
Route::get('/kontak', function () {
    return view('pages.kontak');
});
Route::get('/tentang', function () {
    return view('pages.tentang');
});
Route::get('/pengumuman', [App\Http\Controllers\PengumumanController::class, 'index']);
Route::get('/pengumuman/{id}', [App\Http\Controllers\PengumumanController::class, 'show'])->name('pengumuman.detail');
Route::get('/berita', [App\Http\Controllers\BeritaController::class, 'index']);
Route::get('/berita/{slug}', [App\Http\Controllers\BeritaController::class, 'show']);
Route::get('/detail-berita', function () {
    return view('pages.detail-berita');
});

// Tracer Study Routes
Route::get('/tracer-study', [App\Http\Controllers\TracerStudyController::class, 'index'])->name('tracer-study');
Route::get('/tracer-study/form', [App\Http\Controllers\TracerStudyController::class, 'form'])->name('tracer-study.form');
Route::post('/tracer-study/store', [App\Http\Controllers\TracerStudyController::class, 'store'])->name('tracer-study.store');
Route::get('/tracer-study/statistics', [App\Http\Controllers\TracerStudyController::class, 'statistics'])->name('tracer-study.statistics');
Route::get('/tracer-study/{id}', [App\Http\Controllers\TracerStudyController::class, 'show'])->name('tracer-study.show');

// Survey Layanan Routes
Route::get('/survey-layanan', [App\Http\Controllers\SurveyLayananController::class, 'index'])->name('survey-layanan');
Route::get('/survey-layanan/form', [App\Http\Controllers\SurveyLayananController::class, 'form'])->name('survey-layanan.form');
Route::post('/survey-layanan/store', [App\Http\Controllers\SurveyLayananController::class, 'store'])->name('survey-layanan.store');
Route::get('/survey-layanan/statistics', [App\Http\Controllers\SurveyLayananController::class, 'statistics'])->name('survey-layanan.statistics');
Route::get('/survey-layanan/{id}', [App\Http\Controllers\SurveyLayananController::class, 'show'])->name('survey-layanan.show');

// Dokumen Download Routes
Route::get('/download', [App\Http\Controllers\DokumenDownloadController::class, 'index'])->name('download');
Route::get('/download/{id}', [App\Http\Controllers\DokumenDownloadController::class, 'download'])->name('download.file');

// Fallback untuk halaman utama jika diperlukan
Route::get('/home', function () {
    return view('home');
});
