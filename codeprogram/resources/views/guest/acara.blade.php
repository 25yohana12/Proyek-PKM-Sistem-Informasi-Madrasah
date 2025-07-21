@extends('layouts.guest')

@section('title', 'Perayaan | MIN Toba Samosir')

@section('content')
    <!-- Hero / Banner (reuse banner asset) -->
    <section class="container-fluid p-0">
        <div class="position-relative">
            <img src="{{ asset('images/banner.jpg') }}" class="w-100" style="height: 280px; object-fit: cover;" alt="Banner">
            <div class="position-absolute top-0 start-0 w-100 h-100" style="background: rgba(0, 0, 0, 0.25);"></div>
        </div>
    </section>

    <div class="container py-5">
        <h2 class="text-center fw-bold text-success mb-4" style="font-family: 'Poppins', sans-serif; letter-spacing: 1px;">PERAYAAN</h2>

        @forelse ($acaras as $acara)
            <div class="bg-success bg-opacity-25 rounded-3 p-4 mb-5 shadow-sm">
                <h3 class="fw-bold text-uppercase text-success mb-3">{{ $acara->judul }}</h3>

                @php
                    // Kolom `gambar` diasumsikan menyimpan path yang dipisahkan tanda | untuk lebih dari 1 gambar
                    $images = $acara->gambar ? explode('|', $acara->gambar) : [];
                @endphp

                @if(count($images))
                    <div class="row g-3 mb-3">
                        @foreach($images as $img)
                            <div class="col-4">
                                <img src="{{ Storage::url($img) }}" class="img-fluid rounded-2 w-100" style="height: 120px; object-fit: cover;" alt="foto acara">
                            </div>
                        @endforeach
                    </div>
                @endif

                <p class="fw-semibold mb-1">
                    {{ optional(\Carbon\Carbon::parse($acara->tanggalAcara))->translatedFormat('d F Y') }}
                </p>

                <p class="mb-0" style="text-align: justify;">{!! nl2br(e($acara->deskripsi)) !!}</p>
            </div>
        @empty
            <p class="text-center">Belum ada data acara.</p>
        @endforelse
    </div>
@endsection
