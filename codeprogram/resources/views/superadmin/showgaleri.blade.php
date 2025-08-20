@extends('layouts.superadmin')

@section('title', 'Detail Galeri')

@section('content')
    <div class="page-container">
        <!-- Header Section -->
        <div class="page-header">
            <div class="header-content">
                <h1 class="page-title">
                    <span class="emoji">📸</span> Galeri Madrasah
                </h1>
                <p class="page-subtitle">Lihat detail lengkap galeri madrasah</p>
            </div>

        </div>

        <!-- Content Section -->
        <div class="content-card">
            <div class="card-header">
                <h2 class="card-title">
                    <i class="fas fa-info-circle"></i>
                    Informasi Galeri
                </h2>
                <div class="card-meta">
                    <span class="meta-badge">
                        <i class="fas fa-calendar"></i>
                        {{ $galeri->created_at->format('d M Y') }}
                    </span>
                    <span class="meta-badge">
                        <i class="fas fa-images"></i>
                        {{ count(json_decode($galeri->gambar, true) ?? []) }} Foto
                    </span>
                </div>
            </div>

            <div class="card-body">
                <!-- Galeri Info -->
                <div class="info-section">
                    <div class="info-row">
                        <div class="info-label">
                            <i class="fas fa-heading"></i>
                            Judul Galeri
                        </div>
                        <div class="info-value">
                            {{ $galeri->judul }}
                        </div>
                    </div>

                    <div class="info-row">
                        <div class="info-label">
                            <i class="fas fa-align-left"></i>
                            Deskripsi
                        </div>
                        <div class="info-value">
                            {{ $galeri->deskripsi }}
                        </div>
                    </div>
                </div>

                <!-- Photo Gallery -->
                <div class="gallery-section">
                    <div class="gallery-header">
                        <h3 class="gallery-title">
                            <i class="fas fa-images"></i>
                            Koleksi Foto
                        </h3>
                        <div class="gallery-count">
                            {{ count(json_decode($galeri->gambar, true) ?? []) }} Foto
                        </div>
                    </div>

                    <div class="photo-gallery">
                        @php
                            $images = json_decode($galeri->gambar, true) ?? [];
                        @endphp
                        
                        @if(!empty($images))
                            @foreach($images as $index => $image)
                                <div class="photo-item" data-index="{{ $index }}">
                                    <div class="photo-wrapper">
                                        <img src="{{ Storage::url($image) }}" 
                                             alt="Foto {{ $galeri->judul }} - {{ $index + 1 }}" 
                                             class="photo-image"
                                             onclick="openLightbox({{ $index }})">
                                        <div class="photo-overlay">
                                            <div class="photo-actions">
                                                <button class="action-btn" onclick="openLightbox({{ $index }})" title="Lihat Foto">
                                                    <i class="fas fa-search-plus"></i>
                                                </button>
                                                <button class="action-btn" onclick="downloadImage('{{ Storage::url($image) }}', 'foto-{{ $index + 1 }}')" title="Download">
                                                    <i class="fas fa-download"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="photo-number">{{ $index + 1 }}</div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="no-photos">
                                <div class="no-photos-icon">
                                    <i class="fas fa-images"></i>
                                </div>
                                <h4>Tidak ada foto</h4>
                                <p>Galeri ini belum memiliki foto</p>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="action-section">
                    <div class="action-buttons">
                        <a href="{{ route('superadmin.galeri.index') }}" class="btn btn-secondary">
                            <i class="fas fa-list"></i>
                            <span>Semua Galeri</span>
                        </a>
                        <a href="{{ route('superadmin.galeri.edit', $galeri->galeri_id) }}" class="btn btn-primary">
                            <i class="fas fa-edit"></i>
                            <span>Edit Galeri</span>
                        </a>
                        <form action="{{ route('superadmin.galeri.destroy', $galeri->galeri_id) }}" 
                              method="POST" 
                              class="delete-form"
                              onsubmit="return confirm('Apakah Anda yakin ingin menghapus galeri ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-trash"></i>
                                <span>Hapus Galeri</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Lightbox Modal -->
    <div id="lightbox" class="lightbox" onclick="closeLightbox()">
        <div class="lightbox-content">
            <span class="lightbox-close" onclick="closeLightbox()">&times;</span>
            <img id="lightbox-image" src="" alt="Lightbox Image">
            <div class="lightbox-nav">
                <button class="nav-btn prev-btn" onclick="changeImage(-1)">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button class="nav-btn next-btn" onclick="changeImage(1)">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
            <div class="lightbox-info">
                <span id="lightbox-counter">1 / 1</span>
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
        }

        .card-meta {
            display: flex;
            gap: 1rem;
        }

        .meta-badge {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            background: rgba(109, 141, 121, 0.1);
            color: #6D8D79;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.875rem;
            font-weight: 600;
        }

        .card-body {
            padding: 2rem;
        }

        /* Info Section */
        .info-section {
            margin-bottom: 3rem;
        }

        .info-row {
            display: flex;
            align-items: flex-start;
            gap: 2rem;
            margin-bottom: 1.5rem;
            padding: 1.5rem;
            background: #f8fafc;
            border-radius: 12px;
            border-left: 4px solid #6D8D79;
        }

        .info-label {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-weight: 600;
            color: #2d3748;
            min-width: 150px;
            font-size: 0.9rem;
        }

        .info-label i {
            color: #6D8D79;
        }

        .info-value {
            flex: 1;
            color: #4a5568;
            line-height: 1.6;
            font-size: 1rem;
        }

        /* Gallery Section */
        .gallery-section {
            margin-bottom: 3rem;
        }

        .gallery-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid #e2e8f0;
        }

        .gallery-title {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-size: 1.25rem;
            font-weight: 700;
            color: #2d3748;
            margin: 0;
        }

        .gallery-title i {
            color: #6D8D79;
        }

        .gallery-count {
            background: linear-gradient(135deg, #6D8D79, #5a7466);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.875rem;
            font-weight: 600;
        }

        /* Photo Gallery */
        .photo-gallery {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 1.5rem;
        }

        .photo-item {
            position: relative;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .photo-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
        }

        .photo-wrapper {
            position: relative;
            width: 100%;
            height: 200px;
            overflow: hidden;
        }

        .photo-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .photo-item:hover .photo-image {
            transform: scale(1.05);
        }

        .photo-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: all 0.3s ease;
        }

        .photo-item:hover .photo-overlay {
            opacity: 1;
        }

        .photo-actions {
            display: flex;
            gap: 0.5rem;
        }

        .action-btn {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.9);
            border: none;
            color: #2d3748;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .action-btn:hover {
            background: white;
            transform: scale(1.1);
        }

        .photo-number {
            position: absolute;
            top: 10px;
            left: 10px;
            background: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 0.25rem 0.5rem;
            border-radius: 12px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .no-photos {
            grid-column: 1 / -1;
            text-align: center;
            padding: 4rem 2rem;
            color: #64748b;
        }

        .no-photos-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            color: #cbd5e0;
        }

        .no-photos h4 {
            font-size: 1.25rem;
            margin-bottom: 0.5rem;
        }

        /* Action Section */
        .action-section {
            border-top: 1px solid #e2e8f0;
            padding-top: 2rem;
        }

        .action-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        .delete-form {
            display: inline-block;
        }

        /* Buttons */
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

        .btn-secondary {
            background: linear-gradient(135deg, #64748b, #475569);
            color: white;
            box-shadow: 0 4px 15px rgba(100, 116, 139, 0.3);
        }

        .btn-secondary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(100, 116, 139, 0.4);
        }

        .btn-back {
            background: linear-gradient(135deg, #3b82f6, #2563eb);
            color: white;
            box-shadow: 0 4px 15px rgba(59, 130, 246, 0.3);
        }

        .btn-back:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(59, 130, 246, 0.4);
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

        .btn-danger {
            background: linear-gradient(135deg, #ef4444, #dc2626);
            color: white;
            box-shadow: 0 4px 15px rgba(239, 68, 68, 0.3);
        }

        .btn-danger:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(239, 68, 68, 0.4);
        }

        /* Lightbox */
        .lightbox {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.9);
            backdrop-filter: blur(5px);
        }

        .lightbox-content {
            position: relative;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .lightbox-close {
            position: absolute;
            top: 20px;
            right: 35px;
            color: white;
            font-size: 40px;
            font-weight: bold;
            cursor: pointer;
            z-index: 1001;
        }

        .lightbox-close:hover {
            color: #ccc;
        }

        #lightbox-image {
            max-width: 90%;
            max-height: 90%;
            object-fit: contain;
        }

        .lightbox-nav {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            display: flex;
            justify-content: space-between;
            width: 100%;
            padding: 0 20px;
            pointer-events: none;
        }

        .nav-btn {
            background: rgba(255, 255, 255, 0.1);
            border: none;
            color: white;
            font-size: 24px;
            padding: 15px 20px;
            border-radius: 50%;
            cursor: pointer;
            transition: all 0.3s ease;
            pointer-events: auto;
        }

        .nav-btn:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        .lightbox-info {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            color: white;
            font-size: 16px;
            font-weight: 500;
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

            .info-row {
                flex-direction: column;
                gap: 1rem;
            }

            .info-label {
                min-width: auto;
            }

            .photo-gallery {
                grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
                gap: 1rem;
            }

            .action-buttons {
                flex-direction: column;
                align-items: center;
            }

            .btn {
                width: 100%;
                max-width: 250px;
            }
        }

        @media (max-width: 576px) {
            .page-title {
                font-size: 1.5rem;
            }

            .photo-gallery {
                grid-template-columns: 1fr;
            }

            .lightbox-nav {
                padding: 0 10px;
            }

            .nav-btn {
                font-size: 20px;
                padding: 10px 15px;
            }
        }
    </style>
