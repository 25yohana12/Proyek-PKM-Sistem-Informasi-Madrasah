@extends('layouts.superadmin')

@section('content')
<style>
    .card {
        background-color: white;
        padding: 2rem;
        border-radius: 1rem;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
        width: 100%;
        margin: auto;
    }

    .title {
        font-size: 1.5rem;
        font-weight: bold;
        color: #2d3748;
        margin-bottom: 1.5rem;
    }

    .form-group {
        margin-bottom: 1.25rem;
    }

    .form-label {
        font-weight: 600;
        color: #4a5568;
        margin-bottom: 0.5rem;
    }

    .form-value {
        padding: 0.75rem;
        border: 1px solid #e2e8f0;
        border-radius: 0.5rem;
        background-color: #f7fafc;
    }

    .btn-edit {
        background-color: #4a90e2;
        color: white;
        padding: 0.75rem 1.5rem;
        border-radius: 0.75rem;
        font-weight: 600;
        transition: background-color 0.2s ease;
        text-decoration: none;
        display: inline-block;
        margin-top: 1.5rem;
        cursor: pointer;
    }

    .btn-edit:hover {
        background-color: #357ab8;
    }
</style>

<div class="card">
    <div class="title">Data Sekolah</div>

    <div class="form-group">
        <div class="form-label">Nama Sekolah</div>
        <div class="form-value">{{ $sekolah->namaSekolah ?? 'Belum Diisi' }}</div>
    </div>

    <div class="form-group">
        <div class="form-label">Alamat</div>
        <div class="form-value">{{ $sekolah->alamat ?? 'Belum Diisi' }}</div>
    </div>

    <div class="form-group">
        <div class="form-label">Telepon</div>
        <div class="form-value">{{ $sekolah->telepon ?? 'Belum Diisi' }}</div>
    </div>

    <div class="form-group">
        <div class="form-label">Email</div>
        <div class="form-value">{{ $sekolah->email ?? 'Belum Diisi' }}</div>
    </div>

    <div class="form-group">
        <div class="form-label">Instagram</div>
        <div class="form-value">{{ $sekolah->instagram ?? 'Belum Diisi' }}</div>
    </div>

    <div class="form-group">
        <div class="form-label">Facebook</div>
        <div class="form-value">{{ $sekolah->facebook ?? 'Belum Diisi' }}</div>
    </div>

    {{-- Tombol Edit --}}
    <a href="{{ route('superadmin.sekolah.edit', $sekolah->sekolah_id) }}" class="btn-edit">Edit Data</a>
</div>
@endsection
