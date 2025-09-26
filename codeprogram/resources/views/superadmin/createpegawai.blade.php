@extends('layouts.superadmin') 
@section('title', 'Tambah Data Guru')

@section('content')
<div class="page-container">
    <!-- Header -->
    <div class="page-header">
        <div class="header-content">
            <h1 class="page-title">
                <span class="emoji">➕</span> Tambah Data Guru
            </h1>
            <p class="page-subtitle">Lengkapi form berikut untuk menambahkan guru baru</p>
        </div>
        <a href="{{ route('superadmin.pegawai.index') }}" class="btn btn-secondary">
            ← Kembali
        </a>
    </div>

    <!-- Form Card -->
    <div class="content-card modern-form">
        <div class="card-body">
            <form action="{{ route('superadmin.pegawai.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <!-- Nama Guru -->
                <div class="mb-3">
                    <label for="namaGuru" class="form-label fw-semibold">Nama Guru</label>
                    <input type="text" class="form-control @error('namaGuru') is-invalid @enderror" 
                           id="namaGuru" name="namaGuru" value="{{ old('namaGuru') }}" required>
                    @error('namaGuru')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Foto -->
                <div class="mb-3">
                    <label for="gambar" class="form-label fw-semibold">Foto Guru</label>
                    <input type="file" class="form-control @error('gambar') is-invalid @enderror" 
                           id="gambar" name="gambar" accept="image/*" onchange="previewImage(event)">
                    @error('gambar')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <div class="mt-2">
                        <img id="img-preview" src="#" alt="Preview" 
                             style="display:none;max-width:140px;border-radius:12px;box-shadow:0 2px 8px rgba(0,0,0,0.08);">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="posisi" class="form-label fw-semibold">Jabatan</label>
                    <input type="text" class="form-control @error('posisi') is-invalid @enderror" 
                           id="posisi" name="posisi" value="{{ old('posisi') }}" required>
                    @error('posisi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Deskripsi -->
                <!-- <div class="mb-3">
                    <label for="deskripsi" class="form-label fw-semibold">Deskripsi</label>
                    <textarea class="form-control @error('deskripsi') is-invalid @enderror" 
                              id="deskripsi" name="deskripsi" rows="3" required>{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div> -->

                <!-- Buttons -->
                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="{{ route('superadmin.pegawai.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    .page-container {
        padding: 2rem;
        background: linear-gradient(135deg, #6D8D79 0%, #5a7466 100%);
        min-height: 100vh;
    }

    .page-header {
        margin-bottom: 1.5rem;
        padding: 1.5rem 2rem;
        background: rgba(255, 255, 255, 0.95);
        border-radius: 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: 0 20px 40px rgba(0,0,0,0.1);
    }

    .page-title {
        font-size: 1.75rem;
        font-weight: 800;
        margin: 0;
        background: linear-gradient(135deg, #6D8D79, #5a7466);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .page-subtitle {
        font-size: 0.95rem;
        color: #64748b;
        margin-top: 0.25rem;
    }

    .content-card {
        background: #fff;
        border-radius: 20px;
        box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        padding: 2rem;
        margin: 0 auto;
    }

    .form-label {
        color: #2d3748;
        font-size: 1rem;
        font-weight: 600;
    }

    .form-control {
        border-radius: 10px;
        border: 1px solid #e2e8f0;
        font-size: 1rem;
        background: #f8fafc;
        transition: border-color 0.2s, box-shadow 0.2s;
    }

    .form-control:focus {
        border-color: #6D8D79;
        background: #fff;
        box-shadow: 0 2px 8px rgba(109,141,121,0.15);
    }

    .invalid-feedback {
        font-size: 0.9rem;
    }

    .btn {
        border-radius: 10px;
        font-size: 1rem;
        font-weight: 600;
        padding: 0.6rem 1.2rem;
        transition: all 0.2s ease-in-out;
    }

    .btn-success {
        background: linear-gradient(135deg, #6D8D79, #5a7466);
        border: none;
        color: #fff;
        box-shadow: 0 4px 10px rgba(109,141,121,0.25);
    }
    .btn-success:hover {
        transform: translateY(-2px);
        background: linear-gradient(135deg, #5a7466, #6D8D79);
    }

    .btn-secondary {
        background: #64748b;
        border: none;
        color: #fff;
    }
    .btn-secondary:hover {
        background: #475569;
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
