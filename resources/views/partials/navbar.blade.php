<!-- Top Bar Info -->
<div class="w-full bg-secondary-800 text-white text-xs md:text-sm py-2 flex items-center">
  <div class="container mx-auto flex justify-between items-center px-2 md:px-4">
    <div class="flex items-center divide-x divide-gray-500">
        <!-- Social Media Icons -->
        <div class="flex items-center space-x-3 pr-3">
            <a href="#" class="hover:text-orange-300 transition-colors"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="hover:text-orange-300 transition-colors"><i class="fab fa-twitter"></i></a>
            <a href="#" class="hover:text-orange-300 transition-colors"><i class="fab fa-instagram"></i></a>
            <a href="#" class="hover:text-orange-300 transition-colors"><i class="fab fa-youtube"></i></a>
        </div>
        <!-- Contact Info -->
        <div class="hidden md:flex items-center space-x-3 pl-3">
            <span class="flex items-center"><i class="fas fa-phone mr-1"></i> +62-431-123456</span>
            <span class="hidden md:inline-block h-3 w-px bg-gray-500 mx-2"></span>
      <span class="flex items-center"><i class="fas fa-envelope mr-1"></i> fatek@unima.ac.id</span>
        </div>
    </div>
    <form class="hidden md:flex items-center space-x-1">
      <input type="text" placeholder="Search..." class="rounded px-2 py-1 text-orange-800 text-xs md:text-sm h-6 md:h-7" />
      <button type="submit" class="px-2 py-1 bg-white text-orange-600 rounded text-xs md:text-sm h-6 md:h-7">Cari</button>
    </form>
  </div>
