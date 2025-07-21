<!-- resources/views/guru/edit.blade.php -->

@extends('layouts.superadmin')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Edit Data Guru</h2>
    
    <form action="{{ route('guru.update', $guru->guru_id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="namaGuru" class="form-label">Nama Guru</label>
            <input type="text" class="form-control" id="namaGuru" name="namaGuru" value="{{ $guru->namaGuru }}" required>
        </div>

        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar</label>
            <input type="file" class="form-control" id="gambar" name="gambar">
            <img src="{{ asset('storage/'.$guru->gambar) }}" alt="Image" class="mt-2" style="width: 100px;">
        </div>

        <div class="mb-3">
            <label for="nip" class="form-label">NIP</label>
            <input type="text" class="form-control" id="nip" name="nip" value="{{ $guru->nip }}" required>
        </div>

        <div class="mb-3">
            <label for="posisi" class="form-label">Posisi</label>
            <input type="text" class="form-control" id="posisi" name="posisi" value="{{ $guru->posisi }}" required>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required>{{ $guru->deskripsi }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Perbarui</button>
        <a href="{{ route('data.guru') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<style>
        /* Style untuk seluruh form */
        form {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 800px;
            margin: 20px auto;
        }

        /* Styling untuk judul */
        h1 {
            font-size: 24px;
            font-weight: 600;
            color: #333;
            margin-bottom: 20px;
        }

        /* Styling untuk setiap input field */
        .input-field {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
        }

        /* Styling untuk label input field */
        label {
            font-size: 14px;
            color: #555;
            margin-bottom: 8px;
            display: block;
        }

        /* Button submit */
        button {
            background-color: #38a169; /* green */
            color: #fff;
            padding: 10px 20px;
            border-radius: 6px;
            border: none;
            cursor: pointer;
            font-size: 14px;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #2f855a;
        }

        /* Styling untuk input file */
        input[type="file"] {
            padding: 6px;
            margin-top: 5px;
        }

        /* Tambahan untuk input hidden */
        input[type="hidden"] {
            display: none;
        }

        /* Styling untuk row button tambah admin */
        .tambah-admin-btn {
            background-color: #48bb78;
            color: #fff;
            padding: 8px 16px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 14px;
            display: inline-block;
            margin-bottom: 20px;
        }

        .tambah-admin-btn:hover {
            background-color: #38a169;
        }

        /* Styling untuk pesan error */
        .bg-red-500 {
            background-color: #f56565;
            color: white;
            padding: 15px;
            border-radius: 5px;
            margin-top: 10px;
        }

        ul {
            list-style: none;
            padding-left: 0;
        }

        li {
            font-size: 14px;
            margin-bottom: 5px;
        }
    </style>
@endsection
