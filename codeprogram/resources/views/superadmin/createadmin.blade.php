@extends('layouts.superadmin')

@section('title', 'Tambah Admin')

@section('content')
<div class="page-container">
    <!-- Header -->
    <div class="page-header">
        <div class="header-content">
            <h1 class="page-title">
                <span class="emoji">➕</span> Tambah Admin
            </h1>
            <p class="page-subtitle">Lengkapi data admin baru untuk sistem pendaftaran</p>
        </div>
    </div>

    <!-- Form Card -->
    <div class="content-card">
        <div class="card-body">
            <form action="{{ route('superadmin.admin.store') }}" method="POST" enctype="multipart/form-data" class="form-container">
                @csrf
                <div class="form-group">
                    <label for="namaAdmin">Nama Admin</label>
                    <input type="text" id="namaAdmin" name="namaAdmin" value="{{ old('namaAdmin') }}" required>
                </div>

                <div class="form-group">
                    <label for="nip">NIP</label>
                    <input type="text" id="nip" name="nip" value="{{ old('nip') }}" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                </div>

                <div class="form-group">
                    <label for="sandi">Kata Sandi</label>
                    <input type="password" id="sandi" name="sandi" required>
                </div>

                <div class="form-group">
                    <label for="profil">Profil Admin</label>
                    <input type="file" id="profil" name="profil" required>
                </div>

                <!-- Hidden input role_id -->
                <input type="hidden" name="role_id" value="2">

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                </div>
            </form>

            @if($errors->any())
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-circle"></i> Terdapat kesalahan:
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>- {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    /* Page container */
    .page-container {
        padding: 2rem;
        background: linear-gradient(135deg, #6D8D79 0%, #5a7466 100%);
        min-height: 100vh;
    }

    /* Header */
    .page-header {
        margin-bottom: 2rem;
        padding: 2rem;
        background: rgba(255, 255, 255, 0.95);
        border-radius: 20px;
        box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        backdrop-filter: blur(10px);
    }

    .page-title {
        font-size: 2rem;
        font-weight: 800;
        margin: 0 0 0.5rem;
        background: linear-gradient(135deg, #6D8D79, #5a7466);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .page-subtitle {
        font-size: 1rem;
        color: #64748b;
        margin: 0;
    }

    /* Card */
    .content-card {
        background: white;
        border-radius: 20px;
        box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        padding: 2rem;
        margin: auto;
    }

    .card-body {
        width: 100%;
    }

    /* Form */
    .form-container {
        display: flex;
        flex-direction: column;
        gap: 1.25rem;
    }

    .form-group {
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
    }

    label {
        font-size: 0.9rem;
        font-weight: 600;
        color: #374151;
    }

    input {
        padding: 0.75rem 1rem;
        border: 1px solid #d1d5db;
        border-radius: 10px;
        font-size: 0.95rem;
        transition: all 0.3s;
    }

    input:focus {
        outline: none;
        border-color: #6D8D79;
        box-shadow: 0 0 0 3px rgba(109,141,121,0.2);
    }

    input[type="file"] {
        padding: 0.5rem;
    }

    /* Button */
    .btn {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.75rem 1.5rem;
        border-radius: 10px;
        font-weight: 600;
        border: none;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .btn-primary {
        background: linear-gradient(135deg, #6D8D79, #5a7466);
        color: white;
        box-shadow: 0 4px 15px rgba(109,141,121,0.3);
        justify-content: center;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(109,141,121,0.4);
    }

    /* Errors */
    .alert {
        margin-top: 1.5rem;
        padding: 1rem 1.25rem;
        border-radius: 12px;
        font-size: 0.95rem;
    }

    .alert-danger {
        background: linear-gradient(135deg, #ef4444, #991b1b);
        color: white;
    }

    .alert-danger ul {
        margin: 0.5rem 0 0;
        padding-left: 1.25rem;
    }
</style>
@endsection
