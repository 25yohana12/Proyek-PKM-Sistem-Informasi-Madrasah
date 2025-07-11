@extends('layouts.superadmin')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Tambah Data Guru</h2>
    
    <form action="{{ route('guru.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="mb-3">
            <label for="namaGuru" class="form-label">Nama Guru</label>
            <input type="text" class="form-control" id="namaGuru" name="namaGuru" required>
        </div>

        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar</label>
            <input type="file" class="form-control" id="gambar" name="gambar">
        </div>

        <div class="mb-3">
            <label for="nip" class="form-label">NIP</label>
            <input type="text" class="form-control" id="nip" name="nip" required>
        </div>

        <div class="mb-3">
            <label for="posisi" class="form-label">Posisi</label>
            <input type="text" class="form-control" id="posisi" name="posisi" required>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('data.guru') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
