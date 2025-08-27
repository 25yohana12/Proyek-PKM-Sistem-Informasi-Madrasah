@extends('layouts.superadmin')

@section('title', 'Tambah Data Kelas')

@section('content')
<div class="page-container">
    <!-- Header -->
    <div class="page-header">
        <div class="header-content">
            <h1 class="page-title">
                <span class="emoji">➕</span> Tambah Data Kelas
            </h1>
            <p class="page-subtitle">Lengkapi informasi kelas baru pada form di bawah ini</p>
        </div>
    </div>

    <!-- Form Card -->
    <div class="content-card">
        <div class="card-body p-5">
            <form action="{{ route('superadmin.siswa.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label for="kelas" class="form-label fw-semibold">Nama Kelas</label>
                    <input type="text" name="kelas" id="kelas" class="form-control form-control-lg" placeholder="Contoh: IX-A" required>
                </div>

                <div class="mb-4">
                    <label for="namaWali" class="form-label fw-semibold">Wali Kelas</label>
                    <input type="text" name="namaWali" id="namaWali" class="form-control form-control-lg" placeholder="Nama wali kelas">
                </div>

                <div class="row">
                    <div class="col-md-4 mb-4">
                        <label for="jumlahMurid" class="form-label fw-semibold">Jumlah Murid</label>
                        <input type="number" name="jumlahMurid" id="jumlahMurid" 
                            class="form-control form-control-lg text-center" 
                            placeholder="0" min="0">
                    </div>
                    <div class="col-md-4 mb-4">
                        <label for="jumlahSiswa" class="form-label fw-semibold">Jumlah Siswa (Laki-laki)</label>
                        <input type="number" name="jumlahSiswa" id="jumlahSiswa" 
                            class="form-control form-control-lg text-center" 
                            placeholder="0" min="0">
                    </div>
                    <div class="col-md-4 mb-4">
                        <label for="jumlahSiswi" class="form-label fw-semibold">Jumlah Siswi (Perempuan)</label>
                        <input type="number" name="jumlahSiswi" id="jumlahSiswi" 
                            class="form-control form-control-lg text-center" 
                            placeholder="0" min="0">
                    </div>
                </div>

                <div class="mb-4">
                    <label for="gambar" class="form-label fw-semibold">Upload Gambar Kelas</label>
                    <input type="file" name="gambar" id="gambar" class="form-control form-control-lg" accept="image/*">
                </div>

                <div class="d-flex gap-3">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                    <a href="{{ route('superadmin.siswa.index') }}" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Batal
                    </a>
                </div>
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
        margin-bottom: 2rem;
        padding: 2rem;
        background: rgba(255, 255, 255, 0.95);
        border-radius: 20px;
        box-shadow: 0 20px 40px rgba(0,0,0,0.1);
    }
    .page-title {
        font-size: 2rem;
        font-weight: 800;
        background: linear-gradient(135deg, #6D8D79, #5a7466);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    .page-subtitle {
        color: #64748b;
        font-size: 1rem;
        margin: 0;
    }
    .content-card {
        background: #fff;
        border-radius: 20px;
        box-shadow: 0 15px 40px rgba(0,0,0,0.08);
    }
    .form-label {
        color: #374151;
    }
    .form-control-lg {
        border-radius: 12px;
        padding: 0.75rem 1rem;
        font-size: 1.1rem;
    }
    .btn-primary {
        background: linear-gradient(135deg, #6D8D79, #5a7466);
        border: none;
        border-radius: 10px;
        padding: 0.75rem 1.5rem;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(109,141,121,0.3);
    }
    .btn-secondary {
        border-radius: 10px;
        padding: 0.75rem 1.5rem;
        font-weight: 600;
    }
</style>
@endsection
