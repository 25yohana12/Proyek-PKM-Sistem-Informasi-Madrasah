@extends('layouts.superadmin')

@section('title', 'Daftar Prestasi')

@section('content')
    <div class="page-container">
        <!-- Header Section -->
        <div class="page-header">
            <div class="header-content">
                <h1 class="page-title">
                    <span class="emoji">🏆</span> Daftar Prestasi
                </h1>
                <p class="page-subtitle">Kelola data prestasi siswa dan sekolah</p>
            </div>
            <div class="header-actions">
                <a href="{{ route('prestasi.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i>
                    <span>Tambah Prestasi</span>
                </a>
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
        <div class="content-card">
            <div class="card-header">
                <h2 class="card-title">
                    <i class="fas fa-trophy"></i>
                    Data Prestasi
                </h2>
            </div>
            <div class="card-body">
                <!-- Search -->
                <div class="filter-section">
                    <div class="search-box">
                        <input type="text" placeholder="Cari prestasi..." class="form-control">
                        <i class="fas fa-search"></i>
                    </div>
                </div>

                <!-- Prestasi Grid -->
                <div class="prestasi-grid">
                    @forelse($prestasis as $prestasi)
                        <div class="prestasi-card">
                            <div class="prestasi-image">
                                @if($prestasi->gambar)
                                    @php
                                        $images = json_decode($prestasi->gambar);
                                        $firstImage = $images[0] ?? null;
                                    @endphp
                                    @if($firstImage)
                                        <img src="{{ Storage::url($firstImage) }}" alt="Foto Prestasi">
                                        @if(count($images) > 1)
                                            <div class="image-count">
                                                <i class="fas fa-images"></i>
                                                {{ count($images) }}
                                            </div>
                                        @endif
                                    @endif
                                @else
                                    <div class="no-image">
                                        <i class="fas fa-image"></i>
                                        <span>No Image</span>
                                    </div>
                                @endif
                            </div>
                            <div class="prestasi-content">
                                <h3 class="prestasi-title">{{ $prestasi->judul }}</h3>
                                <div class="prestasi-award">
                                    <i class="fas fa-medal"></i>
                                    {{ $prestasi->penghargaan }}
                                </div>
                                <p class="prestasi-description">
                                    {{ Str::limit($prestasi->deskripsi, 100) }}
                                </p>
                                <div class="prestasi-actions">
                                    <a href="{{ route('prestasi.show', $prestasi->prestasi_id) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i>
                                        Detail
                                    </a>
                                    <a href="{{ route('prestasi.edit', $prestasi->prestasi_id) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                        Edit
                                    </a>
                                    <form action="{{ route('prestasi.destroy', $prestasi->prestasi_id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Hapus prestasi ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i>
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="empty-state-full">
                            <i class="fas fa-trophy"></i>
                            <h3>Belum Ada Prestasi</h3>
                            <p>Tambahkan prestasi pertama untuk memulai</p>
                            <a href="{{ route('prestasi.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus"></i>
                                Tambah Prestasi Pertama
                            </a>
                        </div>
                    @endforelse
                </div>

                <!-- Pagination -->
                @if(method_exists($prestasis, 'links'))
                    <div class="pagination-section">
                        {{ $prestasis->links() }}
                    </div>
                @endif
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

        .filter-section {
            margin-bottom: 2rem;
        }

        .search-box {
            position: relative;
            max-width: 400px;
        }

        .search-box input {
            padding-right: 3rem;
        }

        .search-box i {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #64748b;
        }

        .form-control {
            padding: 0.75rem 1rem;
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            font-size: 0.875rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            outline: none;
            border-color: #6D8D79;
            box-shadow: 0 0 0 3px rgba(109, 141, 121, 0.1);
        }

        .prestasi-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 2rem;
        }

        .prestasi-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: all 0.3s ease;
            border: 1px solid #e2e8f0;
        }

        .prestasi-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .prestasi-image {
            position: relative;
            height: 200px;
            overflow: hidden;
        }

        .prestasi-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .prestasi-card:hover .prestasi-image img {
            transform: scale(1.05);
        }

        .prestasi-image .image-count {
            position: absolute;
            top: 0.75rem;
            right: 0.75rem;
            background: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 0.25rem 0.5rem;
            border-radius: 12px;
            font-size: 0.75rem;
            display: flex;
            align-items: center;
            gap: 0.25rem;
        }

        .no-image {
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background: #f8fafc;
            color: #64748b;
        }

        .no-image i {
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }

        .prestasi-content {
            padding: 1.5rem;
        }

        .prestasi-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: #2d3748;
            margin: 0 0 0.75rem 0;
            line-height: 1.3;
        }

        .prestasi-award {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #f59e0b;
            font-weight: 600;
            margin-bottom: 0.75rem;
            font-size: 0.875rem;
        }

        .prestasi-award i {
            color: #f59e0b;
        }

        .prestasi-description {
            color: #64748b;
            line-height: 1.5;
            margin-bottom: 1.5rem;
            font-size: 0.875rem;
        }

        .prestasi-actions {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
        }

        .empty-state-full {
            grid-column: 1 / -1;
            text-align: center;
            padding: 4rem 2rem;
            color: #64748b;
        }

        .empty-state-full i {
            font-size: 5rem;
            margin-bottom: 1.5rem;
            color: #cbd5e0;
        }

        .empty-state-full h3 {
            margin-bottom: 1rem;
            color: #4a5568;
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
            padding: 0.5rem 1rem;
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

        .btn-info {
            background: linear-gradient(135deg, #0ea5e9, #0284c7);
            color: white;
        }

        .btn-warning {
            background: linear-gradient(135deg, #f59e0b, #d97706);
            color: white;
        }

        .btn-danger {
            background: linear-gradient(135deg, #ef4444, #dc2626);
            color: white;
        }

        .pagination-section {
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 1px solid #e2e8f0;
            display: flex;
            justify-content: center;
        }

        @media (max-width: 768px) {
            .page-header {
                flex-direction: column;
                gap: 1.5rem;
                text-align: center;
            }

            .prestasi-grid {
                grid-template-columns: 1fr;
            }

            .prestasi-actions {
                justify-content: center;
            }
        }
    </style>
@endsection