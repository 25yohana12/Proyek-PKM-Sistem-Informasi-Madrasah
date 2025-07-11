@extends('layouts.superadmin')

@section('title', 'Tambah Fasilitas')

@section('content')
    <div class="header">Tambah Fasilitas</div>

    <div class="form-container">
        <form action="{{ route('fasilitas.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Kolom Nama Fasilitas -->
            <div class="form-group">
                <label for="namaFasilitas">Nama Fasilitas</label>
                <input type="text" id="namaFasilitas" name="namaFasilitas" class="form-control" value="{{ old('namaFasilitas') }}" required>
            </div>

            <!-- Kolom Prasarana -->
            <div class="form-group">
                <label for="prasarana">Prasarana</label>
                <input type="text" id="prasarana" name="prasarana" class="form-control" value="{{ old('prasarana') }}" required>
            </div>

            <!-- Kolom Sarana -->
            <div class="form-group">
                <label for="sarana">Sarana</label>
                <input type="text" id="sarana" name="sarana" class="form-control" value="{{ old('sarana') }}" required>
            </div>

            <!-- Kolom Jumlah Fasilitas -->
            <div class="form-group">
                <label for="jumlah">Jumlah Fasilitas</label>
                <input type="number" id="jumlah" name="jumlah" class="form-control" value="{{ old('jumlah') }}" required>
            </div>

            <!-- Kolom Gambar (Multiple) -->
            <div class="form-group">
                <label for="gambar">Foto (Multiple)</label>
                <input type="file" id="gambar" name="gambar[]" class="form-control" accept="image/*" multiple>
            </div>

            <button type="submit" class="button">Simpan Fasilitas</button>
        </form>
    </div>
@endsection
