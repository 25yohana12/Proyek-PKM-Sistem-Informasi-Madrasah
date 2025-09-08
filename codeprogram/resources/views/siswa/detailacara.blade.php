@extends('layouts.siswa')

@section('title', 'Detail Acara | MIN Toba Samosir')

@section('content')

    <div class="container py-5">
        <h2 class="text-center fw-bold text-success mb-5" style="font-family: 'Poppins', sans-serif; letter-spacing: 1px; font-size: 2.5rem;">Detail Acara</h2>

        <div class="bg-light shadow-sm rounded-3 p-4 mb-5">
            <!-- Judul Acara -->
            <h3 class="fw-bold text-uppercase text-success mb-3" style="font-size: 2rem;">{{ $acara->judul }}</h3>

            @php
                $images = $acara->getImagesAttribute();
            @endphp

            <!-- Carousel Gambar -->
            @if(count($images))
                <div id="carousel{{ $acara->acara_id }}" class="carousel slide mb-4" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach($images as $index => $img)
                            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                <img src="{{ Storage::url($img) }}" 
                                     class="d-block w-100 rounded-2" 
                                     style="height: 500px; object-fit: cover;" 
                                     alt="foto acara">
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carousel{{ $acara->acara_id }}" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carousel{{ $acara->acara_id }}" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            @endif

            <!-- Tanggal Acara -->
            <div class="d-flex justify-content-between align-items-center mb-3">
                <p class="fw-semibold mb-1" style="font-size: 1.2rem; color: #555;">
                    {{ optional(\Carbon\Carbon::parse($acara->tanggalAcara))->translatedFormat('d F Y') }}
                </p>
                <a href="{{ route('acara.index') }}" class="btn btn-secondary btn-sm">Kembali ke Daftar Acara</a>
            </div>

            <!-- Deskripsi Acara -->
            <p class="mb-0 mt-3" style="text-align: justify; line-height: 1.8; color: #333;">
                {!! nl2br(e($acara->deskripsi)) !!}
            </p>

        </div>
    </div>

@endsection
