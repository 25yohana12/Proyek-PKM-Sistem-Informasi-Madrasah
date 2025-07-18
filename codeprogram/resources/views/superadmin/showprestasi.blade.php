@extends('layouts.superadmin')

@section('title', 'Detail Prestasi')

@section('content')
    <div class="page-container">
        <!-- Header Section -->
        <div class="page-header">
            <div class="header-content">
                <h1 class="page-title">
                    <span class="emoji">🏆</span> Detail Prestasi
                </h1>
                <p class="page-subtitle">{{ $prestasi->judul }}</p>
            </div>
            <div class="header-actions">
                <a href="{{ route('prestasi.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i>
                    <span>Kembali</span>
                </a>
                <a href="{{ route('prestasi.edit', $prestasi->prestasi_id) }}" class="btn btn-primary">
                    <i class="fas fa-edit"></i>
                    <span>Edit</span>
                </a>
            </div>
        </div>

        <!-- Content -->
        <div class="content-card">
            <div class="prestasi-detail">
                <!-- Image Gallery -->
                @if($prestasi->gambar)
                    <div class="image-gallery">
                        <div class="main-image">
                            @php
                                $images = json_decode($prestasi->gambar);
                                $firstImage = $images[0] ?? null;
                            @endphp
                            @if($firstImage)
                                <img id="mainImage" src="{{ Storage::url($firstImage) }}" alt="Foto Prestasi">
                            @endif
                        </div>
                        @if(count($images) > 1)
                            <div class="thumbnail-gallery">
                                @foreach($images as $index => $image)
                                    <div class="thumbnail {{ $index === 0 ? 'active' : '' }}" onclick="changeMainImage('{{ Storage::url($image) }}', this)">
                                        <img src="{{ Storage::url($image) }}" alt="Thumbnail {{ $index + 1 }}">
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                @endif

                <!-- Prestasi Info -->
                <div class="prestasi-info">
                    <div class="info-section">
                        <h2 class="prestasi-title">{{ $prestasi->judul }}</h2>
                        
                        <div class="prestasi-award">
                            <i class="fas fa-medal"></i>
                            <span>{{ $prestasi->penghargaan }}</span>
                        </div>

                        <div class="info-grid">
                            <div class="info-item">
                                <div class="info-label">
                                    <i class="fas fa-user"></i>
                                    Nama Peserta
                                </div>
                                <div class="info-value">{{ $prestasi->nama }}</div>
                            </div>

                            <div class="info-item full-width">
                                <div class="info-label">
                                    <i class="fas fa-align-left"></i>
                                    Deskripsi
                                </div>
                                <div class="info-value">{{ $prestasi->deskripsi }}</div>
                            </div>
                        </div>
                    </div>
                </div>
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

        .header-actions {
            display: flex;
            gap: 1rem;
        }

        .content-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .prestasi-detail {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0;
        }

        .image-gallery {
            padding: 2rem;
            background: #f8fafc;
        }

        .main-image {
            border-radius: 16px;
            overflow: hidden;
            margin-bottom: 1rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .main-image img {
            width: 100%;
            height: 400px;
            object-fit: cover;
        }

        .thumbnail-gallery {
            display: flex;
            gap: 0.75rem;
            overflow-x: auto;
            padding: 0.5rem 0;
        }

        .thumbnail {
            flex-shrink: 0;
            width: 80px;
            height: 80px;
            border-radius: 8px;
            overflow: hidden;
            cursor: pointer;
            transition: all 0.3s ease;
            border: 3px solid transparent;
        }

        .thumbnail.active {
            border-color: #6D8D79;
        }

        .thumbnail img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .thumbnail:hover {
            transform: scale(1.05);
        }

        .prestasi-info {
            padding: 2rem;
        }

        .prestasi-title {
            font-size: 2rem;
            font-weight: 800;
            color: #2d3748;
            margin: 0 0 1rem 0;
        }

        .prestasi-award {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            background: linear-gradient(135deg, #fef3c7, #fde68a);
            color: #92400e;
            padding: 1rem;
            border-radius: 12px;
            margin-bottom: 2rem;
            border-left: 4px solid #f59e0b;
        }

        .prestasi-award i {
            font-size: 1.25rem;
            color: #f59e0b;
        }

        .prestasi-award span {
            font-weight: 700;
            font-size: 1.1rem;
        }

        .info-grid {
            display: grid;
            gap: 1.5rem;
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
            line-height: 1.6;
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

        @media (max-width: 768px) {
            .page-header {
                flex-direction: column;
                gap: 1.5rem;
                text-align: center;
            }

            .header-actions {
                flex-direction: column;
                width: 100%;
            }

            .prestasi-detail {
                grid-template-columns: 1fr;
            }

            .main-image img {
                height: 250px;
            }
        }
    </style>
@endsection

@section('scripts')
    <script>
        function changeMainImage(src, thumbnail) {
            document.getElementById('mainImage').src = src;
            
            // Remove active class from all thumbnails
            document.querySelectorAll('.thumbnail').forEach(thumb => {
                thumb.classList.remove('active');
            });
            
            // Add active class to clicked thumbnail
            thumbnail.classList.add('active');
        }
    </script>
@endsection