@extends('layouts.guest')

@section('title', 'Perayaan | MIN Toba Samosir')

@section('content')

    <div class="container py-5">
        <h2 class="text-center fw-bold text-success mb-5" style="font-family: 'Poppins', sans-serif; letter-spacing: 1px; font-size: 2.5rem;">PERAYAAN</h2>

        @forelse ($acaras as $acara)
            <div class="bg-light shadow-sm rounded-3 p-4 mb-5">
                <h3 class="fw-bold text-uppercase text-success mb-3">{{ $acara->judul }}</h3>

               @php
    $images = $acara->gambar ? json_decode($acara->gambar, true) : [];
@endphp

@if(count($images))
    <div id="carousel{{ $acara->id }}" class="carousel slide mb-4" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach($images as $index => $img)
                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                    <img src="{{ Storage::url($img) }}" 
                         class="d-block w-100 rounded-2" 
                         style="height: 300px; object-fit: cover;" 
                         alt="foto acara">
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carousel{{ $acara->id }}" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carousel{{ $acara->id }}" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
@endif

                <div class="d-flex justify-content-between align-items-center">
                    <p class="fw-semibold mb-1">
                        {{ optional(\Carbon\Carbon::parse($acara->tanggalAcara))->translatedFormat('d F Y') }}
                    </p>
                    <a href="#" class="btn btn-success btn-sm">Lihat Detail</a>
                </div>

                <p class="mb-0 mt-3" style="text-align: justify; line-height: 1.6;">{!! nl2br(e($acara->deskripsi)) !!}</p>
            </div>
        @empty
            <p class="text-center text-muted">Belum ada data acara.</p>
        @endforelse
    </div>
@endsection
