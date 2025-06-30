@extends('master')

@section('title', 'Form Tracer Study - Fakultas Teknik UNIMA')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 to-purple-50 py-8">
    <div class="container mx-auto px-4">
        <!-- Header -->
        <div class="text-center mb-8">
            <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">Form Tracer Study</h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Bantu kami meningkatkan kualitas pendidikan Fakultas Teknik UNIMA dengan mengisi survey tracer study ini.
            </p>
            <div class="mt-4 flex justify-center space-x-4">
                <div class="bg-blue-100 text-blue-800 px-4 py-2 rounded-full text-sm font-medium">
                    ⏱️ Waktu: 10-15 menit
                </div>
                <div class="bg-green-100 text-green-800 px-4 py-2 rounded-full text-sm font-medium">
                    🔒 Data Terjamin Aman
                </div>
            </div>
        </div>

        <!-- Progress Bar -->
        <div class="max-w-4xl mx-auto mb-8">
            <div class="bg-white rounded-lg shadow-sm p-4">
                <div class="flex justify-between items-center mb-2">
                    <span class="text-sm font-medium text-gray-700">Progress Survey</span>
                    <span class="text-sm font-medium text-blue-600" id="progressText">0%</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2">
                    <div class="bg-blue-600 h-2 rounded-full transition-all duration-300" id="progressBar" style="width: 0%"></div>
                </div>
            </div>
        </div>

        <!-- Form Container -->
        <div class="max-w-4xl mx-auto">
            <form id="tracerStudyForm" class="space-y-8">
                @csrf
                
                <!-- Section 1: Informasi Pribadi -->
                <div class="bg-white rounded-2xl shadow-lg p-8" data-section="1">
                    <div class="flex items-center mb-6">
                        <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center mr-4">
                            <span class="text-blue-600 font-bold">1</span>
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold text-gray-800">Informasi Pribadi</h2>
                            <p class="text-gray-600">Data pribadi dan akademik Anda</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Nama Lengkap <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="nama_lengkap" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                                placeholder="Masukkan nama lengkap">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                NIM <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="nim" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                                placeholder="Contoh: 2021001">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Program Studi <span class="text-red-500">*</span>
                            </label>
                            <select name="program_studi" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                                <option value="">Pilih Program Studi</option>
                                <option value="teknik-informatika">Teknik Informatika</option>
                                <option value="teknik-sipil">Teknik Sipil</option>
                                <option value="teknik-elektro">Teknik Elektro</option>
                                <option value="teknik-mesin">Teknik Mesin</option>
                                <option value="arsitektur">Arsitektur</option>
                                <option value="teknik-bangunan">Teknik Bangunan</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Tahun Lulus <span class="text-red-500">*</span>
                            </label>
                            <select name="tahun_lulus" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                                <option value="">Pilih Tahun Lulus</option>
                                @for($year = date('Y'); $year >= 2010; $year--)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                @endfor
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Email <span class="text-red-500">*</span>
                            </label>
                            <input type="email" name="email" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                                placeholder="email@example.com">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Nomor Telepon <span class="text-red-500">*</span>
                            </label>
                            <input type="tel" name="telepon" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                                placeholder="081234567890">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                IPK (Opsional)
                            </label>
                            <input type="number" name="ipk" step="0.01" min="0" max="4"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                                placeholder="Contoh: 3.50">
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Alamat (Opsional)
                            </label>
                            <textarea name="alamat" rows="3"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                                placeholder="Alamat lengkap Anda"></textarea>
                        </div>
                    </div>
                </div>

                <!-- Section 2: Informasi Pekerjaan -->
                <div class="bg-white rounded-2xl shadow-lg p-8" data-section="2">
                    <div class="flex items-center mb-6">
                        <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center mr-4">
                            <span class="text-green-600 font-bold">2</span>
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold text-gray-800">Informasi Pekerjaan</h2>
                            <p class="text-gray-600">Status pekerjaan dan informasi karir Anda</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Status Pekerjaan <span class="text-red-500">*</span>
                            </label>
                            <select name="status_pekerjaan" required id="statusPekerjaan"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                                <option value="">Pilih Status</option>
                                <option value="bekerja">Bekerja</option>
                                <option value="wirausaha">Wirausaha</option>
                                <option value="belum_bekerja">Belum Bekerja</option>
                                <option value="lanjut_studi">Lanjut Studi</option>
                            </select>
                        </div>

                        <div id="waktuTungguField" style="display: none;">
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Waktu Tunggu Kerja (Bulan)
                            </label>
                            <input type="number" name="waktu_tunggu_kerja" min="0" max="60"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                                placeholder="Contoh: 6">
                        </div>

                        <div id="perusahaanFields" style="display: none;">
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Nama Perusahaan/Instansi
                            </label>
                            <input type="text" name="nama_perusahaan"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                                placeholder="Nama perusahaan">
                        </div>

                        <div id="jabatanField" style="display: none;">
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Jabatan
                            </label>
                            <input type="text" name="jabatan"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                                placeholder="Jabatan saat ini">
                        </div>

                        <div id="gajiField" style="display: none;">
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Gaji (Juta Rupiah)
                            </label>
                            <input type="number" name="gaji" step="0.1" min="0" max="100"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                                placeholder="Contoh: 3.5">
                        </div>

                        <div id="kesesuaianField" style="display: none;">
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Kesesuaian Bidang
                            </label>
                            <select name="kesesuaian_bidang"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                                <option value="">Pilih Kesesuaian</option>
                                <option value="sangat_sesuai">Sangat Sesuai</option>
                                <option value="sesuai">Sesuai</option>
                                <option value="kurang_sesuai">Kurang Sesuai</option>
                                <option value="tidak_sesuai">Tidak Sesuai</option>
                            </select>
                        </div>

                        <div id="jenisPerusahaanField" style="display: none;">
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Jenis Perusahaan
                            </label>
                            <select name="jenis_perusahaan"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                                <option value="">Pilih Jenis</option>
                                <option value="BUMN">BUMN</option>
                                <option value="Swasta Nasional">Swasta Nasional</option>
                                <option value="Swasta Asing">Swasta Asing</option>
                                <option value="Pemerintah">Pemerintah</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                        </div>

                        <div id="bidangPekerjaanField" style="display: none;">
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Bidang Pekerjaan
                            </label>
                            <input type="text" name="bidang_pekerjaan"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                                placeholder="Contoh: IT, Konstruksi, dll">
                        </div>
                    </div>

                    <!-- Fields untuk yang belum bekerja -->
                    <div id="belumBekerjaFields" style="display: none;" class="mt-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Informasi Pencarian Kerja</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Sumber Informasi Lowongan
                                </label>
                                <select name="sumber_informasi_lowongan"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                                    <option value="">Pilih Sumber</option>
                                    <option value="Internet">Internet</option>
                                    <option value="Koran">Koran</option>
                                    <option value="Teman">Teman</option>
                                    <option value="Keluarga">Keluarga</option>
                                    <option value="Alumni">Alumni</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Metode Mencari Kerja
                                </label>
                                <select name="metode_mencari_kerja"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                                    <option value="">Pilih Metode</option>
                                    <option value="Melamar Langsung">Melamar Langsung</option>
                                    <option value="Melalui Internet">Melalui Internet</option>
                                    <option value="Melalui Teman">Melalui Teman</option>
                                    <option value="Melalui Keluarga">Melalui Keluarga</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Lamanya Mencari Kerja (Bulan)
                                </label>
                                <input type="number" name="lamanya_mencari_kerja" min="0" max="60"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                                    placeholder="Contoh: 3">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Jumlah Lamaran
                                </label>
                                <input type="number" name="jumlah_lamaran" min="0" max="1000"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                                    placeholder="Contoh: 10">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Jumlah Wawancara
                                </label>
                                <input type="number" name="jumlah_wawancara" min="0" max="100"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                                    placeholder="Contoh: 3">
                            </div>

                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Alasan Belum Bekerja
                                </label>
                                <textarea name="alasan_belum_bekerja" rows="3"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                                    placeholder="Jelaskan alasan Anda belum bekerja..."></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Section 3: Survey Kepuasan -->
                <div class="bg-white rounded-2xl shadow-lg p-8" data-section="3">
                    <div class="flex items-center mb-6">
                        <div class="w-10 h-10 bg-purple-100 rounded-full flex items-center justify-center mr-4">
                            <span class="text-purple-600 font-bold">3</span>
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold text-gray-800">Survey Kepuasan</h2>
                            <p class="text-gray-600">Evaluasi terhadap pendidikan yang telah diterima</p>
                        </div>
                    </div>

                    <div class="space-y-8">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-4">
                                Seberapa puas Anda dengan kurikulum yang diberikan?
                            </label>
                            <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
                                <label class="flex flex-col items-center p-4 border-2 border-gray-200 rounded-lg hover:border-blue-500 cursor-pointer transition-all">
                                    <input type="radio" name="kepuasan_kurikulum" value="1" class="sr-only">
                                    <div class="text-2xl mb-2">😞</div>
                                    <span class="text-sm text-center">Sangat Tidak Puas</span>
                                </label>
                                <label class="flex flex-col items-center p-4 border-2 border-gray-200 rounded-lg hover:border-blue-500 cursor-pointer transition-all">
                                    <input type="radio" name="kepuasan_kurikulum" value="2" class="sr-only">
                                    <div class="text-2xl mb-2">😐</div>
                                    <span class="text-sm text-center">Tidak Puas</span>
                                </label>
                                <label class="flex flex-col items-center p-4 border-2 border-gray-200 rounded-lg hover:border-blue-500 cursor-pointer transition-all">
                                    <input type="radio" name="kepuasan_kurikulum" value="3" class="sr-only">
                                    <div class="text-2xl mb-2">😊</div>
                                    <span class="text-sm text-center">Cukup</span>
                                </label>
                                <label class="flex flex-col items-center p-4 border-2 border-gray-200 rounded-lg hover:border-blue-500 cursor-pointer transition-all">
                                    <input type="radio" name="kepuasan_kurikulum" value="4" class="sr-only">
                                    <div class="text-2xl mb-2">😄</div>
                                    <span class="text-sm text-center">Puas</span>
                                </label>
                                <label class="flex flex-col items-center p-4 border-2 border-gray-200 rounded-lg hover:border-blue-500 cursor-pointer transition-all">
                                    <input type="radio" name="kepuasan_kurikulum" value="5" class="sr-only">
                                    <div class="text-2xl mb-2">🤩</div>
                                    <span class="text-sm text-center">Sangat Puas</span>
                                </label>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-4">
                                Seberapa relevan ilmu yang didapat dengan dunia kerja?
                            </label>
                            <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
                                <label class="flex flex-col items-center p-4 border-2 border-gray-200 rounded-lg hover:border-blue-500 cursor-pointer transition-all">
                                    <input type="radio" name="relevansi_ilmu" value="1" class="sr-only">
                                    <div class="text-2xl mb-2">❌</div>
                                    <span class="text-sm text-center">Tidak Relevan</span>
                                </label>
                                <label class="flex flex-col items-center p-4 border-2 border-gray-200 rounded-lg hover:border-blue-500 cursor-pointer transition-all">
                                    <input type="radio" name="relevansi_ilmu" value="2" class="sr-only">
                                    <div class="text-2xl mb-2">⚠️</div>
                                    <span class="text-sm text-center">Kurang Relevan</span>
                                </label>
                                <label class="flex flex-col items-center p-4 border-2 border-gray-200 rounded-lg hover:border-blue-500 cursor-pointer transition-all">
                                    <input type="radio" name="relevansi_ilmu" value="3" class="sr-only">
                                    <div class="text-2xl mb-2">✅</div>
                                    <span class="text-sm text-center">Cukup</span>
                                </label>
                                <label class="flex flex-col items-center p-4 border-2 border-gray-200 rounded-lg hover:border-blue-500 cursor-pointer transition-all">
                                    <input type="radio" name="relevansi_ilmu" value="4" class="sr-only">
                                    <div class="text-2xl mb-2">👍</div>
                                    <span class="text-sm text-center">Relevan</span>
                                </label>
                                <label class="flex flex-col items-center p-4 border-2 border-gray-200 rounded-lg hover:border-blue-500 cursor-pointer transition-all">
                                    <input type="radio" name="relevansi_ilmu" value="5" class="sr-only">
                                    <div class="text-2xl mb-2">🎯</div>
                                    <span class="text-sm text-center">Sangat Relevan</span>
                                </label>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Kompetensi yang Dibutuhkan di Dunia Kerja
                            </label>
                            <textarea name="kompetensi_yang_dibutuhkan" rows="3"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                                placeholder="Jelaskan kompetensi apa saja yang dibutuhkan di dunia kerja..."></textarea>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Kompetensi yang Anda Miliki
                            </label>
                            <textarea name="kompetensi_yang_dimiliki" rows="3"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                                placeholder="Jelaskan kompetensi apa saja yang Anda miliki..."></textarea>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Rencana Kedepan
                            </label>
                            <textarea name="rencana_kedepan" rows="3"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                                placeholder="Apa rencana Anda kedepan?"></textarea>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Saran untuk Pengembangan Fakultas Teknik
                            </label>
                            <textarea name="saran_pengembangan" rows="4"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                                placeholder="Berikan saran untuk pengembangan fakultas..."></textarea>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Saran untuk Almamater
                            </label>
                            <textarea name="saran_untuk_almamater" rows="4"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                                placeholder="Berikan saran untuk almamater..."></textarea>
                        </div>
                    </div>
                </div>

                <!-- Submit Section -->
                <div class="bg-white rounded-2xl shadow-lg p-8">
                    <div class="text-center">
                        <h2 class="text-2xl font-bold text-gray-800 mb-4">Siap Mengirim Survey?</h2>
                        <p class="text-gray-600 mb-6">
                            Pastikan semua data yang Anda masukkan sudah benar. Data ini akan sangat berharga untuk pengembangan Fakultas Teknik UNIMA.
                        </p>
                        
                        <button type="submit" id="submitBtn"
                            class="bg-gradient-to-r from-blue-600 to-purple-600 text-white px-8 py-4 rounded-lg font-semibold hover:from-blue-700 hover:to-purple-700 transition-all duration-300 transform hover:scale-105 shadow-lg">
                            <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                            </svg>
                            Kirim Survey Tracer Study
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('tracerStudyForm');
    const progressBar = document.getElementById('progressBar');
    const progressText = document.getElementById('progressText');
    const submitBtn = document.getElementById('submitBtn');
    
    // Progress tracking
    function updateProgress() {
        const sections = document.querySelectorAll('[data-section]');
        const totalFields = Array.from(sections).reduce((total, section) => {
            return total + section.querySelectorAll('input, select, textarea').length;
        }, 0);
        
        const filledFields = Array.from(sections).reduce((total, section) => {
            return total + Array.from(section.querySelectorAll('input, select, textarea')).filter(field => {
                if (field.type === 'radio') {
                    return field.checked;
                }
                return field.value.trim() !== '';
            }).length;
        }, 0);
        
        const progress = Math.round((filledFields / totalFields) * 100);
        progressBar.style.width = progress + '%';
        progressText.textContent = progress + '%';
    }
    
    // Event listeners for progress
    form.addEventListener('input', updateProgress);
    form.addEventListener('change', updateProgress);
    
    // Status pekerjaan logic
    const statusPekerjaan = document.getElementById('statusPekerjaan');
    const waktuTungguField = document.getElementById('waktuTungguField');
    const perusahaanFields = document.getElementById('perusahaanFields');
    const jabatanField = document.getElementById('jabatanField');
    const gajiField = document.getElementById('gajiField');
    const kesesuaianField = document.getElementById('kesesuaianField');
    const jenisPerusahaanField = document.getElementById('jenisPerusahaanField');
    const bidangPekerjaanField = document.getElementById('bidangPekerjaanField');
    const belumBekerjaFields = document.getElementById('belumBekerjaFields');
    
    function toggleFields() {
        const status = statusPekerjaan.value;
        
        // Reset all fields
        [waktuTungguField, perusahaanFields, jabatanField, gajiField, kesesuaianField, 
         jenisPerusahaanField, bidangPekerjaanField, belumBekerjaFields].forEach(field => {
            field.style.display = 'none';
        });
        
        // Show relevant fields based on status
        if (status === 'bekerja') {
            [waktuTungguField, perusahaanFields, jabatanField, gajiField, kesesuaianField, 
             jenisPerusahaanField, bidangPekerjaanField].forEach(field => {
                field.style.display = 'block';
            });
        } else if (status === 'wirausaha') {
            [gajiField, bidangPekerjaanField].forEach(field => {
                field.style.display = 'block';
            });
        } else if (status === 'belum_bekerja') {
            belumBekerjaFields.style.display = 'block';
        }
        
        updateProgress();
    }
    
    statusPekerjaan.addEventListener('change', toggleFields);
    
    // Radio button styling
    document.querySelectorAll('input[type="radio"]').forEach(radio => {
        radio.addEventListener('change', function() {
            // Remove active class from all labels in the same group
            const name = this.name;
            document.querySelectorAll(`input[name="${name}"]`).forEach(r => {
                r.closest('label').classList.remove('border-blue-500', 'bg-blue-50');
                r.closest('label').classList.add('border-gray-200');
            });
            
            // Add active class to selected label
            this.closest('label').classList.remove('border-gray-200');
            this.closest('label').classList.add('border-blue-500', 'bg-blue-50');
        });
    });
    
    // Form submission
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        const originalText = submitBtn.innerHTML;
        
        // Show loading state
        submitBtn.innerHTML = `
            <svg class="w-5 h-5 inline mr-2 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
            </svg>
            Mengirim...
        `;
        submitBtn.disabled = true;
        
        // Collect form data
        const formData = new FormData(form);
        
        // Send to backend
        fetch('/tracer-study/store', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Show success message
                submitBtn.innerHTML = `
                    <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Terima Kasih!
                `;
                submitBtn.classList.remove('from-blue-600', 'to-purple-600', 'hover:from-blue-700', 'hover:to-purple-700');
                submitBtn.classList.add('from-green-600', 'to-green-700');
                
                // Show success alert
                showAlert('success', 'Data tracer study berhasil disimpan! Terima kasih atas partisipasi Anda.');
                
                // Reset form after 3 seconds
                setTimeout(() => {
                    form.reset();
                    submitBtn.innerHTML = originalText;
                    submitBtn.classList.remove('from-green-600', 'to-green-700');
                    submitBtn.classList.add('from-blue-600', 'to-purple-600', 'hover:from-blue-700', 'hover:to-purple-700');
                    submitBtn.disabled = false;
                    updateProgress();
                    toggleFields();
                    
                    // Reset radio button styling
                    document.querySelectorAll('input[type="radio"]').forEach(radio => {
                        radio.closest('label').classList.remove('border-blue-500', 'bg-blue-50');
                        radio.closest('label').classList.add('border-gray-200');
                    });
                }, 3000);
            } else {
                throw new Error(data.message || 'Terjadi kesalahan');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            submitBtn.innerHTML = originalText;
            submitBtn.disabled = false;
            showAlert('error', error.message || 'Terjadi kesalahan saat mengirim data');
        });
    });
    
    // Alert function
    function showAlert(type, message) {
        const alertDiv = document.createElement('div');
        alertDiv.className = `fixed top-4 right-4 p-4 rounded-lg shadow-lg z-50 ${
            type === 'success' ? 'bg-green-500 text-white' : 'bg-red-500 text-white'
        }`;
        alertDiv.innerHTML = `
            <div class="flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="${
                        type === 'success' 
                            ? 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z'
                            : 'M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z'
                    }"></path>
                </svg>
                ${message}
            </div>
        `;
        
        document.body.appendChild(alertDiv);
        
        setTimeout(() => {
            alertDiv.remove();
        }, 5000);
    }
    
    // Initialize
    updateProgress();
});
</script>
@endsection 