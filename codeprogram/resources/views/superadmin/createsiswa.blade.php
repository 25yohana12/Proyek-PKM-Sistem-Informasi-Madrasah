@extends('layouts.superadmin')

@section('content')
<div class="container py-4">
    <h2>Tambah Data Kelas</h2>

    <form action="{{ route('siswa.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="kelas" class="form-label">Nama Kelas</label>
            <input type="text" name="kelas" id="kelas" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="namaWali" class="form-label">Wali Kelas</label>
            <input type="text" name="namaWali" id="namaWali" class="form-control">
        </div>

        <div class="mb-3">
            <label for="jumlahMurid" class="form-label">Jumlah Murid</label>
            <input type="number" name="jumlahMurid" id="jumlahMurid" class="form-control">
        </div>

        <div class="mb-3">
            <label for="jumlahSiswa" class="form-label">Jumlah Siswa (Laki-laki)</label>
            <input type="number" name="jumlahSiswa" id="jumlahSiswa" class="form-control">
        </div>

        <div class="mb-3">
            <label for="jumlahSiswi" class="form-label">Jumlah Siswi (Perempuan)</label>
            <input type="number" name="jumlahSiswi" id="jumlahSiswi" class="form-control">
        </div>

        <div class="mb-3">
            <label for="gambar" class="form-label">Upload Gambar Kelas</label>
            <input type="file" name="gambar" id="gambar" class="form-control" accept="image/*">
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('siswa.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
