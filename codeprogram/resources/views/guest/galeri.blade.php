@extends('layouts.guest')

@section('title', 'Galeri')

@section('content')
    <!-- =========================
         Hero / Page Heading
    ========================== -->
    <section class="relative h-60 md:h-72 flex items-center justify-center bg-cover bg-center" style="background-image:url('/images/hero-galeri.jpg')">
        <div class="absolute inset-0 bg-gray-900/60"></div>
        <h1 class="relative z-10 text-white text-4xl md:text-5xl font-semibold italic tracking-wide">
            Galeri
        </h1>
    </section>

    <!-- =========================
         Main Content
    ========================== -->
    <section class="max-w-6xl mx-auto px-4 py-12">
        @foreach($galeri->groupBy('judul') as $judul => $items)
            <div class="mb-14">
                <!-- Judul Album -->
                <h2 class="text-center font-semibold text-lg md:text-xl mb-6">{{ $judul }}</h2>

                <!-- Grid Foto -->
                <div class="grid grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
                    @foreach($items as $photo)
                        <div class="relative group overflow-hidden rounded-md shadow hover:shadow-lg transition-shadow duration-300">
                            <img
                                src="{{ asset('storage/' . $photo->gambar) }}"
                                alt="{{ $photo->judul }}"
                                class="w-full h-40 object-cover group-hover:scale-105 transition-transform duration-300"
                            >
                            <!-- Overlay (optional: tampilkan deskripsi saat hover) -->
                            @if($photo->deskripsi)
                                <div class="absolute inset-0 bg-gray-900/60 opacity-0 group-hover:opacity-100 flex items-center justify-center text-white text-xs text-center px-2 transition-opacity duration-300">
                                    {{ $photo->deskripsi }}
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </section>
@endsection
