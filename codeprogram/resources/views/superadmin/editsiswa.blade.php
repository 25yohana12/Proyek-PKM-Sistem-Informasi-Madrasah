@extends('layouts.superadmin')

@section('content')
<div class="container py-4">
    <h2>Edit Data Kelas</h2>

    <form action="{{ route('siswa.update', $siswa->siswa_id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="kelas" class="form-label">Nama Kelas</label>
            <input type="text" name="kelas" id="kelas" class="form-control" value="{{ $siswa->kelas }}" required>
        </div>

        <div class="mb-3">
            <label for="namaWali" class="form-label">Wali Kelas</label>
            <input type="text" name="namaWali" id="namaWali" class="form-control" value="{{ $siswa->namaWali }}">
        </div>

        <div class="mb-3">
            <label for="jumlahMurid" class="form-label">Jumlah Murid</label>
            <input type="number" name="jumlahMurid" id="jumlahMurid" class="form-control" value="{{ $siswa->jumlahMurid }}">
        </div>

        <div class="mb-3">
            <label for="jumlahSiswa" class="form-label">Jumlah Siswa</label>
            <input type="number" name="jumlahSiswa" id="jumlahSiswa" class="form-control" value="{{ $siswa->jumlahSiswa }}">
        </div>

        <div class="mb-3">
            <label for="jumlahSiswi" class="form-label">Jumlah Siswi</label>
            <input type="number" name="jumlahSiswi" id="jumlahSiswi" class="form-control" value="{{ $siswa->jumlahSiswi }}">
        </div>

        <div class="mb-3">
            <label for="gambar" class="form-label">Upload Gambar Baru (Opsional)</label>
            <input type="file" name="gambar" id="gambar" class="form-control" accept="image/*">
        </div>

        @if($siswa->gambar)
            <div class="mb-3">
                <label class="form-label">Gambar Saat Ini:</label><br>
                <img src="{{ asset('storage/' . $siswa->gambar) }}" alt="gambar" width="200" style="border-radius: 5px;">
            </div>
        @endif

        <button type="submit" class="btn btn-primary">Perbarui</button>
        <a href="{{ route('siswa.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
