@extends('layouts.superadmin')

@section('title', 'Detail Galeri')

@section('content')
    <div class="header-container">
        <div class="header">
            <h2>Detail Galeri</h2>
        </div>
    </div>

    <div class="detail-container">
        <!-- Menampilkan Judul -->
        <div class="form-group">
            <label for="judul">Judul</label>
            <p>{{ $galeri->judul }}</p>
        </div>

        <!-- Menampilkan Deskripsi -->
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <p>{{ $galeri->deskripsi }}</p>
        </div>

        <!-- Menampilkan Gambar -->
        <div class="form-group">
            <label for="gambar">Gambar</label>
            <div class="gallery">
                @foreach(json_decode($galeri->gambar) as $image)
                    <img src="{{ Storage::url($image) }}" alt="Gambar Galeri" class="gallery-image" width="150">
                @endforeach
            </div>
        </div>

        <div class="button-container">
            <a href="{{ route('galeri.index') }}" class="button back-btn">Kembali ke Daftar Galeri</a>
        </div>
    </div>
@endsection

@section('styles')
    <style>
        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .header {
            font-size: 24px;
            font-weight: bold;
        }

        .detail-container {
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: bold;
        }

        .gallery {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .gallery-image {
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        .button:hover {
            background-color: #45a049;
        }

        .back-btn {
            background-color: #007bff; /* Blue */
        }

        .back-btn:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }
    </style>
@endsection
