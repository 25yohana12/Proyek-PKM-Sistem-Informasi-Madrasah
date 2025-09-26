@extends('layouts.superadmin')

@section('content')
<div class="container py-4">
    <h2>Edit Data Sekolah</h2>

    <form action="{{ route('superadmin.sekolah.update', $sekolah->sekolah_id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="namaSekolah" class="form-label">Nama Sekolah</label>
            <input type="text" name="namaSekolah" id="namaSekolah" class="form-control" value="{{ old('namaSekolah', $sekolah->namaSekolah) }}" required>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" name="alamat" id="alamat" class="form-control" value="{{ old('alamat', $sekolah->alamat) }}" required>
        </div>
        <div class="mb-3">
            <label for="telepon" class="form-label">Telepon</label>
            <input type="text" name="telepon" id="telepon" class="form-control" value="{{ old('telepon', $sekolah->telepon) }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $sekolah->email) }}" required>
        </div>

        <div class="mb-3">
            <label for="instagram" class="form-label">Instagram</label>
            <input type="text" name="instagram" id="instagram" class="form-control" value="{{ old('instagram', $sekolah->instagram) }}">
        </div>

        <div class="mb-3">
            <label for="facebook" class="form-label">Facebook</label>
            <input type="text" name="facebook" id="facebook" class="form-control" value="{{ old('facebook', $sekolah->facebook) }}">
        </div>

        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
        <a href="{{ route('superadmin.sekolah.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection

