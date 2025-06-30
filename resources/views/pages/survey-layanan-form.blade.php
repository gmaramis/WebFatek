@extends('master')

@section('title', 'Form Survey Layanan - Fakultas Teknik UNIMA')

@section('content')
<!-- Hero Section -->
<section class="bg-gradient-to-r from-blue-600 to-blue-800 text-white py-16">
    <div class="container mx-auto px-4">
        <div class="text-center">
            <h1 class="text-4xl font-bold mb-4">Form Survey Kepuasan Layanan</h1>
            <p class="text-xl">
                Bantu kami meningkatkan kualitas layanan dengan memberikan feedback Anda
            </p>
        </div>
    </div>
</section>

<!-- Form Section -->
<section class="py-16">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <!-- Progress Bar -->
            <div class="mb-8">
                <div class="flex items-center justify-between mb-2">
                    <span class="text-sm font-medium text-gray-700">Progress Survey</span>
                    <span class="text-sm font-medium text-gray-700" id="progress-percentage">0%</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2">
                    <div class="bg-blue-600 h-2 rounded-full transition-all duration-300" id="progress-bar" style="width: 0%"></div>
                </div>
            </div>

            <form id="survey-form" class="bg-white rounded-lg shadow-lg p-8">
                @csrf
                
                <!-- Informasi Responden -->
                <div class="mb-8">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6 border-b pb-2">
                        <i class="fas fa-user mr-2 text-blue-600"></i>Informasi Responden
                    </h2>
                    
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label for="nama_lengkap" class="block text-sm font-medium text-gray-700 mb-2">
                                Nama Lengkap <span class="text-red-500">*</span>
                            </label>
                            <input type="text" id="nama_lengkap" name="nama_lengkap" required
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                                Email <span class="text-red-500">*</span>
                            </label>
                            <input type="email" id="email" name="email" required
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        
                        <div>
                            <label for="telepon" class="block text-sm font-medium text-gray-700 mb-2">
                                Nomor Telepon <span class="text-red-500">*</span>
                            </label>
                            <input type="tel" id="telepon" name="telepon" required
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        
                        <div>
                            <label for="kategori_responden" class="block text-sm font-medium text-gray-700 mb-2">
                                Kategori Responden <span class="text-red-500">*</span>
                            </label>
                            <select id="kategori_responden" name="kategori_responden" required
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="">Pilih Kategori</option>
                                <option value="mahasiswa">Mahasiswa</option>
                                <option value="dosen">Dosen</option>
                                <option value="tenaga_kependidikan">Tenaga Kependidikan</option>
                                <option value="alumni">Alumni</option>
                                <option value="pemangku_kepentingan">Pemangku Kepentingan</option>
                            </select>
                        </div>
                        
                        <div id="program_studi_field" class="hidden">
                            <label for="program_studi" class="block text-sm font-medium text-gray-700 mb-2">
                                Program Studi
                            </label>
                            <select id="program_studi" name="program_studi"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="">Pilih Program Studi</option>
                                <option value="teknik-informatika">Teknik Informatika</option>
                                <option value="teknik-sipil">Teknik Sipil</option>
                                <option value="teknik-elektro">Teknik Elektro</option>
                                <option value="teknik-mesin">Teknik Mesin</option>
                                <option value="arsitektur">Arsitektur</option>
                                <option value="teknik-bangunan">Teknik Bangunan</option>
                            </select>
                        </div>
                        
                        <div id="unit_kerja_field" class="hidden">
                            <label for="unit_kerja" class="block text-sm font-medium text-gray-700 mb-2">
                                Unit Kerja
                            </label>
                            <input type="text" id="unit_kerja" name="unit_kerja"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                   placeholder="Contoh: Bagian Akademik, Bagian Kemahasiswaan">
                        </div>
                    </div>
                </div>

                <!-- Penilaian Layanan -->
                <div class="mb-8">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6 border-b pb-2">
                        <i class="fas fa-star mr-2 text-blue-600"></i>Penilaian Layanan
                    </h2>
                    <p class="text-gray-600 mb-6">
                        Berikan penilaian Anda terhadap layanan Fakultas Teknik UNIMA secara umum (1 = Sangat Tidak Puas, 5 = Sangat Puas)
                    </p>
                    
                    <div class="space-y-6">
                        <!-- Kemudahan Akses -->
                        <div class="bg-gray-50 p-6 rounded-lg">
                            <label class="block text-sm font-medium text-gray-700 mb-3">
                                Kemudahan Akses Layanan <span class="text-red-500">*</span>
                            </label>
                            <div class="flex items-center space-x-4">
                                <span class="text-sm text-gray-500">Sangat Tidak Puas</span>
                                <div class="flex space-x-2">
                                    <input type="radio" name="kemudahan_akses" value="1" required class="text-blue-600">
                                    <input type="radio" name="kemudahan_akses" value="2" required class="text-blue-600">
                                    <input type="radio" name="kemudahan_akses" value="3" required class="text-blue-600">
                                    <input type="radio" name="kemudahan_akses" value="4" required class="text-blue-600">
                                    <input type="radio" name="kemudahan_akses" value="5" required class="text-blue-600">
                                </div>
                                <span class="text-sm text-gray-500">Sangat Puas</span>
                            </div>
                        </div>

                        <!-- Kecepatan Pelayanan -->
                        <div class="bg-gray-50 p-6 rounded-lg">
                            <label class="block text-sm font-medium text-gray-700 mb-3">
                                Kecepatan Pelayanan <span class="text-red-500">*</span>
                            </label>
                            <div class="flex items-center space-x-4">
                                <span class="text-sm text-gray-500">Sangat Tidak Puas</span>
                                <div class="flex space-x-2">
                                    <input type="radio" name="kecepatan_pelayanan" value="1" required class="text-blue-600">
                                    <input type="radio" name="kecepatan_pelayanan" value="2" required class="text-blue-600">
                                    <input type="radio" name="kecepatan_pelayanan" value="3" required class="text-blue-600">
                                    <input type="radio" name="kecepatan_pelayanan" value="4" required class="text-blue-600">
                                    <input type="radio" name="kecepatan_pelayanan" value="5" required class="text-blue-600">
                                </div>
                                <span class="text-sm text-gray-500">Sangat Puas</span>
                            </div>
                        </div>

                        <!-- Keramahan Petugas -->
                        <div class="bg-gray-50 p-6 rounded-lg">
                            <label class="block text-sm font-medium text-gray-700 mb-3">
                                Keramahan Petugas <span class="text-red-500">*</span>
                            </label>
                            <div class="flex items-center space-x-4">
                                <span class="text-sm text-gray-500">Sangat Tidak Puas</span>
                                <div class="flex space-x-2">
                                    <input type="radio" name="keramahan_petugas" value="1" required class="text-blue-600">
                                    <input type="radio" name="keramahan_petugas" value="2" required class="text-blue-600">
                                    <input type="radio" name="keramahan_petugas" value="3" required class="text-blue-600">
                                    <input type="radio" name="keramahan_petugas" value="4" required class="text-blue-600">
                                    <input type="radio" name="keramahan_petugas" value="5" required class="text-blue-600">
                                </div>
                                <span class="text-sm text-gray-500">Sangat Puas</span>
                            </div>
                        </div>

                        <!-- Kejelasan Informasi -->
                        <div class="bg-gray-50 p-6 rounded-lg">
                            <label class="block text-sm font-medium text-gray-700 mb-3">
                                Kejelasan Informasi <span class="text-red-500">*</span>
                            </label>
                            <div class="flex items-center space-x-4">
                                <span class="text-sm text-gray-500">Sangat Tidak Puas</span>
                                <div class="flex space-x-2">
                                    <input type="radio" name="kejelasan_informasi" value="1" required class="text-blue-600">
                                    <input type="radio" name="kejelasan_informasi" value="2" required class="text-blue-600">
                                    <input type="radio" name="kejelasan_informasi" value="3" required class="text-blue-600">
                                    <input type="radio" name="kejelasan_informasi" value="4" required class="text-blue-600">
                                    <input type="radio" name="kejelasan_informasi" value="5" required class="text-blue-600">
                                </div>
                                <span class="text-sm text-gray-500">Sangat Puas</span>
                            </div>
                        </div>

                        <!-- Kualitas Hasil -->
                        <div class="bg-gray-50 p-6 rounded-lg">
                            <label class="block text-sm font-medium text-gray-700 mb-3">
                                Kualitas Hasil <span class="text-red-500">*</span>
                            </label>
                            <div class="flex items-center space-x-4">
                                <span class="text-sm text-gray-500">Sangat Tidak Puas</span>
                                <div class="flex space-x-2">
                                    <input type="radio" name="kualitas_hasil" value="1" required class="text-blue-600">
                                    <input type="radio" name="kualitas_hasil" value="2" required class="text-blue-600">
                                    <input type="radio" name="kualitas_hasil" value="3" required class="text-blue-600">
                                    <input type="radio" name="kualitas_hasil" value="4" required class="text-blue-600">
                                    <input type="radio" name="kualitas_hasil" value="5" required class="text-blue-600">
                                </div>
                                <span class="text-sm text-gray-500">Sangat Puas</span>
                            </div>
                        </div>

                        <!-- Kepuasan Keseluruhan -->
                        <div class="bg-gray-50 p-6 rounded-lg">
                            <label class="block text-sm font-medium text-gray-700 mb-3">
                                Kepuasan Keseluruhan <span class="text-red-500">*</span>
                            </label>
                            <div class="flex items-center space-x-4">
                                <span class="text-sm text-gray-500">Sangat Tidak Puas</span>
                                <div class="flex space-x-2">
                                    <input type="radio" name="kepuasan_keseluruhan" value="1" required class="text-blue-600">
                                    <input type="radio" name="kepuasan_keseluruhan" value="2" required class="text-blue-600">
                                    <input type="radio" name="kepuasan_keseluruhan" value="3" required class="text-blue-600">
                                    <input type="radio" name="kepuasan_keseluruhan" value="4" required class="text-blue-600">
                                    <input type="radio" name="kepuasan_keseluruhan" value="5" required class="text-blue-600">
                                </div>
                                <span class="text-sm text-gray-500">Sangat Puas</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Feedback -->
                <div class="mb-8">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6 border-b pb-2">
                        <i class="fas fa-comments mr-2 text-blue-600"></i>Feedback & Saran
                    </h2>
                    
                    <div class="space-y-6">
                        <div>
                            <label for="komentar_positif" class="block text-sm font-medium text-gray-700 mb-2">
                                Komentar Positif
                            </label>
                            <textarea id="komentar_positif" name="komentar_positif" rows="3"
                                      class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                      placeholder="Apa yang Anda sukai dari layanan Fakultas Teknik UNIMA?"></textarea>
                        </div>
                        
                        <div>
                            <label for="komentar_negatif" class="block text-sm font-medium text-gray-700 mb-2">
                                Komentar Negatif
                            </label>
                            <textarea id="komentar_negatif" name="komentar_negatif" rows="3"
                                      class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                      placeholder="Apa yang perlu diperbaiki dari layanan Fakultas Teknik UNIMA?"></textarea>
                        </div>
                        
                        <div>
                            <label for="saran_perbaikan" class="block text-sm font-medium text-gray-700 mb-2">
                                Saran Perbaikan
                            </label>
                            <textarea id="saran_perbaikan" name="saran_perbaikan" rows="3"
                                      class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                      placeholder="Bagaimana layanan Fakultas Teknik UNIMA bisa ditingkatkan?"></textarea>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit" 
                            class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-8 rounded-lg transition duration-300">
                        <i class="fas fa-paper-plane mr-2"></i>Kirim Survey
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- Loading Modal -->
<div id="loading-modal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-white p-6 rounded-lg text-center">
        <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-blue-600 mx-auto mb-4"></div>
        <p class="text-gray-700">Menyimpan survey...</p>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('survey-form');
    const progressBar = document.getElementById('progress-bar');
    const progressPercentage = document.getElementById('progress-percentage');
    const loadingModal = document.getElementById('loading-modal');
    
    // Handle kategori responden change
    document.getElementById('kategori_responden').addEventListener('change', function() {
        const kategori = this.value;
        const programStudiField = document.getElementById('program_studi_field');
        const unitKerjaField = document.getElementById('unit_kerja_field');
        
        // Hide all conditional fields
        programStudiField.classList.add('hidden');
        unitKerjaField.classList.add('hidden');
        
        // Show relevant field based on selection
        if (kategori === 'mahasiswa' || kategori === 'alumni') {
            programStudiField.classList.remove('hidden');
        } else if (kategori === 'dosen' || kategori === 'tenaga_kependidikan') {
            unitKerjaField.classList.remove('hidden');
        }
        
        updateProgress();
    });
    
    // Update progress bar
    function updateProgress() {
        const formData = new FormData(form);
        let filledFields = 0;
        let totalFields = 0;
        
        // Count required fields
        const requiredFields = form.querySelectorAll('[required]');
        totalFields = requiredFields.length;
        
        requiredFields.forEach(field => {
            if (field.type === 'radio') {
                const name = field.name;
                const radioGroup = form.querySelectorAll(`input[name="${name}"]`);
                const isChecked = Array.from(radioGroup).some(radio => radio.checked);
                if (isChecked) filledFields++;
            } else {
                if (field.value.trim() !== '') filledFields++;
            }
        });
        
        const percentage = Math.round((filledFields / totalFields) * 100);
        progressBar.style.width = percentage + '%';
        progressPercentage.textContent = percentage + '%';
    }
    
    // Add event listeners for progress tracking
    form.addEventListener('input', updateProgress);
    form.addEventListener('change', updateProgress);
    
    // Handle form submission
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        console.log('Form submitted');
        
        // Show loading modal
        loadingModal.classList.remove('hidden');
        loadingModal.classList.add('flex');
        
        // Get CSRF token from meta tag or hidden input
        let csrfToken = '';
        const metaToken = document.querySelector('meta[name="csrf-token"]');
        const hiddenToken = document.querySelector('input[name="_token"]');
        
        if (metaToken) {
            csrfToken = metaToken.getAttribute('content');
        } else if (hiddenToken) {
            csrfToken = hiddenToken.value;
        }
        
        console.log('CSRF Token:', csrfToken);
        
        // Create FormData
        const formData = new FormData(form);
        
        // Log form data for debugging
        for (let [key, value] of formData.entries()) {
            console.log(key + ': ' + value);
        }
        
        // Submit form via AJAX
        fetch('/survey-layanan/store', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json'
            }
        })
        .then(response => {
            console.log('Response status:', response.status);
            console.log('Response headers:', response.headers);
            
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            
            return response.json();
        })
        .then(data => {
            console.log('Response data:', data);
            loadingModal.classList.add('hidden');
            loadingModal.classList.remove('flex');
            
            if (data.success) {
                // Show success message
                if (typeof Swal !== 'undefined') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: data.message,
                        confirmButtonText: 'OK'
                    }).then(() => {
                        // Redirect to survey page
                        window.location.href = '/survey-layanan';
                    });
                } else {
                    alert('Survey berhasil disimpan! Terima kasih atas feedback Anda.');
                    window.location.href = '/survey-layanan';
                }
            } else {
                // Show error message
                if (typeof Swal !== 'undefined') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal!',
                        text: data.message || 'Terjadi kesalahan saat menyimpan survey',
                        confirmButtonText: 'OK'
                    });
                } else {
                    alert('Gagal menyimpan survey: ' + (data.message || 'Terjadi kesalahan'));
                }
            }
        })
        .catch(error => {
            console.error('Error:', error);
            loadingModal.classList.add('hidden');
            loadingModal.classList.remove('flex');
            
            let errorMessage = 'Silakan coba lagi nanti.';
            
            if (error.message.includes('419')) {
                errorMessage = 'Sesi telah berakhir. Silakan refresh halaman dan coba lagi.';
            } else if (error.message.includes('422')) {
                errorMessage = 'Data yang dimasukkan tidak valid. Silakan periksa kembali.';
            } else if (error.message.includes('500')) {
                errorMessage = 'Terjadi kesalahan server. Silakan coba lagi nanti.';
            }
            
            if (typeof Swal !== 'undefined') {
                Swal.fire({
                    icon: 'error',
                    title: 'Terjadi Kesalahan!',
                    text: errorMessage,
                    confirmButtonText: 'OK'
                });
            } else {
                alert('Terjadi kesalahan: ' + errorMessage);
            }
        });
    });
    
    // Initialize progress
    updateProgress();
});
</script>
@endpush 