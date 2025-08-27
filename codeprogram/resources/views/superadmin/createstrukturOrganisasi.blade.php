@extends('layouts.superadmin')
@section('title','Tambah Struktur Organisasi')

@section('content')
<div class="page-container">
    <!-- Header -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Tambah Struktur Organisasi</h1>
            <p class="page-subtitle">Isi data guru dan jabatan untuk struktur organisasi sekolah</p>
        </div>
        <a href="{{ route('superadmin.strukturorganisasi.index') }}" class="btn btn-secondary">‹ Kembali</a>
    </div>

    <!-- Form -->
    <form action="{{ route('superadmin.strukturorganisasi.store') }}"
          method="POST" enctype="multipart/form-data"
          class="content-card">
        @csrf

        {{-- NAMA --}}
        <div class="form-group">
            <label>Nama Guru <span class="text-danger">*</span></label>
            <input name="namaGuru" value="{{ old('namaGuru') }}"
                   class="form-control @error('namaGuru') is-invalid @enderror" required>
            @error('namaGuru')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        {{-- NIP --}}
        <div class="form-group">
            <label>NIP <span class="text-danger">*</span></label>
            <input name="nip" value="{{ old('nip') }}"
                   class="form-control @error('nip') is-invalid @enderror" required>
            @error('nip')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        {{-- JABATAN --}}
        <div class="form-group">
            <label>Jabatan <span class="text-danger">*</span></label>
            <select name="jabatan" class="form-select @error('jabatan') is-invalid @enderror" required>
                <option value="">— Pilih Jabatan —</option>
                @foreach ($opsiJabatan as $j)
                    <option value="{{ $j }}" {{ old('jabatan') === $j ? 'selected' : '' }}>{{ $j }}</option>
                @endforeach
            </select>
            @error('jabatan')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        {{-- SUPERADMIN --}}
        <input type="hidden" name="superAdmin_id" value="1">

        {{-- GAMBAR --}}
        <div class="form-group">
            <label>Foto <span class="text-danger">*</span></label>
            <input type="file" name="gambar" accept="image/*"
                   class="form-control @error('gambar') is-invalid @enderror" required>
            <small class="text-muted">Format jpg/png, maks 2 MB</small>
            @error('gambar')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="form-actions">
            <button class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>
@endsection

@section('styles')
<style>
    /* Background */
    .page-container {
        padding: 2rem;
        background: linear-gradient(135deg, #6D8D79 0%, #5a7466 100%);
        min-height: 100vh;
    }

    /* Header */
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
        font-size: 1.5rem;
        font-weight: 800;
        margin: 0;
        background: linear-gradient(135deg, #6D8D79, #5a7466);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .page-subtitle {
        font-size: 0.9rem;
        color: #64748b;
        margin-top: 0.25rem;
    }

    /* Card form */
    .content-card {
        background: white;
        border-radius: 20px;
        box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        padding: 2rem;
        margin: 0 auto;
    }

    /* Form group */
    .form-group {
        margin-bottom: 1.25rem;
    }

    label {
        font-weight: 600;
        margin-bottom: 0.5rem;
        display: block;
    }

    .form-control, .form-select {
        border-radius: 12px;
        padding: 0.6rem 0.9rem;
        border: 1px solid #d1d5db;
        width: 100%;
    }

    .form-control:focus, .form-select:focus {
        border-color: #6D8D79;
        box-shadow: 0 0 0 3px rgba(109,141,121,0.25);
    }

    small.text-muted {
        font-size: 0.8rem;
        color: #6b7280;
    }

    /* Buttons */
    .btn {
        padding: 0.6rem 1.5rem;
        border-radius: 12px;
        font-weight: 600;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
    }

    .btn-primary {
        background: linear-gradient(135deg, #6D8D79, #5a7466);
        color: white;
    }
    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(109,141,121,0.35);
    }

    .btn-secondary {
        background: #e5e7eb;
        color: #374151;
    }
    .btn-secondary:hover {
        background: #d1d5db;
    }

    .form-actions {
        text-align: right;
        margin-top: 1.5rem;
    }

    .invalid-feedback {
        font-size: 0.85rem;
        color: #ef4444;
    }
</style>
@endsection
