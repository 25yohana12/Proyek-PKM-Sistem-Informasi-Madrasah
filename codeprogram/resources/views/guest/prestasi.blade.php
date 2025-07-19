@extends('layouts.guest')

@section('title', 'Prestasi')

@section('content')
    <!-- Hero / Page Heading -->
    <section class="relative h-60 md:h-72 flex items-center justify-center bg-cover bg-center" style="background-image:url('/images/hero-prestasi.jpg')">
        <div class="absolute inset-0 bg-gray-900/60"></div>
        <h1 class="relative z-10 text-white text-4xl md:text-5xl font-semibold italic">Prestasi</h1>
    </section>

    <!-- Prestasi List -->
    <section class="container mx-auto max-w-6xl px-4 md:px-6 py-12 space-y-20">
        @foreach($prestasi as $index => $item)
            <!-- Single Prestasi Card -->
            <article class="space-y-6">
                <!-- Title Ribbon -->
                <h2 class="bg-green-100 text-center text-lg md:text-2xl font-semibold py-4 rounded-t-lg shadow-sm">
                    {{ $item->judul }}
                </h2>

                <!-- Content -->
                <div class="flex flex-col {{ $index % 2 === 0 ? 'md:flex-row' : 'md:flex-row-reverse' }} bg-green-50 rounded-lg shadow-md overflow-hidden">
                    <!-- Image -->
                    <figure class="md:w-5/12 w-full h-64 md:h-auto">
                        <img
                            src="{{ $item->gambar ? asset('storage/' . $item->gambar) : 'https://via.placeholder.com/640x480?text=Prestasi' }}"
                            alt="Gambar {{ $item->judul }}"
                            class="w-full h-full object-cover"
                        />
                    </figure>

                    <!-- Description -->
                    <div class="md:w-7/12 w-full p-6 md:p-8 space-y-4">
                        <p class="text-gray-700 leading-relaxed text-justify">
                            {{ $item->deskripsi }}
                        </p>
                        @if($item->penghargaan)
                            <p class="text-sm font-medium text-green-700">Penghargaan: {{ $item->penghargaan }}</p>
                        @endif
                    </div>
                </div>
            </article>
        @endforeach
    </section>
@endsection
