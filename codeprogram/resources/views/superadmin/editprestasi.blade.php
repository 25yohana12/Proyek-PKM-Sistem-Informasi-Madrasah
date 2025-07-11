@extends('layouts.superadmin')

@section('title', 'Edit Prestasi')

@section('header', 'Edit Prestasi')

@section('content')
    <div class="container">
        <!-- Form untuk mengedit prestasi -->
        <form action="{{ route('prestasi.update', $prestasi->prestasi_id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- Method spoofing untuk PUT request -->

            <!-- Inputan Nama Prestasi -->
            <div class="form-group">
                <label for="nama">Nama Prestasi</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $prestasi->nama) }}" required>
            </div>

            <!-- Inputan Judul Prestasi -->
            <div class="form-group">
                <label for="judul">Judul Prestasi</label>
                <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul', $prestasi->judul) }}" required>
            </div>

            <!-- Inputan Deskripsi Prestasi -->
            <div class="form-group">
                <label for="deskripsi">Deskripsi Prestasi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" required>{{ old('deskripsi', $prestasi->deskripsi) }}</textarea>
            </div>

            <!-- Inputan Penghargaan -->
            <div class="form-group">
                <label for="penghargaan">Penghargaan</label>
                <input type="text" class="form-control" id="penghargaan" name="penghargaan" value="{{ old('penghargaan', $prestasi->penghargaan) }}" required>
            </div>

            <!-- Inputan Gambar Prestasi (Multiple File Upload) -->
            <div class="form-group">
                <label for="gambar">Gambar Prestasi</label>
                <input type="file" class="form-control" id="gambar" name="gambar[]" multiple>
                <small class="form-text text-muted">Pilih gambar baru jika ingin mengganti</small>

                <!-- Menampilkan gambar yang sudah ada -->
                <div class="mt-2">
                    <h5>Gambar Saat Ini:</h5>
                    @foreach (json_decode($prestasi->gambar) as $gambar)
                        <img src="{{ Storage::url($gambar) }}" alt="Foto Prestasi" width="100">
                    @endforeach
                </div>
            </div>

            <!-- Tombol Update -->
            <button type="submit" class="btn btn-primary mt-3">Update Prestasi</button>
        </form>
    </div>
@endsection
