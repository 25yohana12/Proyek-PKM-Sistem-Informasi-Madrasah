@extends('layouts.guest')

@section('title', 'Fasilitas')

@section('content')
    <!-- Hero / Page Heading -->
    <section class="hero relative h-60 md:h-72 flex items-center justify-center bg-cover bg-center" style="background-image:url('/images/hero-fasilitas.jpg')">
        <div class="hero-overlay absolute inset-0 bg-gray-900/60"></div>
        <h1 class="hero-heading relative z-10 text-white text-4xl md:text-5xl font-semibold italic tracking-wide">FASILITAS</h1>
    </section>

    <!-- Daftar Fasilitas -->
    <section class="article-container max-w-5xl mx-auto px-4 md:px-6 py-12">
        @forelse($fasilitas as $index => $item)
            <div class="card mb-12 bg-green-50 rounded-xl shadow overflow-hidden md:flex">
                <!-- Image Section -->
                @php
                    $images = json_decode($item->gambar);
                @endphp
                <div class="card-image md:w-1/2">
                    @if (!empty($images))
                        <div class="image-preview relative">
                            <img src="{{ Storage::url($images[0]) }}" alt="Foto {{ $item->namaFasilitas }}" class="gallery-thumbnail w-full h-auto rounded-lg object-cover">
                            @if (count($images) > 1)
                                <div class="image-count absolute top-0 right-0 bg-black text-white p-2 rounded-full">
                                    <i class="fas fa-images"></i> +{{ count($images) - 1 }}
                                </div>
                            @endif
                        </div>
                    @else
                        <div class="no-image flex justify-center items-center bg-gray-300 rounded-lg p-4 h-full">
                            <i class="fas fa-image text-4xl text-gray-500"></i>
                            <span class="no-image-text ml-2 text-gray-600">Tidak ada gambar</span>
                        </div>
                    @endif
                </div>

                <!-- Content Section -->
                <div class="card-content md:w-1/2 p-6 md:p-8 space-y-4">
                    <h2 class="card-title text-xl md:text-2xl font-semibold text-green-900">{{ $item->namaFasilitas }}</h2>

                    <!-- Label "Prasarana" / "Sarana" -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <span class="label inline-block bg-green-300/60 px-3 py-1 text-sm font-semibold rounded-t">Prasarana</span>
                            <p class="description text-sm md:text-base mt-2 leading-relaxed">{{ $item->prasarana }}</p>
                        </div>
                        <div>
                            <span class="label inline-block bg-green-300/60 px-3 py-1 text-sm font-semibold rounded-t">Sarana</span>
                            <p class="description text-sm md:text-base mt-2 leading-relaxed">{{ $item->sarana }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center text-gray-600">Belum ada data fasilitas.</p>
        @endforelse
    </section>
@endsection

@section('styles')
<style>
    /* Menambahkan beberapa styling untuk halaman fasilitas */
    .hero {
        background-position: center;
        background-size: cover;
        position: relative;
    }

    .hero-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #89cea8;
    }

    .hero-heading {
        position: relative;
        z-index: 10;
        font-size: 2rem;
        font-weight: 600;
        color: white;
        text-align: center;
        letter-spacing: 2px;
        font-style: italic;
    }

    .article-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 3rem 1.5rem;
    }

    .card {
        margin-bottom: 2rem;
        background-color: #F0F9F4;
        border-radius: 16px;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        display: flex;
        flex-direction: row;
        overflow: hidden;
        width: 90%;
        margin-left: 5%;
    }

    .card-image {
        width: 100%;
        max-width: 50%;
        position: relative;
    }

    .image-preview {
        position: relative;
        width: 100%;
        height: 100%;
    }

    .gallery-thumbnail {
        width: 100%;
        height: auto;
        border-radius: 8px;
        object-fit: cover;
    }

    .image-count {
        position: absolute;
        top: 0;
        right: 0;
        background-color: rgba(0, 0, 0, 0.6);
        color: white;
        padding: 5px 10px;
        border-radius: 50%;
        font-size: 12px;
    }

    .no-image {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
        background-color: #e0e0e0;
        border-radius: 8px;
    }

    .no-image-icon {
        font-size: 3rem;
        color: #777;
    }

    .no-image-text {
        font-size: 1rem;
        color: #777;
        margin-left: 10px;
    }

    .card-content {
        padding: 2rem;
        width: 100%;
        max-width: 50%;
    }

    .card-title {
        font-size: 1.75rem;
        font-weight: 700;
        color: #387D44;
        margin-bottom: 1rem;
    }

    .label {
        background-color: rgba(56, 125, 68, 0.6);
        padding: 0.5rem;
        font-size: 0.9rem;
        font-weight: 600;
        color: #fff;
        border-radius: 8px;
        margin-top: 0.5rem;
    }

    .description {
        font-size: 1rem;
        line-height: 1.5;
        color: #555;
        margin-top: 0.5rem;
    }

    @media (max-width: 768px) {
        .card {
            flex-direction: column;
        }

        .card-image, .card-content {
            width: 100%;
            max-width: 100%;
        }

        .hero-heading {
            font-size: 1.5rem;
        }
    }
</style>
@endsection
