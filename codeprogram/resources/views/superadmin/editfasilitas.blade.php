@extends('layouts.superadmin')

@section('title', 'Edit Fasilitas')

@section('content')
    <div class="header">Edit Fasilitas</div>

    <div class="form-container">
        <!-- Form Edit Fasilitas -->
        <form action="{{ route('fasilitas.update', $fasilitas->fasilitas_id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- Menandakan bahwa ini adalah permintaan PUT untuk update -->

            <!-- Kolom Nama Fasilitas -->
            <div class="form-group">
                <label for="namaFasilitas">Nama Fasilitas</label>
                <input type="text" id="namaFasilitas" name="namaFasilitas" class="form-control" value="{{ old('namaFasilitas', $fasilitas->namaFasilitas) }}" required>
            </div>

            <!-- Kolom Prasarana -->
            <div class="form-group">
                <label for="prasarana">Prasarana</label>
                <input type="text" id="prasarana" name="prasarana" class="form-control" value="{{ old('prasarana', $fasilitas->prasarana) }}" required>
            </div>

            <!-- Kolom Sarana -->
            <div class="form-group">
                <label for="sarana">Sarana</label>
                <input type="text" id="sarana" name="sarana" class="form-control" value="{{ old('sarana', $fasilitas->sarana) }}" required>
            </div>

            <!-- Kolom Jumlah Fasilitas -->
            <div class="form-group">
                <label for="jumlah">Jumlah Fasilitas</label>
                <input type="number" id="jumlah" name="jumlah" class="form-control" value="{{ old('jumlah', $fasilitas->jumlah) }}" required>
            </div>

            <!-- Kolom Gambar (Multiple) -->
            <div class="form-group">
                <label for="gambar">Foto (Multiple)</label>
                <input type="file" id="gambar" name="gambar[]" class="form-control" accept="image/*" multiple>

                <!-- Menampilkan gambar yang sudah ada -->
                @if($fasilitas->gambar)
                    <div class="existing-images mt-3">
                        <label>Gambar yang ada:</label>
                        @php
                            $images = json_decode($fasilitas->gambar); // Mengambil gambar yang sudah ada
                        @endphp
                        @foreach($images as $image)
                            <img src="{{ Storage::url($image) }}" alt="Existing Image" class="img-thumbnail" width="100">
                        @endforeach
                    </div>
                @endif
            </div>

            <!-- Tombol Simpan -->
            <button type="submit" class="button">Simpan Perubahan</button>
        </form>
    </div>
@endsection
