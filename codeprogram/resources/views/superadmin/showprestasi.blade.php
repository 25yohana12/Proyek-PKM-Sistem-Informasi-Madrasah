@extends('layouts.superadmin')

@section('title', 'Detail Prestasi')

@section('header', 'Detail Prestasi')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>{{ $prestasi->judul }}</h3> <!-- Judul Prestasi -->
            </div>
            <div class="card-body">
                <h5>Nama Prestasi:</h5>
                <p>{{ $prestasi->nama }}</p> <!-- Nama Prestasi -->
                
                <h5>Penghargaan:</h5>
                <p>{{ $prestasi->penghargaan }}</p> <!-- Penghargaan -->

                <h5>Deskripsi:</h5>
                <p>{{ $prestasi->deskripsi }}</p> <!-- Deskripsi -->

                <h5>Foto:</h5>
                <div>
                    @foreach (json_decode($prestasi->gambar) as $gambar)
                        <img src="{{ Storage::url($gambar) }}" alt="Foto Prestasi" width="200">
                    @endforeach
                </div>

                <!-- Tombol kembali -->
                <a href="{{ route('prestasi.index') }}" class="btn btn-secondary mt-3">Kembali ke Daftar Prestasi</a>
            </div>
        </div>
    </div>
@endsection
