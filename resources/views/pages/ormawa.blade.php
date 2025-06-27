@extends('master')

@section('title', 'ORMAWA - Fakultas Teknik UNIMA')

@section('content')
  <main class="container mx-auto py-16 px-4 min-h-[40vh] flex flex-col items-center justify-center">
    <h2 class="text-2xl md:text-3xl font-bold text-orange-800 mb-4">Organisasi Mahasiswa (ORMAWA)</h2>
    <p class="text-center text-orange-900 max-w-2xl">Halaman ini berisi informasi mengenai organisasi kemahasiswaan (ORMAWA) yang ada di Fakultas Teknik Universitas Negeri Manado, seperti BEM, Himpunan Jurusan, dan UKM.</p>
    {{-- Konten dari ormawa.html, tanpa navbar & footer, asset pakai asset() --}}
@endsection 