</div>
<!-- Header Logo + Judul -->
<header class="w-full bg-orange-600 shadow-lg">
  <div class="container mx-auto flex items-center justify-between py-3 px-4">
    <div class="flex items-center space-x-4">
      <img src="{{ asset('img/logo-unima.png') }}" alt="Logo UNIMA" class="w-14 h-14 object-contain bg-white rounded-full p-1" />
      <div>
        <h1 class="text-xl font-bold text-white leading-tight">Fakultas Teknik</h1>
        <p class="text-sm text-orange-100">Universitas Negeri Manado</p>
      </div>
    </div>
    <form class="md:hidden">
      <input type="text" placeholder="Search..." class="rounded px-2 py-1 text-orange-800" />
    </form>
    <button id="mobile-menu-btn" class="md:hidden text-white ml-4 focus:outline-none">
      <i class="fas fa-bars text-2xl"></i>
    </button>
  </div>
  <!-- Navigation -->
  <nav class="w-full border-t border-orange-400 bg-orange-600">
    <div class="container mx-auto px-4">
      <div class="hidden md:flex items-center justify-center space-x-6 py-2">
        <a href="{{ url('/home') }}" class="nav-link text-white hover:text-orange-200 font-semibold">Home</a>
        <!-- Profil Dropdown -->
        <div class="relative group">
          <button class="nav-link text-white hover:text-orange-200 font-semibold flex items-center focus:outline-none">Profil <i class="fas fa-caret-down ml-1"></i></button>
          <ul class="absolute left-0 top-full pt-2 w-56 bg-white shadow-lg rounded-lg border border-orange-200 opacity-0 scale-95 group-hover:opacity-100 group-hover:scale-100 pointer-events-none group-hover:pointer-events-auto transition-all duration-200 z-50">
            <li><a href="{{ url('/visi-misi') }}" class="block px-4 py-2 text-orange-800 hover:bg-orange-50">Visi Misi</a></li>
            <li><a href="{{ url('/kebijakan') }}" class="block px-4 py-2 text-orange-800 hover:bg-orange-50">Kebijakan</a></li>
            <li><a href="{{ url('/dosen') }}" class="block px-4 py-2 text-orange-800 hover:bg-orange-50">Dosen</a></li>
            <li><a href="{{ url('/struktur') }}" class="block px-4 py-2 text-orange-800 hover:bg-orange-50">Struktur Pimpinan</a></li>
            <li><a href="{{ url('/jurusan') }}" class="block px-4 py-2 text-orange-800 hover:bg-orange-50">Jurusan</a></li>
          </ul>
        </div>
        <!-- Akademik Dropdown -->
        <div class="relative group">
          <button class="nav-link text-white hover:text-orange-200 font-semibold flex items-center focus:outline-none">Akademik <i class="fas fa-caret-down ml-1"></i></button>
          <ul class="absolute left-0 top-full pt-2 w-56 bg-white shadow-lg rounded-lg border border-orange-200 opacity-0 scale-95 group-hover:opacity-100 group-hover:scale-100 pointer-events-none group-hover:pointer-events-auto transition-all duration-200 z-50">
            <li><a href="{{ url('/magang-kkn') }}" class="block px-4 py-2 text-orange-800 hover:bg-orange-50">Magang & KKN</a></li>
            <li><a href="{{ url('/pedoman-akademik') }}" class="block px-4 py-2 text-orange-800 hover:bg-orange-50">Pedoman Akademik</a></li>
            <li><a href="{{ url('/kalender-akademik') }}" class="block px-4 py-2 text-orange-800 hover:bg-orange-50">Kalender Akademik</a></li>
            <li><a href="{{ url('/si-unima') }}" class="block px-4 py-2 text-orange-800 hover:bg-orange-50">SI Unima</a></li>
            <li><a href="{{ url('/lms-unima') }}" class="block px-4 py-2 text-orange-800 hover:bg-orange-50">LMS Unima</a></li>
          </ul>
        </div>
        <!-- Kemahasiswaan & Alumni Dropdown -->
        <div class="relative group">
          <button class="nav-link text-white hover:text-orange-200 font-semibold flex items-center focus:outline-none">Kemahasiswaan & Alumni <i class="fas fa-caret-down ml-1"></i></button>
          <ul class="absolute left-0 top-full pt-2 w-56 bg-white shadow-lg rounded-lg border border-orange-200 opacity-0 scale-95 group-hover:opacity-100 group-hover:scale-100 pointer-events-none group-hover:pointer-events-auto transition-all duration-200 z-50">
            <li><a href="{{ url('/ormawa') }}" class="block px-4 py-2 text-orange-800 hover:bg-orange-50">ORMAWA</a></li>
            <li><a href="{{ url('/alumni') }}" class="block px-4 py-2 text-orange-800 hover:bg-orange-50">Alumni</a></li>
          </ul>
        </div>
        <!-- Unit Dropdown -->
        <div class="relative group">
          <button class="nav-link text-white hover:text-orange-200 font-semibold flex items-center focus:outline-none">Unit <i class="fas fa-caret-down ml-1"></i></button>
          <ul class="absolute left-0 top-full pt-2 w-56 bg-white shadow-lg rounded-lg border border-orange-200 opacity-0 scale-95 group-hover:opacity-100 group-hover:scale-100 pointer-events-none group-hover:pointer-events-auto transition-all duration-200 z-50">
            <li><a href="{{ url('/penjaminan-mutu') }}" class="block px-4 py-2 text-orange-800 hover:bg-orange-50">Unit Penjaminan Mutu</a></li>
            <li><a href="{{ url('/p3ki') }}" class="block px-4 py-2 text-orange-800 hover:bg-orange-50">Rumah Publikasi (P3KI)</a></li>
            <li><a href="{{ url('/p3rpm') }}" class="block px-4 py-2 text-orange-800 hover:bg-orange-50">Ruang Kolaborasi (P3RPM)</a></li>
          </ul>
        </div>
        <a href="{{ url('/zona-integritas') }}" class="nav-link text-white hover:text-orange-200 font-semibold">Zona Integritas</a>
        <a href="{{ url('/humas-kerjasama') }}" class="nav-link text-white hover:text-orange-200 font-semibold">Humas & Kerjasama</a>
        <!-- Layanan Dropdown -->
        <div class="relative group">
          <button class="nav-link text-white hover:text-orange-200 font-semibold flex items-center focus:outline-none">Layanan <i class="fas fa-caret-down ml-1"></i></button>
          <ul class="absolute left-0 top-full pt-2 w-56 bg-white shadow-lg rounded-lg border border-orange-200 opacity-0 scale-95 group-hover:opacity-100 group-hover:scale-100 pointer-events-none group-hover:pointer-events-auto transition-all duration-200 z-50">
            <li>
              <div class="relative group">
                <a href="#" class="block px-4 py-2 text-orange-800 hover:bg-orange-50 flex items-center justify-between">Download <i class="fas fa-caret-right ml-2"></i></a>
                <ul class="absolute left-full top-0 w-56 bg-white shadow-lg rounded-lg border border-orange-200 opacity-0 scale-95 group-hover:opacity-100 group-hover:scale-100 pointer-events-none group-hover:pointer-events-auto transition-all duration-200 z-50">
                  <li><a href="{{ url('/akreditasi') }}" class="block px-4 py-2 text-orange-800 hover:bg-orange-50">Link Akreditasi Institusi Unima</a></li>
                </ul>
              </div>
            </li>
            <li><a href="{{ url('/tracer-study') }}" class="block px-4 py-2 text-orange-800 hover:bg-orange-50">Tracer Study</a></li>
            <li><a href="{{ url('/survei-layanan') }}" class="block px-4 py-2 text-orange-800 hover:bg-orange-50">Survei Layanan</a></li>
            <li><a href="{{ url('/laboratorium') }}" class="block px-4 py-2 text-orange-800 hover:bg-orange-50">Layanan Laboratorium</a></li>
            <li><a href="{{ url('/layanan-akademik') }}" class="block px-4 py-2 text-orange-800 hover:bg-orange-50">Layanan Akademik</a></li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
