@extends('layouts.superadmin')

@section('title', 'Tambah Acara')

@section('content')
    <div class="header-container">
        <div class="header">
            <h2>Tambah Acara</h2>
        </div>
    </div>

    <!-- Form Tambah Acara -->
    <form action="{{ route('acara.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Judul Acara -->
        <div class="form-group">
            <label for="judul">Judul Acara</label>
            <input type="text" id="judul" name="judul" class="form-control" value="{{ old('judul') }}" required>
        </div>

        <!-- Deskripsi Acara -->
        <div class="form-group">
            <label for="deskripsi">Deskripsi Acara</label>
            <textarea id="deskripsi" name="deskripsi" class="form-control" rows="4" required>{{ old('deskripsi') }}</textarea>
        </div>

        <!-- Tanggal Acara -->
        <div class="form-group">
            <label for="tanggalAcara">Tanggal Acara</label>
            <input type="date" id="tanggalAcara" name="tanggalAcara" class="form-control" value="{{ old('tanggalAcara') }}" required>
        </div>

        <!-- Gambar (Harus 3 Gambar) -->
        <div class="form-group">
            <label for="gambar">Foto Acara (Harus 3 Gambar)</label>
            <input type="file" id="gambar" name="gambar[]" class="form-control" accept="image/*" multiple required>
            <small class="text-muted">Pilih tepat 3 gambar untuk acara ini.</small>
        </div>

        <button type="submit" class="button">Simpan Acara</button>
    </form>

    <a href="{{ route('acara.index') }}" class="button back-btn">Kembali ke Daftar Acara</a>
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

        small.text-muted {
            font-size: 12px;
            color: #6c757d;
        }
    </style>
@endsection
