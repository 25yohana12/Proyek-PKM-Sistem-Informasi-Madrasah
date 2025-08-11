@extends('layouts.guest')

@section('title', 'Data Siswa | MIN Toba Samosir')

@section('content')
    <!-- Judul Section -->
    <h2 class="text-center fw-bold my-4 text-success">SISWA</h2>

    <!-- Grid Kartu Siswa -->
    <div class="container">
        <div class="row g-4">
            @forelse($siswas as $siswa)
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="card shadow-sm h-100 border-0">
                        <img src="{{ $siswa->gambar ? Storage::url($siswa->gambar) : asset('images/default-class.jpg') }}" class="card-img-top" style="height: 190px; object-fit: cover;" alt="{{ $siswa->kelas }}">
                        <div class="card-body bg-success text-white py-2">
                            <h5 class="card-title text-center mb-0">KELAS {{ strtoupper($siswa->kelas) }}</h5>
                        </div>
                        <div class="card-footer bg-light">
                            <p class="mb-1 fw-semibold">WALI KELAS: <span class="fw-normal">{{ $siswa->namaWali ?? '-' }}</span></p>
                            <p class="mb-0 fw-semibold">Jumlah Siswa: <span class="fw-normal">{{ $siswa->jumlahSiswa ?? $siswa->jumlahMurid ?? '0' }}</span></p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-center">Belum ada data siswa.</p>
                </div>
            @endforelse
        </div>
    </div>

    <div class="my-5"></div>
@endsection
