@extends('layouts.superadmin')
@section('title','Tambah Struktur Organisasi')

@section('content')
<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h4 mb-0">Tambah Struktur Organisasi</h1>
        <a href="{{ route('strukturOrganisasi.index') }}" class="btn btn-secondary">‹ Kembali</a>
    </div>

    <form action="{{ route('strukturOrganisasi.store') }}"
          method="POST" enctype="multipart/form-data"
          class="card shadow-sm p-4">
        @csrf

        {{-- NAMA --}}
        <div class="mb-3">
            <label class="form-label">Nama Guru <span class="text-danger">*</span></label>
            <input name="namaGuru" value="{{ old('namaGuru') }}"
                   class="form-control @error('namaGuru') is-invalid @enderror" required>
            @error('namaGuru')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        {{-- NIP --}}
        <div class="mb-3">
            <label class="form-label">NIP <span class="text-danger">*</span></label>
            <input name="nip" value="{{ old('nip') }}"
                   class="form-control @error('nip') is-invalid @enderror" required>
            @error('nip')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        {{-- JABATAN --}}
        <div class="mb-3">
            <label class="form-label">Jabatan <span class="text-danger">*</span></label>
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
        <div class="mb-3">
            <label class="form-label">Foto <span class="text-danger">*</span></label>
            <input type="file" name="gambar" accept="image/*"
                   class="form-control @error('gambar') is-invalid @enderror" required>
            <small class="text-muted">jpg/png maks 2 MB</small>
            @error('gambar')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <button class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