@endsection

@section('scripts')
    <script>
        let currentImageIndex = 0;
        const images = @json(json_decode($galeri->gambar, true) ?? []);

        function openLightbox(index) {
            currentImageIndex = index;
            const lightbox = document.getElementById('lightbox');
            const lightboxImage = document.getElementById('lightbox-image');
            const lightboxCounter = document.getElementById('lightbox-counter');
            
            lightboxImage.src = "{{ Storage::url('') }}" + images[index];
            lightboxCounter.textContent = `${index + 1} / ${images.length}`;
            lightbox.style.display = 'block';
            
            // Prevent body scrolling
            document.body.style.overflow = 'hidden';
        }

        function closeLightbox() {
            const lightbox = document.getElementById('lightbox');
            lightbox.style.display = 'none';
            
            // Restore body scrolling
            document.body.style.overflow = 'auto';
        }

        function changeImage(direction) {
            currentImageIndex += direction;
            
            if (currentImageIndex >= images.length) {
                currentImageIndex = 0;
            } else if (currentImageIndex < 0) {
                currentImageIndex = images.length - 1;
            }
            
            const lightboxImage = document.getElementById('lightbox-image');
            const lightboxCounter = document.getElementById('lightbox-counter');
            
            lightboxImage.src = "{{ Storage::url('') }}" + images[currentImageIndex];
            lightboxCounter.textContent = `${currentImageIndex + 1} / ${images.length}`;
        }

        function downloadImage(imageUrl, filename) {
            const link = document.createElement('a');
            link.href = imageUrl;
            link.download = filename;
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }

        // Keyboard navigation
        document.addEventListener('keydown', function(e) {
            const lightbox = document.getElementById('lightbox');
            if (lightbox.style.display === 'block') {
                if (e.key === 'Escape') {
                    closeLightbox();
                } else if (e.key === 'ArrowLeft') {
                    changeImage(-1);
                } else if (e.key === 'ArrowRight') {
                    changeImage(1);
                }
            }
        });

        // Prevent lightbox from closing when clicking on image
        document.getElementById('lightbox-image').addEventListener('click', function(e) {
            e.stopPropagation();
        });
    </script>
@endsection