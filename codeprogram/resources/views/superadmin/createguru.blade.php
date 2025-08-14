@extends('layouts.superadmin')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4 fw-bold" style="letter-spacing:1px;">Tambah Data Guru</h2>
    
    <form action="{{ route('superadmin.guru.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="mb-3">
            <label for="namaGuru" class="form-label fw-semibold">Nama Guru</label>
            <input type="text" class="form-control @error('namaGuru') is-invalid @enderror" id="namaGuru" name="namaGuru" value="{{ old('namaGuru') }}" required>
            @error('namaGuru')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="gambar" class="form-label fw-semibold">Foto Guru</label>
            <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="gambar" name="gambar" accept="image/*" onchange="previewImage(event)">
            @error('gambar')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <div class="mt-2">
                <img id="img-preview" src="#" alt="Preview" style="display:none;max-width:120px;border-radius:12px;box-shadow:0 2px 8px rgba(0,0,0,0.08);">
            </div>
        </div>

        <div class="mb-3">
            <label for="nip" class="form-label fw-semibold">NIP</label>
            <input type="text" class="form-control @error('nip') is-invalid @enderror" id="nip" name="nip" value="{{ old('nip') }}" required>
            @error('nip')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="posisi" class="form-label fw-semibold">Posisi</label>
            <input type="text" class="form-control @error('posisi') is-invalid @enderror" id="posisi" name="posisi" value="{{ old('posisi') }}" required>
            @error('posisi')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label fw-semibold">Deskripsi</label>
            <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="3" required>{{ old('deskripsi') }}</textarea>
            @error('deskripsi')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('superadmin.guru.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<style>
    .modern-form {
        max-width: 500px;
        margin: 0 auto;
        background: #fff;
        border-radius: 18px;
        box-shadow: 0 8px 32px rgba(109,141,121,0.10);
    }
    .modern-form label {
        color: #2d3748;
        font-size: 1rem;
    }
    .modern-form input, .modern-form textarea {
        border-radius: 10px;
        border: 1px solid #e2e8f0;
        font-size: 1rem;
        background: #f8fafc;
        transition: border-color 0.2s;
    }
    .modern-form input:focus, .modern-form textarea:focus {
        border-color: #6D8D79;
        background: #fff;
        box-shadow: 0 2px 8px rgba(109,141,121,0.08);
    }
    .modern-form .invalid-feedback {
        font-size: 0.95em;
    }
    .modern-form .btn {
        border-radius: 10px;
        font-size: 1rem;
    }
    .modern-form .btn-success {
        background: linear-gradient(135deg, #6D8D79, #5a7466);
        border: none;
    }
    .modern-form .btn-success:hover {
        background: linear-gradient(135deg, #5a7466, #6D8D79);
    }
    .modern-form .btn-secondary {
        background: #64748b;
        border: none;
    }
    .modern-form .btn-secondary:hover {
        background: #475569;
    }
    @media (max-width: 600px) {
        .modern-form { padding: 1rem; }
    }
</style>
@endsection

@section('scripts')
<script>
function previewImage(event) {
    const input = event.target;
    const preview = document.getElementById('img-preview');
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
        }
        reader.readAsDataURL(input.files[0]);
    } else {
        preview.src = '#';
        preview.style.display = 'none';
    }
}
</script>
@endsection