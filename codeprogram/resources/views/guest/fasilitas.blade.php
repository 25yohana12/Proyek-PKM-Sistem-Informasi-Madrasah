@extends('layouts.guest')

@section('title', 'Fasilitas')

@section('content')
    <!-- Hero / Page Heading (optional) -->
    <section class="relative h-60 md:h-72 flex items-center justify-center bg-cover bg-center" style="background-image:url('/images/hero-fasilitas.jpg')">
        <div class="absolute inset-0 bg-gray-900/60"></div>
        <h1 class="relative z-10 text-white text-4xl md:text-5xl font-semibold italic tracking-wide">FASILITAS</h1>
    </section>

    <!-- Daftar Fasilitas -->
    <section class="max-w-5xl mx-auto px-4 md:px-6 py-12">
        @forelse($fasilitas as $index => $item)
            <article class="mb-12 bg-green-50 rounded-xl shadow overflow-hidden">
                <div class="md:flex {{ $index % 2 === 1 ? 'md:flex-row-reverse' : '' }}">
                    <!-- Gambar -->
                    <div class="md:w-1/3 h-60 md:h-auto">
                        <img
                            src="{{ asset('storage/' . $item->gambar) }}"
                            alt="{{ $item->namaFasilitas }}"
                            class="w-full h-full object-cover"
                        />
                    </div>

                    <!-- Konten -->
                    <div class="md:w-2/3 p-6 md:p-8 space-y-4">
                        <h2 class="text-xl md:text-2xl font-semibold text-green-900">{{ $item->namaFasilitas }}</h2>

                        <!-- Label "Prasarana" / "Sarana" -->
                        <div class="grid grid-cols-2 gap-6">
                            <div>
                                <span class="inline-block bg-green-300/60 px-3 py-1 text-sm font-semibold rounded-t">Prasarana</span>
                                <p class="text-sm md:text-base mt-2 leading-relaxed">{{ $item->prasarana }}</p>
                            </div>
                            <div>
                                <span class="inline-block bg-green-300/60 px-3 py-1 text-sm font-semibold rounded-t">Sarana</span>
                                <p class="text-sm md:text-base mt-2 leading-relaxed">{{ $item->sarana }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        @empty
            <p class="text-center text-gray-600">Belum ada data fasilitas.</p>
        @endforelse
    </section>
@endsection
