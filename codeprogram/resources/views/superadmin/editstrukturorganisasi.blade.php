@extends('layouts.superadmin')
@section('title','Edit Struktur Organisasi')

@section('content')
<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h4 mb-0">Edit Struktur Organisasi</h1>
        <a href="{{ route('superadmin.strukturOrganisasi.index') }}" class="btn btn-secondary">‹ Kembali</a>
    </div>
     {{-- Tampilkan error validasi --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('strukturOrganisasi.update', $strukturOrganisasi) }}"
          method="POST" enctype="multipart/form-data"
          class="card shadow-sm p-4">
        @csrf @method('PUT')

        {{-- NAMA --}}
        <div class="mb-3">
            <label class="form-label">Nama Guru <span class="text-danger">*</span></label>
            <input name="namaGuru" value="{{ old('namaGuru', $strukturOrganisasi->namaGuru) }}"
                   class="form-control @error('namaGuru') is-invalid @enderror" required>
            @error('namaGuru')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        {{-- NIP --}}
        <div class="mb-3">
            <label class="form-label">NIP <span class="text-danger">*</span></label>
            <input name="nip" value="{{ old('nip', $strukturOrganisasi->nip) }}"
                   class="form-control @error('nip') is-invalid @enderror" required>
            @error('nip')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        {{-- JABATAN --}}
        <div class="mb-3">
            <label class="form-label">Jabatan <span class="text-danger">*</span></label>
            <select name="jabatan" class="form-select @error('jabatan') is-invalid @enderror" required>
                <option value="">— Pilih Jabatan —</option>
                @foreach ($opsiJabatan as $j)
                    <option value="{{ $j }}"
                        {{ old('jabatan', $strukturOrganisasi->jabatan) === $j ? 'selected' : '' }}>
                        {{ $j }}
                    </option>
                @endforeach
            </select>
            @error('jabatan')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        {{-- SUPERADMIN --}}
        <input type="hidden" name="superAdmin_id" value="{{ $strukturOrganisasi->superAdmin_id ?? 1 }}">

        {{-- FOTO --}}
        <div class="mb-3">
            <label class="form-label d-block">Foto Saat Ini</label>
            <img src="{{ asset('storage/'.$strukturOrganisasi->gambar) }}"
                 class="img-thumbnail mb-2" style="max-height:120px">
            <label class="form-label">Ganti Foto (opsional)</label>
            <input type="file" name="gambar" accept="image/*"
                   class="form-control @error('gambar') is-invalid @enderror">
            @error('gambar')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <button class="btn btn-primary">Perbarui</button>
    </form>
</div>
@endsection
