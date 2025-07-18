@extends('layouts.superadmin')

@section('title', 'Ekstrakurikuler')

@section('content')
    <div class="page-container">
        <!-- Header Section -->
        <div class="page-header">
            <div class="header-content">
                <h1 class="page-title">
                    <span class="emoji">🎯</span> Ekstrakurikuler Madrasah
                </h1>
                <p class="page-subtitle">Kegiatan pengembangan bakat dan minat siswa</p>
            </div>
            <div class="header-actions">
                <button class="btn btn-primary add-btn" onclick="window.location.href='{{ route('ekstrakulikuler.create') }}'">
                    <i class="fas fa-plus"></i>
                    <span>Tambah Ekstrakurikuler</span>
                </button>
            </div>
        </div>

        <!-- Success/Error Messages -->
        @if(session('success'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i>
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-circle"></i>
                {{ session('error') }}
            </div>
        @endif

        <!-- Content Section -->
        <div class="content-card">
            <div class="card-header">
                <h2 class="card-title">
                    <i class="fas fa-users"></i>
                    Daftar Ekstrakurikuler
                </h2>
                <div class="card-stats">
                    <span class="stat-badge">{{ count($ekstrakulikulers) }} Kegiatan</span>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="modern-table">
                        <thead>
                            <tr>
                                <th width="8%">No</th>
                                <th width="35%">Nama Ekstrakurikuler</th>
                                <th width="37%">Foto</th>
                                <th width="20%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($ekstrakulikulers as $index => $item)
                                <tr>
                                    <td>
                                        <div class="number-badge">{{ $index + 1 }}</div>
                                    </td>
                                    <td>
                                        <div class="title-cell">
                                            <h4 class="item-title">{{ $item->namaekstrakulikuler }}</h4>
                                            <p class="item-desc">{{ Str::limit($item->deskripsi, 80) }}</p>
                                            <div class="item-meta">
                                                <span class="meta-item">
                                                    <i class="fas fa-calendar"></i>
                                                    {{ $item->created_at->format('d M Y') }}
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="image-gallery">
                                            @php
                                                $images = json_decode($item->gambar, true);
                                            @endphp
                                            @if (!empty($images) && is_array($images))
                                                <div class="image-preview">
                                                    <div class="main-image">
                                                        <img src="{{ Storage::url($images[0]) }}" 
                                                             alt="Foto {{ $item->nama }}" 
                                                             class="gallery-thumbnail">
                                                        @if (count($images) > 1)
                                                            <div class="image-count">
                                                                <i class="fas fa-images"></i>
                                                                +{{ count($images) - 1 }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="image-info">
                                                        <span class="image-total">{{ count($images) }} Foto</span>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="no-image">
                                                    <div class="no-image-icon">
                                                        <i class="fas fa-image"></i>
                                                    </div>
                                                    <span class="no-image-text">Tidak ada gambar</span>
                                                </div>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div class="action-buttons">
                                            <a href="{{ route('ekstrakulikuler.show', $item->ekstrakulikuler_id) }}" 
                                               class="btn btn-info btn-sm" 
                                               title="Lihat Detail">
                                                <i class="fas fa-eye"></i>
                                                <span>Lihat</span>
                                            </a>
                                            <a href="{{ route('ekstrakulikuler.edit', $item->ekstrakulikuler_id) }}" 
                                               class="btn btn-edit btn-sm" 
                                               title="Edit">
                                                <i class="fas fa-edit"></i>
                                                <span>Edit</span>
                                            </a>
                                            <form action="{{ route('ekstrakulikuler.destroy', $item->ekstrakulikuler_id) }}" 
                                                  method="POST" 
                                                  class="delete-form" 
                                                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus kegiatan ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="btn btn-delete btn-sm" 
                                                        title="Hapus">
                                                    <i class="fas fa-trash"></i>
                                                    <span>Hapus</span>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="empty-state">
                                        <div class="empty-content">
                                            <div class="empty-icon">
                                                <i class="fas fa-users"></i>
                                            </div>
                                            <h3 class="empty-title">Belum ada ekstrakurikuler</h3>
                                            <p class="empty-subtitle">Klik tombol di atas untuk menambahkan ekstrakulikuler baru</p>
                                            <button class="btn btn-primary" onclick="window.location.href='{{ route('ekstrakulikuler.create') }}'">
                                                <i class="fas fa-plus"></i>
                                                Tambah Ekstrakurikuler
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
    <style>
        /* Page Container */
        .page-container {
            padding: 2rem;
            background: linear-gradient(135deg, #6D8D79 0%, #5a7466 100%);
            min-height: 100vh;
        }

        /* Header Styles */
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
        .page-title .emoji {
            background: none !important;
            -webkit-text-fill-color: initial !important;
            color: initial !important;
        }

        .header-content {
            flex: 1;
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

        .header-actions {
            display: flex;
            gap: 1rem;
            align-items: center;
        }

        /* Alert Messages */
        .alert {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 1rem 1.5rem;
            border-radius: 12px;
            margin-bottom: 1.5rem;
            font-weight: 500;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .alert-success {
            background: linear-gradient(135deg, #10b981, #065f46);
            color: white;
        }

        .alert-danger {
            background: linear-gradient(135deg, #ef4444, #991b1b);
            color: white;
        }

        /* Content Card */
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
            font-size: 1.25rem;
        }

        .card-stats {
            display: flex;
            gap: 1rem;
        }

        .stat-badge {
            background: linear-gradient(135deg, #6D8D79, #5a7466);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.875rem;
            font-weight: 600;
        }

        .card-body {
            padding: 0;
        }

        /* Table Styles */
        .table-responsive {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        .modern-table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            margin: 0;
        }

        .modern-table thead {
            background: linear-gradient(135deg, #6D8D79, #5a7466);
            color: white;
        }

        .modern-table th {
            padding: 1.5rem 1rem;
            text-align: center;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-size: 0.875rem;
            border: none;
        }

        .modern-table td {
            padding: 1.5rem 1rem;
            border-bottom: 1px solid #f1f5f9;
            vertical-align: middle;
            text-align: center;
        }

        .modern-table tbody tr {
            transition: all 0.3s ease;
        }

        .modern-table tbody tr:hover {
            background: linear-gradient(135deg, #f8fafc, #f1f5f9);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
        }

        /* Number Badge */
        .number-badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 32px;
            height: 32px;
            background: linear-gradient(135deg, #6D8D79, #5a7466);
            color: white;
            border-radius: 50%;
            font-weight: 700;
            font-size: 0.875rem;
        }

        /* Title Cell */
        .title-cell {
            text-align: left;
            max-width: 300px;
        }

        .item-title {
            font-size: 1.125rem;
            font-weight: 700;
            color: #2d3748;
            margin: 0 0 0.5rem 0;
            line-height: 1.4;
        }

        .item-desc {
            font-size: 0.875rem;
            color: #64748b;
            margin: 0 0 0.75rem 0;
            line-height: 1.5;
        }

        .item-meta {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 0.25rem;
            font-size: 0.75rem;
            color: #94a3b8;
            font-weight: 500;
        }

        .meta-item i {
            font-size: 0.7rem;
        }

        /* Image Gallery */
        .image-gallery {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0.75rem;
        }

        .image-preview {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0.5rem;
        }

        .main-image {
            position: relative;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
            transition: all 0.3s ease;
        }

        .main-image:hover {
            transform: scale(1.05);
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.2);
        }

        .gallery-thumbnail {
            width: 100px;
            height: 100px;
            object-fit: cover;
            transition: all 0.3s ease;
        }

        .image-count {
            position: absolute;
            top: 8px;
            right: 8px;
            background: rgba(0, 0, 0, 0.8);
            color: white;
            padding: 0.25rem 0.5rem;
            border-radius: 12px;
            font-size: 0.75rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 0.25rem;
        }

        .image-info {
            text-align: center;
        }

        .image-total {
            font-size: 0.75rem;
            color: #6D8D79;
            font-weight: 600;
            background: rgba(109, 141, 121, 0.1);
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
        }

        .no-image {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0.5rem;
            padding: 1.5rem;
            color: #94a3b8;
        }

        .no-image-icon {
            width: 60px;
            height: 60px;
            background: #f1f5f9;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }

        .no-image-text {
            font-size: 0.875rem;
            font-weight: 500;
        }

        /* Action Buttons */
        .action-buttons {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
            align-items: center;
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
            min-width: 80px;
            justify-content: center;
        }

        .btn-sm {
            padding: 0.5rem 1rem;
            font-size: 0.8rem;
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
            background: linear-gradient(135deg, #06b6d4, #0891b2);
            color: white;
            box-shadow: 0 4px 15px rgba(6, 182, 212, 0.3);
        }

        .btn-info:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(6, 182, 212, 0.4);
        }

        .btn-edit {
            background: linear-gradient(135deg, #f59e0b, #d97706);
            color: white;
            box-shadow: 0 4px 15px rgba(245, 158, 11, 0.3);
        }

        .btn-edit:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(245, 158, 11, 0.4);
        }

        .btn-delete {
            background: linear-gradient(135deg, #ef4444, #dc2626);
            color: white;
            box-shadow: 0 4px 15px rgba(239, 68, 68, 0.3);
        }

        .btn-delete:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(239, 68, 68, 0.4);
        }

        .delete-form {
            display: inline-block;
            margin: 0;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
        }

        .empty-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 1.5rem;
        }

        .empty-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #f1f5f9, #e2e8f0);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            color: #94a3b8;
        }

        .empty-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: #2d3748;
            margin: 0;
        }

        .empty-subtitle {
            font-size: 1rem;
            color: #64748b;
            margin: 0;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .page-container {
                padding: 1rem;
            }

            .page-header {
                flex-direction: column;
                gap: 1.5rem;
                text-align: center;
            }

            .page-title {
                font-size: 2rem;
            }

            .card-header {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }

            .action-buttons {
                flex-direction: row;
                flex-wrap: wrap;
                justify-content: center;
            }

            .modern-table th,
            .modern-table td {
                padding: 1rem 0.5rem;
                font-size: 0.875rem;
            }

            .gallery-thumbnail {
                width: 80px;
                height: 80px;
            }

            .title-cell {
                max-width: 200px;
            }
        }

        @media (max-width: 576px) {
            .page-title {
                font-size: 1.5rem;
            }

            .action-buttons {
                flex-direction: column;
                gap: 0.25rem;
            }

            .btn-sm {
                padding: 0.375rem 0.75rem;
                font-size: 0.75rem;
            }

            .gallery-thumbnail {
                width: 60px;
                height: 60px;
            }

            .modern-table th,
            .modern-table td {
                padding: 0.75rem 0.25rem;
                font-size: 0.8rem;
            }
        }
    </style>
@endsection