</header>

<!-- Mobile Menu -->
<div id="mobile-menu" class="md:hidden hidden bg-orange-600 border-t border-orange-400">
  <div class="container mx-auto px-4 py-4">
    <div class="space-y-4">
      <a href="{{ url('/home') }}" class="block text-white hover:text-orange-200 font-semibold">Home</a>
      
      <!-- Mobile Profil -->
      <div class="space-y-2">
        <div class="text-white font-semibold">Profil</div>
        <div class="pl-4 space-y-2">
          <a href="{{ url('/visi-misi') }}" class="block text-orange-100 hover:text-white">Visi Misi</a>
          <a href="{{ url('/kebijakan') }}" class="block text-orange-100 hover:text-white">Kebijakan</a>
          <a href="{{ url('/dosen') }}" class="block text-orange-100 hover:text-white">Dosen</a>
          <a href="{{ url('/struktur') }}" class="block text-orange-100 hover:text-white">Struktur Pimpinan</a>
          <a href="{{ url('/jurusan') }}" class="block text-orange-100 hover:text-white">Jurusan</a>
        </div>
      </div>
      
      <!-- Mobile Akademik -->
      <div class="space-y-2">
        <div class="text-white font-semibold">Akademik</div>
        <div class="pl-4 space-y-2">
          <a href="{{ url('/magang-kkn') }}" class="block text-orange-100 hover:text-white">Magang & KKN</a>
          <a href="{{ url('/pedoman-akademik') }}" class="block text-orange-100 hover:text-white">Pedoman Akademik</a>
          <a href="{{ url('/kalender-akademik') }}" class="block text-orange-100 hover:text-white">Kalender Akademik</a>
          <a href="{{ url('/si-unima') }}" class="block text-orange-100 hover:text-white">SI Unima</a>
          <a href="{{ url('/lms-unima') }}" class="block text-orange-100 hover:text-white">LMS Unima</a>
        </div>
      </div>
      
      <!-- Mobile Kemahasiswaan -->
      <div class="space-y-2">
        <div class="text-white font-semibold">Kemahasiswaan & Alumni</div>
        <div class="pl-4 space-y-2">
          <a href="{{ url('/ormawa') }}" class="block text-orange-100 hover:text-white">ORMAWA</a>
          <a href="{{ url('/alumni') }}" class="block text-orange-100 hover:text-white">Alumni</a>
        </div>
      </div>
      
      <!-- Mobile Unit -->
      <div class="space-y-2">
        <div class="text-white font-semibold">Unit</div>
        <div class="pl-4 space-y-2">
          <a href="{{ url('/penjaminan-mutu') }}" class="block text-orange-100 hover:text-white">Unit Penjaminan Mutu</a>
          <a href="{{ url('/p3ki') }}" class="block text-orange-100 hover:text-white">Rumah Publikasi (P3KI)</a>
          <a href="{{ url('/p3rpm') }}" class="block text-orange-100 hover:text-white">Ruang Kolaborasi (P3RPM)</a>
        </div>
      </div>
      
      <a href="{{ url('/zona-integritas') }}" class="block text-white hover:text-orange-200 font-semibold">Zona Integritas</a>
      <a href="{{ url('/humas-kerjasama') }}" class="block text-white hover:text-orange-200 font-semibold">Humas & Kerjasama</a>
      
      <!-- Mobile Layanan -->
      <div class="space-y-2">
        <div class="text-white font-semibold">Layanan</div>
        <div class="pl-4 space-y-2">
          <a href="{{ url('/akreditasi') }}" class="block text-orange-100 hover:text-white">Link Akreditasi Institusi Unima</a>
          <a href="{{ url('/tracer-study') }}" class="block text-orange-100 hover:text-white">Tracer Study</a>
          <a href="{{ url('/survei-layanan') }}" class="block text-orange-100 hover:text-white">Survei Layanan</a>
          <a href="{{ url('/laboratorium') }}" class="block text-orange-100 hover:text-white">Layanan Laboratorium</a>
          <a href="{{ url('/layanan-akademik') }}" class="block text-orange-100 hover:text-white">Layanan Akademik</a>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    
    if (mobileMenuBtn && mobileMenu) {
        mobileMenuBtn.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');
        });
    }
    
    // Close mobile menu when clicking outside
    document.addEventListener('click', function(event) {
        if (!event.target.closest('#mobile-menu') && !event.target.closest('#mobile-menu-btn')) {
            if (mobileMenu && !mobileMenu.classList.contains('hidden')) {
                mobileMenu.classList.add('hidden');
            }
        }
    });
});
</script> 