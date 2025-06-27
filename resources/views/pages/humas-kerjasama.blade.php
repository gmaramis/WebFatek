@extends('master')

@section('title', 'Humas & Kerjasama - Fakultas Teknik UNIMA')

@section('content')
  <main class="container mx-auto py-16 px-4 min-h-[40vh] flex flex-col items-center justify-center">
    <h2 class="text-2xl md:text-3xl font-bold text-orange-800 mb-4">Humas & Kerjasama</h2>
    <p class="text-center text-orange-900 max-w-2xl">Halaman ini berisi informasi mengenai kegiatan kehumasan dan kerjasama Fakultas Teknik Universitas Negeri Manado, termasuk kolaborasi dengan institusi, dunia industri, dan masyarakat.</p>
    {{-- Konten dari humas-kerjasama.html, tanpa navbar & footer, asset pakai asset() --}}
@endsection 