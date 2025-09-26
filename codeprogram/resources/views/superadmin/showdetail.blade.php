@extends('layouts.superadmin')

@section('title', 'Detail Pendaftar')

@section('content')
<div class="page-container">
    <!-- Header Section -->
    <div class="page-header">
        <div class="header-content">
            <h1 class="page-title">
                <span class="emoji">👤</span> Detail Pendaftar
            </h1>
            <p class="page-subtitle">Informasi lengkap data pendaftar siswa baru</p>
        </div>
        <div class="header-actions">
            <a href="{{ route('superadmin.pendaftaran.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i>
                <span>Kembali</span>
            </a>
        </div>
    </div>

    <!-- Content Card -->
    <div class="content-card">
        <div class="card-header">
            <h2 class="card-title">
                <i class="fas fa-user-graduate"></i>
                Informasi Pendaftar
            </h2>
            <div class="status-badge">
                <span class="badge badge-{{ $pendaftar->status_pendaftaran == 'diterima' ? 'success' : ($pendaftar->status_pendaftaran == 'ditolak' ? 'danger' : 'warning') }}">
                    {{ ucfirst($pendaftar->status_pendaftaran ?? 'Pending') }}
                </span>
            </div>
        </div>

        <div class="card-body">
            <!-- Data Pribadi -->
            <div class="info-section">
                <h3 class="section-title">
                    <i class="fas fa-user"></i>
                    Data Pribadi
                </h3>
                <div class="info-grid">
                    <div class="info-item">
                        <label>Nama Lengkap</label>
                        <div class="info-value">{{ $pendaftar->namaPendaftar ?? 'Tidak ada data' }}</div>
                    </div>
                    <div class="info-item">
                        <label>NISN</label>
                        <div class="info-value">{{ $pendaftar->nisn ?? 'Tidak ada data' }}</div>
                    </div>
                    <div class="info-item">
                        <label>NIK</label>
                        <div class="info-value">{{ $pendaftar->nik ?? 'Tidak ada data' }}</div>
                    </div>
                    <div class="info-item">
                        <label>Tempat, Tanggal Lahir</label>
                        <div class="info-value">
                            {{ $pendaftar->tempatLahir ?? 'Tidak ada data' }}, 
                            {{ $pendaftar->tanggalLahir ? \Carbon\Carbon::parse($pendaftar->tanggalLahir)->format('d F Y') : 'Tidak ada data' }}
                        </div>
                    </div>
                    <div class="info-item">
                        <label>Jenis Kelamin</label>
                        <div class="info-value">{{ $pendaftar->jenisKelamin ?? 'Tidak ada data' }}</div>
                    </div>
                    <div class="info-item">
                        <label>Agama</label>
                        <div class="info-value">{{ $pendaftar->agama ?? 'Tidak ada data' }}</div>
                    </div>
                </div>
            </div>

            <!-- Data Keluarga -->
            <div class="info-section">
                <h3 class="section-title">
                    <i class="fas fa-users"></i>
                    Data Keluarga
                </h3>
                <div class="info-grid">
                    <div class="info-item">
                        <label>Nama Ayah</label>
                        <div class="info-value">{{ $pendaftar->namaAyah ?? 'Tidak ada data' }}</div>
                    </div>
                    <div class="info-item">
                        <label>Pekerjaan Ayah</label>
                        <div class="info-value">{{ $pendaftar->pekerjaanAyah ?? 'Tidak ada data' }}</div>
                    </div>
                    <div class="info-item">
                        <label>Nama Ibu</label>
                        <div class="info-value">{{ $pendaftar->namaIbu ?? 'Tidak ada data' }}</div>
                    </div>
                    <div class="info-item">
                        <label>Pekerjaan Ibu</label>
                        <div class="info-value">{{ $pendaftar->pekerjaanIbu ?? 'Tidak ada data' }}</div>
                    </div>
                    <div class="info-item">
                        <label>Nama Wali</label>
                        <div class="info-value">{{ $pendaftar->namaWali ?? 'Tidak ada data' }}</div>
                    </div>
                    <div class="info-item">
                        <label>Telepon</label>
                        <div class="info-value">{{ $pendaftar->telepon ?? 'Tidak ada data' }}</div>
                    </div>
                </div>
            </div>

            <!-- Alamat -->
            <div class="info-section">
                <h3 class="section-title">
                    <i class="fas fa-map-marker-alt"></i>
                    Alamat
                </h3>
                <div class="info-grid">
                    <div class="info-item full-width">
                        <label>Alamat Lengkap</label>
                        <div class="info-value">{{ $pendaftar->alamat ?? 'Tidak ada data' }}</div>
                    </div>
                    <div class="info-item">
                        <label>Provinsi</label>
                        <div class="info-value">{{ $pendaftar->provinsi ?? 'Tidak ada data' }}</div>
                    </div>
                    <div class="info-item">
                        <label>Kabupaten/Kota</label>
                        <div class="info-value">{{ $pendaftar->kabupaten ?? 'Tidak ada data' }}</div>
                    </div>
                    <div class="info-item">
                        <label>Kecamatan</label>
                        <div class="info-value">{{ $pendaftar->kecamatan ?? 'Tidak ada data' }}</div>
                    </div>
                    <div class="info-item">
                        <label>Desa/Kelurahan</label>
                        <div class="info-value">{{ $pendaftar->desa ?? 'Tidak ada data' }}</div>
                    </div>
                </div>
            </div>

            <!-- Dokumen -->
            <div class="info-section">
                <h3 class="section-title">
                    <i class="fas fa-file-alt"></i>
                    Dokumen Pendukung
                </h3>
                <div class="document-grid">
                    @if($pendaftar->fotoPendaftar)
                        <div class="document-item">
                            <label>Foto Pendaftar</label>
                            <div class="document-preview">
                                <img src="{{ Storage::url($pendaftar->fotoPendaftar) }}" alt="Foto Pendaftar" class="document-image">
                                <a href="{{ Storage::url($pendaftar->fotoPendaftar) }}" target="_blank" class="btn btn-sm btn-primary">
                                    <i class="fas fa-eye"></i> Lihat
                                </a>
                            </div>
                        </div>
                    @endif

                    @if($pendaftar->fotoKartuKeluarga)
                        <div class="document-item">
                            <label>Kartu Keluarga</label>
                            <div class="document-preview">
                                <i class="fas fa-file-pdf document-icon"></i>
                                <a href="{{ Storage::url($pendaftar->fotoKartuKeluarga) }}" target="_blank" class="btn btn-sm btn-primary">
                                    <i class="fas fa-download"></i> Download
                                </a>
                            </div>
                        </div>
                    @endif

                    @if($pendaftar->fotoAkteLahir)
                        <div class="document-item">
                            <label>Akte Lahir</label>
                            <div class="document-preview">
                                <i class="fas fa-file-pdf document-icon"></i>
                                <a href="{{ Storage::url($pendaftar->fotoAkteLahir) }}" target="_blank" class="btn btn-sm btn-primary">
                                    <i class="fas fa-download"></i> Download
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Action Buttons
            <div class="action-section">
                <form method="POST" action="#" class="d-inline">
                    @csrf
                    <button type="submit" name="status" value="diterima" class="btn btn-success">
                        <i class="fas fa-check"></i>
                        Terima Pendaftar
                    </button>
                </form>
                <form method="POST" action="#" class="d-inline">
                    @csrf
                    <button type="submit" name="status" value="ditolak" class="btn btn-danger" onclick="return confirm('Yakin ingin menolak pendaftar ini?')">
                        <i class="fas fa-times"></i>
                        Tolak Pendaftar
                    </button>
                </form>
            </div> -->
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    .page-title .emoji {
        background: none !important;
        -webkit-text-fill-color: initial !important;
        color: initial !important;
    }

    .page-container {
        padding: 2rem;
        background: linear-gradient(135deg, #6D8D79 0%, #5a7466 100%);
        min-height: 100vh;
    }

    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 2rem;
        padding: 2rem;
        background: rgba(255, 255, 255, 0.95);
        border-radius: 20px;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        backdrop-filter: blur(10px);
    }

    .page-title {
        font-size: 2.5rem;
        font-weight: 800;
        color: #2d3748;
        margin: 0 0 0.5rem 0;
        background: linear-gradient(135deg, #6D8D79, #5a7466);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .page-subtitle {
        color: #64748b;
        font-size: 1.1rem;
        margin: 0;
        font-weight: 500;
    }

    .content-card {
        background: white;
        border-radius: 20px;
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    .card-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 2rem;
        background: linear-gradient(135deg, #f8fafc, #f1f5f9);
        border-bottom: 1px solid #e2e8f0;
    }

    .card-title {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        font-size: 1.5rem;
        font-weight: 700;
        color: #2d3748;
        margin: 0;
    }

    .card-title i {
        color: #6D8D79;
    }

    .card-body {
        padding: 2rem;
    }

    .info-section {
        margin-bottom: 2.5rem;
    }

    .section-title {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        font-size: 1.25rem;
        font-weight: 700;
        color: #2d3748;
        margin-bottom: 1.5rem;
        padding-bottom: 0.75rem;
        border-bottom: 2px solid #e2e8f0;
    }

    .section-title i {
        color: #6D8D79;
    }

    .info-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 1.5rem;
    }

    .info-item {
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
    }

    .info-item.full-width {
        grid-column: 1 / -1;
    }

    .info-item label {
        font-weight: 600;
        color: #4a5568;
        font-size: 0.875rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .info-value {
        padding: 0.75rem 1rem;
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        color: #2d3748;
        font-weight: 500;
    }

    .document-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1.5rem;
    }

    .document-item {
        display: flex;
        flex-direction: column;
        gap: 0.75rem;
    }

    .document-item label {
        font-weight: 600;
        color: #4a5568;
        font-size: 0.875rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .document-preview {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 0.75rem;
        padding: 1rem;
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 8px;
    }

    .document-image {
        width: 100%;
        max-width: 200px;
        height: auto;
        border-radius: 8px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .document-icon {
        font-size: 3rem;
        color: #6D8D79;
    }

    .action-section {
        display: flex;
        gap: 1rem;
        justify-content: center;
        margin-top: 2rem;
        padding-top: 2rem;
        border-top: 2px solid #e2e8f0;
    }

    .badge {
        padding: 0.5rem 1rem;
        border-radius: 12px;
        font-size: 0.875rem;
        font-weight: 600;
        text-transform: uppercase;
    }

    .badge-success {
        background: #d1fae5;
        color: #065f46;
    }

    .badge-warning {
        background: #fef3c7;
        color: #92400e;
    }

    .badge-danger {
        background: #fee2e2;
        color: #991b1b;
    }

    .btn {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.75rem 1.5rem;
        border: none;
        border-radius: 8px;
        font-size: 0.875rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        justify-content: center;
    }

    .btn-sm {
        padding: 0.5rem 0.75rem;
        font-size: 0.75rem;
    }

    .btn-primary {
        background: linear-gradient(135deg, #6D8D79, #5a7466);
        color: white;
        box-shadow: 0 4px 15px rgba(109, 141, 121, 0.3);
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(109, 141, 121, 0.4);
    }

    .btn-secondary {
        background: linear-gradient(135deg, #64748b, #475569);
        color: white;
        box-shadow: 0 4px 15px rgba(100, 116, 139, 0.3);
    }

    .btn-secondary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(100, 116, 139, 0.4);
    }

    .btn-success {
        background: linear-gradient(135deg, #10b981, #059669);
        color: white;
        box-shadow: 0 4px 15px rgba(16, 185, 129, 0.3);
    }

    .btn-success:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(16, 185, 129, 0.4);
    }

    .btn-danger {
        background: linear-gradient(135deg, #ef4444, #dc2626);
        color: white;
        box-shadow: 0 4px 15px rgba(239, 68, 68, 0.3);
    }

    .btn-danger:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(239, 68, 68, 0.4);
    }

    @media (max-width: 768px) {
        .page-header {
            flex-direction: column;
            gap: 1.5rem;
            text-align: center;
        }

        .card-header {
            flex-direction: column;
            gap: 1rem;
            text-align: center;
        }

        .info-grid {
            grid-template-columns: 1fr;
        }

        .document-grid {
            grid-template-columns: 1fr;
        }

        .action-section {
            flex-direction: column;
            align-items: center;
        }
    }
</style>
@endsection
