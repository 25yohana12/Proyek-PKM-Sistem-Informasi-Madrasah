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
@endsection
