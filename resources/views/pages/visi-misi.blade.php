@extends('master')

@section('title', 'Visi, Misi dan Tujuan - Fakultas Teknik UNIMA')

@section('content')
<main class="container mx-auto p-4 py-8 mt-24">
    <div class="bg-white p-8 rounded-2xl shadow-lg">
        <h1 class="text-3xl font-bold mb-6 text-primary border-b-2 pb-4">Visi, Misi dan Tujuan</h1>
        
        <div class="space-y-10 mt-8">
            <div>
                <h2 class="text-2xl font-bold mt-6 mb-4 flex items-center text-secondary">
                    <i class="fas fa-eye text-accent mr-3"></i>
                    Visi
                </h2>
                <p class="text-lg text-gray-700 leading-relaxed pl-8">
                    Menjadi fakultas teknik yang unggul dan berdaya saing tinggi di Indonesia.
                </p>
            </div>

            <div>
                <h2 class="text-2xl font-bold mt-6 mb-4 flex items-center text-secondary">
                    <i class="fas fa-rocket text-accent mr-3"></i>
                    Misi
                </h2>
                <ol class="list-decimal list-inside space-y-3 text-lg text-gray-700 leading-relaxed pl-8">
                    <li>Menyelenggarakan pendidikan yang berkualitas dan berbasis teknologi.</li>
                    <li>Melaksanakan penelitian yang inovatif dan berkontribusi terhadap pengembangan ilmu pengetahuan dan teknologi.</li>
                    <li>Melaksanakan pengabdian kepada masyarakat dalam rangka pengembangan teknologi.</li>
                </ol>
            </div>

            <div>
                <h2 class="text-2xl font-bold mt-6 mb-4 flex items-center text-secondary">
                    <i class="fas fa-bullseye text-accent mr-3"></i>
                    Tujuan
                </h2>
                <ol class="list-decimal list-inside space-y-3 text-lg text-gray-700 leading-relaxed pl-8">
                    <li>Meningkatkan kualitas pendidikan dan penelitian.</li>
                    <li>Meningkatkan kualitas pengabdian kepada masyarakat.</li>
                    <li>Meningkatkan kualitas kerjasama dan kolaborasi dengan berbagai pihak.</li>
                </ol>
            </div>
        </div>
    </div>
</main>
@endsection 