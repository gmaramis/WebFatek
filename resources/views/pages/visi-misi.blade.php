@extends('master')

@section('title', 'Visi, Misi dan Tujuan - Fakultas Teknik UNIMA')

@section('content')
<main class="min-h-screen bg-gray-50">
    <!-- Hero Section -->
    <div class="bg-gradient-to-r from-orange-600 to-orange-700 text-white py-16">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Visi & Misi</h1>
            <p class="text-xl text-orange-100">Fakultas Teknik Universitas Negeri Manado</p>
        </div>
    </div>

    <!-- Content Section -->
    <div class="container mx-auto px-4 py-12">
        @php
            $visiMisi = App\Models\VisiMisi::active()->first();
        @endphp

        @if($visiMisi)
            <div class="max-w-4xl mx-auto">
                <!-- Visi -->
                <div class="bg-white rounded-2xl shadow-lg p-8 mb-8">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-orange-100 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-eye text-2xl text-orange-600"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800">Visi</h3>
                    </div>
                    <div class="prose prose-lg max-w-none">
                        {!! $visiMisi->visi !!}
                    </div>
                </div>

                <!-- Misi -->
                <div class="bg-white rounded-2xl shadow-lg p-8 mb-8">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-orange-100 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-bullseye text-2xl text-orange-600"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800">Misi</h3>
                    </div>
                    <div class="prose prose-lg max-w-none">
                        {!! $visiMisi->misi !!}
                    </div>
                </div>

                <!-- Tujuan -->
                <div class="bg-white rounded-2xl shadow-lg p-8 mb-8">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-orange-100 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-target text-2xl text-orange-600"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800">Tujuan</h3>
                    </div>
                    <div class="prose prose-lg max-w-none">
                        {!! $visiMisi->tujuan !!}
                    </div>
                </div>

                <!-- Sasaran -->
                <div class="bg-white rounded-2xl shadow-lg p-8">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-orange-100 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-chart-line text-2xl text-orange-600"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800">Sasaran</h3>
                    </div>
                    <div class="prose prose-lg max-w-none">
                        {!! $visiMisi->sasaran !!}
                    </div>
                </div>
            </div>
        @else
            <!-- Fallback jika tidak ada data -->
            <div class="max-w-4xl mx-auto text-center">
                <div class="bg-white rounded-2xl shadow-lg p-8">
                    <i class="fas fa-info-circle text-6xl text-gray-400 mb-4"></i>
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">Data Belum Tersedia</h3>
                    <p class="text-gray-600">Data visi dan misi fakultas sedang dalam proses pengisian.</p>
                </div>
            </div>
        @endif
    </div>
</main>
@endsection 