<?php

use Illuminate\Support\Facades\Route;
use App\Models\Kebijakan;
use App\Http\Controllers\AlumniController;

Route::get('/', function () {
    return view('home');
});

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
Route::get('/struktur', function () {
    return view('pages.struktur');
});
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
Route::get('/zona-integritas', function () {
    return view('pages.zona-integritas');
});
Route::get('/humas-kerjasama', function () {
    return view('pages.humas-kerjasama');
});
Route::view('/unit-penjaminan-mutu', 'pages.unit-penjaminan-mutu')->name('unit-penjaminan-mutu');

// Informasi
Route::get('/akreditasi', function () {
    return view('pages.akreditasi');
});
Route::get('/tracer-study', function () {
    return view('pages.tracer-study');
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
Route::get('/pengumuman', function () {
    return view('pages.pengumuman');
});
Route::get('/detail-berita', function () {
    return view('pages.detail-berita');
});

// Fallback untuk halaman utama jika diperlukan
Route::get('/home', function () {
    return view('home');
});
