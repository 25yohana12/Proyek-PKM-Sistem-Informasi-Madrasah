@extends('layouts.superadmin')

@section('title', 'Detail Fasilitas')

@section('content')
    <div class="header">Detail Fasilitas</div>

    <div class="detail-container">
        <!-- Nama Fasilitas -->
        <div class="detail-group">
            <label for="namaFasilitas">Nama Fasilitas</label>
            <p>{{ $fasilitas->namaFasilitas }}</p>
        </div>

        <!-- Prasarana -->
        <div class="detail-group">
            <label for="prasarana">Prasarana</label>
            <p>{{ $fasilitas->prasarana }}</p>
        </div>

        <!-- Sarana -->
        <div class="detail-group">
            <label for="sarana">Sarana</label>
            <p>{{ $fasilitas->sarana }}</p>
        </div>

        <!-- Jumlah Fasilitas -->
        <div class="detail-group">
            <label for="jumlah">Jumlah Fasilitas</label>
            <p>{{ $fasilitas->jumlah }}</p>
        </div>

        <!-- Gambar Fasilitas (Multiple Images) -->
        <div class="detail-group">
            <label for="gambar">Foto Fasilitas</label>
            <div class="gallery">
                <!-- Menampilkan gambar yang sudah ada -->
                @if($fasilitas->gambar)
                    <div class="existing-images mt-3">
                        <label>Gambar yang ada:</label>
                        @php
                            $images = json_decode($fasilitas->gambar); // Mengambil gambar yang sudah ada
                        @endphp
                        @foreach($images as $image)
                            <img src="{{ Storage::url($image) }}" alt="Existing Image" class="img-thumbnail" width="100">
                        @endforeach
                    </div>
                @endif
            </div>
        </div>

        <div class="button-container">
            <a href="{{ route('fasilitas.edit', $fasilitas->fasilitas_id) }}" class="button">Edit Fasilitas</a>
            <a href="{{ route('fasilitas.index') }}" class="button">Kembali ke Daftar Fasilitas</a>
        </div>
    </div>
@endsection

@section('styles')
    <style>
        .detail-container {
            padding: 20px;
        }
        .detail-group {
            margin-bottom: 20px;
        }
        .detail-group label {
            font-weight: bold;
        }
        .gallery {
            display: flex;
            gap: 10px;
        }
        .facility-image {
            max-width: 150px;
            max-height: 150px;
            object-fit: cover;
        }
        .button-container {
            margin-top: 20px;
        }
    </style>
@endsection
