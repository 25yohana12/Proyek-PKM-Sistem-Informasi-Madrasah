@extends('layouts.superadmin')

@section('title', 'Informasi Pendaftaran')

@section('content')
    <div class="page-container">
        <!-- Header Section -->
        <div class="page-header">
            <div class="header-content">
                <h1 class="page-title">
                    <span class="emoji">📋</span> Informasi Pendaftaran
                </h1>
                <p class="page-subtitle">Kelola informasi pendaftaran siswa baru</p>
            </div>
            <div class="header-actions">
                @if($informasi)
                    <a href="{{ route('superadmin.informasipendaftaran.edit', $informasi->informasi_id) }}" class="btn btn-primary">
                        <i class="fas fa-edit"></i>
                        <span>Edit Informasi</span>
                    </a>
                @endif
            </div>
        </div>

        <!-- Success Message -->
        @if(session('success'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i>
                <div class="alert-content">
                    {{ session('success') }}
                </div>
            </div>
        @endif

        <!-- Content -->
        @if($informasi)
            <div class="content-card">
                <div class="card-header">
                    <h2 class="card-title">
                        <i class="fas fa-info-circle"></i>
                        Detail Informasi Pendaftaran
                    </h2>
                </div>
                <div class="card-body">
                    <div class="info-grid">
                        <div class="info-item">
                            <div class="info-label">
                                <i class="fas fa-calendar-alt"></i>
                                Tahun Ajaran
                            </div>
                            <div class="info-value">{{ $informasi->tahunAjaran }}</div>
                        </div>

                        <div class="info-item">
                            <div class="info-label">
                                <i class="fas fa-calendar-plus"></i>
                                Tanggal Mulai Pendaftaran
                            </div>
                            <div class="info-value">{{ $informasi->tanggalPendaftaran?->format('d F Y') }}</div>
                        </div>

                        <div class="info-item">
                            <div class="info-label">
                                <i class="fas fa-calendar-times"></i>
                                Tanggal Penutupan
                            </div>
                            <div class="info-value">{{ $informasi->tanggalPenutupan?->format('d F Y') }}</div>
                        </div>

                        <div class="info-item">
                            <div class="info-label">
                                <i class="fas fa-bullhorn"></i>
                                Tanggal Pengumuman
                            </div>
                            <div class="info-value">{{ $informasi->tanggalPengumuman?->format('d F Y') }}</div>
                        </div>

                        <div class="info-item">
                            <div class="info-label">
                                <i class="fas fa-users"></i>
                                Kuota Siswa Baru
                            </div>
                            <div class="info-value">{{ $informasi->jumlahSiswa }} siswa</div>
                        </div>

                        <div class="info-item full-width">
                            <div class="info-label">
                                <i class="fas fa-bullhorn"></i>
                                Pengumuman
                            </div>
                            <div class="info-value">{{ $informasi->pengumuman ?? 'Tidak ada pengumuman' }}</div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="content-card">
                <div class="card-body text-center">
                    <div class="empty-state">
                        <i class="fas fa-exclamation-triangle"></i>
                        <h3>Belum Ada Data</h3>
                        <p>Informasi pendaftaran belum tersedia. Silakan refresh halaman untuk membuat data default.</p>
                    </div>
                </div>
            </div>
        @endif
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

        .alert {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 1.5rem;
            border-radius: 12px;
            margin-bottom: 1.5rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .alert-success {
            background: linear-gradient(135deg, #d1fae5, #a7f3d0);
            color: #065f46;
            border-left: 4px solid #10b981;
        }

        .content-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .card-header {
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

        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .info-item {
            background: #f8fafc;
            padding: 1.5rem;
            border-radius: 12px;
            border-left: 4px solid #6D8D79;
        }

        .info-item.full-width {
            grid-column: 1 / -1;
        }

        .info-label {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-weight: 600;
            color: #4a5568;
            margin-bottom: 0.75rem;
            font-size: 0.9rem;
        }

        .info-label i {
            color: #6D8D79;
        }

        .info-value {
            font-size: 1.1rem;
            font-weight: 500;
            color: #2d3748;
        }

        .empty-state {
            padding: 3rem;
            color: #64748b;
        }

        .empty-state i {
            font-size: 4rem;
            margin-bottom: 1rem;
            color: #cbd5e0;
        }

        .empty-state h3 {
            margin-bottom: 1rem;
            color: #4a5568;
        }

        .btn {
            display: flex;
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

        .btn-primary {
            background: linear-gradient(135deg, #6D8D79, #5a7466);
            color: white;
            box-shadow: 0 4px 15px rgba(109, 141, 121, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(109, 141, 121, 0.4);
        }

        @media (max-width: 768px) {
            .page-header {
                flex-direction: column;
                gap: 1.5rem;
                text-align: center;
            }

            .info-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
@endsection