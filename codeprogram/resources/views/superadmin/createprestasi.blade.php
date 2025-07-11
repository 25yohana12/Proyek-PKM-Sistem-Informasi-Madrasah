@extends('layouts.superadmin')

@section('title', 'Tambah Prestasi')

@section('header', 'Tambah Prestasi')

@section('content')
    <div class="container">
        <!-- Form untuk menambahkan prestasi -->
        <form action="{{ route('prestasi.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Inputan Nama Prestasi -->
            <div class="form-group">
                <label for="nama">Nama Prestasi</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>

            <!-- Inputan Judul Prestasi -->
            <div class="form-group">
                <label for="judul">Judul Prestasi</label>
                <input type="text" class="form-control" id="judul" name="judul" required>
            </div>

            <!-- Inputan Deskripsi Prestasi -->
            <div class="form-group">
                <label for="deskripsi">Deskripsi Prestasi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" required></textarea>
            </div>

            <!-- Inputan Penghargaan -->
            <div class="form-group">
                <label for="penghargaan">Penghargaan</label>
                <input type="text" class="form-control" id="penghargaan" name="penghargaan" required>
            </div>

            <!-- Inputan Gambar Prestasi (Multiple File Upload) -->
            <div class="form-group">
                <label for="gambar">Gambar Prestasi</label>
                <input type="file" class="form-control" id="gambar" name="gambar[]" multiple>
                <small class="form-text text-muted">Pilih lebih dari satu gambar jika diperlukan</small>
            </div>

            <!-- Tombol Simpan -->
            <button type="submit" class="btn btn-primary mt-3">Simpan Prestasi</button>
        </form>
    </div>
@endsection
