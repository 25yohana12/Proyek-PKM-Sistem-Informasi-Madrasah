@extends('layouts.superadmin')

@section('content')
<div class="container py-4">
    <h2>Edit Informasi Pendaftaran</h2>

    <form action="{{ route('informasi.update', $informasi->informasi_id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Tahun Ajaran</label>
            <input type="text" name="tahunAjaran" class="form-control" value="{{ old('tahunAjaran', $informasi->tahunAjaran) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal Pendaftaran</label>
            <input type="date" name="tanggalPendaftaran" class="form-control" value="{{ old('tanggalPendaftaran', $informasi->tanggalPendaftaran) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal Pengumuman</label>
            <input type="date" name="tanggalPengumuman" class="form-control" value="{{ old('tanggalPengumuman', $informasi->tanggalPengumuman) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal Penutupan</label>
            <input type="date" name="tanggalPenutupan" class="form-control" value="{{ old('tanggalPenutupan', $informasi->tanggalPenutupan) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Jumlah Siswa</label>
            <input type="number" name="jumlahSiswa" class="form-control" value="{{ old('jumlahSiswa', $informasi->jumlahSiswa) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Pengumuman</label>
            <textarea name="pengumuman" class="form-control" rows="4">{{ old('pengumuman', $informasi->pengumuman) }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('informasi.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
