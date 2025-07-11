@extends('layouts.superadmin')

@section('title', 'Edit Galeri')

@section('content')
    <div class="header-container">
        <div class="header">
            <h2>Edit Galeri</h2>
        </div>
    </div>

    <!-- Form Edit Galeri -->
    <form action="{{ route('galeri.update', $galeri->galeri_id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT') <!-- Indikasi bahwa ini adalah metode PUT untuk update -->

        <!-- Judul Galeri -->
        <div class="form-group">
            <label for="judul">Judul</label>
            <input type="text" id="judul" name="judul" class="form-control" value="{{ old('judul', $galeri->judul) }}" required>
        </div>

        <!-- Deskripsi Galeri -->
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea id="deskripsi" name="deskripsi" class="form-control" rows="4" required>{{ old('deskripsi', $galeri->deskripsi) }}</textarea>
        </div>

        <!-- Gambar (Multiple) -->
        <div class="form-group">
            <label for="gambar">Foto (Multiple)</label>
            <input type="file" id="gambar" name="gambar[]" class="form-control" accept="image/*" multiple>

            <p>Gambar yang ada:</p>
            @foreach(json_decode($galeri->gambar) as $image)
                <img src="{{ Storage::url($image) }}" alt="Existing Image" class="gallery-image" width="100">
            @endforeach
        </div>

        <button type="submit" class="button">Simpan Perubahan</button>
    </form>

    <a href="{{ route('galeri.index') }}" class="button back-btn">Kembali ke Daftar Galeri</a>
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

        .form-group {
            margin-bottom: 15px;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
        }

        .button:hover {
            background-color: #45a049;
        }

        .back-btn {
            background-color: #007bff; /* Blue */
            margin-top: 10px;
        }

        .back-btn:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }

        .gallery-image {
            margin-top: 10px;
            border-radius: 5px;
        }
    </style>
@endsection
