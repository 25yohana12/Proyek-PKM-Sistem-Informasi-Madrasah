@extends('layouts.superadmin')

@section('title', 'Perayaan')

@section('content')
    <div class="page-container">
        <!-- Header Section -->
        <div class="page-header">
            <div class="header-content">
                <h1 class="page-title">
                    <span class="emoji">🎉</span> Perayaan
                </h1>
                <p class="page-subtitle">Koleksi acara dan perayaan madrasah</p>
            </div>
            <div class="header-actions">
                <button class="btn btn-primary add-btn" onclick="window.location.href='{{ route('superadmin.acara.create') }}'">
                    <i class="fas fa-plus"></i>
                    <span>Tambah Acara</span>
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
                    <i class="fas fa-calendar-alt"></i>
                    Daftar Acara
                </h2>
                <div class="card-stats">
                    <span class="stat-badge">{{ count($acaras) }} Acara</span>
                </div>
            </div>

            <div class="card-body">
                @if(count($acaras) > 0)
                    <div class="acara-grid">
                        @foreach($acaras as $acara)
                            <div class="acara-card">
                                <div class="acara-header">
                                    <div class="acara-date-badge">
                                        <i class="fas fa-calendar"></i>
                                        {{ \Carbon\Carbon::parse($acara->tanggalAcara)->format('d M Y') }}
                                    </div>
                                    <div class="acara-actions">
                                        <a href="{{ route('superadmin.acara.edit', $acara->acara_id) }}" 
                                           class="action-btn edit-btn" 
                                           title="Edit Acara">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('superadmin.acara.destroy', $acara->acara_id) }}" 
                                              method="POST" 
                                              class="delete-form"
                                              onsubmit="return confirm('Apakah Anda yakin ingin menghapus acara ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="action-btn delete-btn" 
                                                    title="Hapus Acara">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>

                                <div class="acara-content">
                                    <h3 class="acara-title">{{ $acara->judul }}</h3>
                                    <p class="acara-description">{{ Str::limit($acara->deskripsi, 100) }}</p>
                                    
                                    <div class="acara-images">
                                        @php
                                            $images = json_decode($acara->gambar, true) ?? [];
                                        @endphp
                                        @if(!empty($images))
                                            <div class="images-grid">
                                                @foreach($images as $index => $image)
                                                    <div class="image-item {{ $index === 0 ? 'main-image' : '' }}">
                                                        <img src="{{ Storage::url($image) }}" 
                                                             alt="Foto {{ $acara->judul }}" 
                                                             class="acara-image"
                                                             onclick="openImageModal('{{ Storage::url($image) }}', '{{ $acara->judul }}')">
                                                        @if($index === 0 && count($images) > 1)
                                                            <div class="image-overlay">
                                                                <span class="image-count">
                                                                    <i class="fas fa-images"></i>
                                                                    {{ count($images) }} Foto
                                                                </span>
                                                            </div>
                                                        @endif
                                                    </div>
                                                @endforeach
                                            </div>
                                        @else
                                            <div class="no-images">
                                                <i class="fas fa-image"></i>
                                                <span>Tidak ada foto</span>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="acara-footer">
                                    <div class="acara-meta">
                                        <span class="meta-item">
                                            <i class="fas fa-images"></i>
                                            {{ count($images) }} Foto
                                        </span>
                                        <span class="meta-item">
                                            <i class="fas fa-clock"></i>
                                            {{ $acara->created_at->diffForHumans() }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="empty-state">
                        <div class="empty-content">
                            <div class="empty-icon">
                                <i class="fas fa-calendar-alt"></i>
                            </div>
                            <h3 class="empty-title">Belum ada acara</h3>
                            <p class="empty-subtitle">Mulai dengan menambahkan acara pertama Anda</p>
                            <!-- <button class="btn btn-primary" onclick="window.location.href='{{ route('superadmin.acara.create') }}'">
                                <i class="fas fa-plus"></i>
                                Tambah Acara
                            </button> -->
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Image Modal -->
    <div id="imageModal" class="modal" onclick="closeImageModal()">
        <div class="modal-content">
            <span class="modal-close" onclick="closeImageModal()">&times;</span>
            <img id="modalImage" src="" alt="Modal Image">
            <div class="modal-caption" id="modalCaption"></div>
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
            padding: 2rem;
        }

        /* Acara Grid */
        .acara-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 2rem;
        }

        /* Acara Card */
        .acara-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: all 0.3s ease;
            border: 1px solid #e2e8f0;
        }

        .acara-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .acara-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.5rem;
            background: linear-gradient(135deg, #f8fafc, #f1f5f9);
            border-bottom: 1px solid #e2e8f0;
        }

        .acara-date-badge {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            background: linear-gradient(135deg, #6D8D79, #5a7466);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.875rem;
            font-weight: 600;
        }

        .acara-actions {
            display: flex;
            gap: 0.5rem;
        }

        .action-btn {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.875rem;
            text-decoration: none;
        }

        .edit-btn {
            background: linear-gradient(135deg, #f59e0b, #d97706);
            color: white;
        }

        .edit-btn:hover {
            transform: scale(1.1);
            box-shadow: 0 4px 15px rgba(245, 158, 11, 0.3);
        }

        .delete-btn {
            background: linear-gradient(135deg, #ef4444, #dc2626);
            color: white;
        }

        .delete-btn:hover {
            transform: scale(1.1);
            box-shadow: 0 4px 15px rgba(239, 68, 68, 0.3);
        }

        .delete-form {
            display: inline-block;
        }

        .acara-content {
            padding: 1.5rem;
        }

        .acara-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: #2d3748;
            margin: 0 0 1rem 0;
            line-height: 1.4;
        }

        .acara-description {
            color: #64748b;
            line-height: 1.6;
            margin: 0 0 1.5rem 0;
            font-size: 0.9rem;
        }

        /* Images */
        .acara-images {
            margin-bottom: 1rem;
        }

        .images-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            grid-template-rows: repeat(2, 1fr);
            gap: 0.5rem;
            height: 200px;
            border-radius: 12px;
            overflow: hidden;
        }

        .image-item {
            position: relative;
            overflow: hidden;
            cursor: pointer;
        }

        .image-item.main-image {
            grid-row: 1 / -1;
        }

        .acara-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: all 0.3s ease;
        }

        .image-item:hover .acara-image {
            transform: scale(1.05);
        }

        .image-overlay {
            position: absolute;
            bottom: 8px;
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

        .no-images {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 200px;
            background: #f8fafc;
            border-radius: 12px;
            color: #94a3b8;
            gap: 0.5rem;
        }

        .no-images i {
            font-size: 2rem;
        }

        .acara-footer {
            padding: 1rem 1.5rem;
            background: #f8fafc;
            border-top: 1px solid #e2e8f0;
        }

        .acara-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 0.25rem;
            font-size: 0.75rem;
            color: #64748b;
            font-weight: 500;
        }

        .meta-item i {
            color: #94a3b8;
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

        /* Modal */
        .modal {
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

        .modal-content {
            position: relative;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        .modal-close {
            position: absolute;
            top: 20px;
            right: 35px;
            color: white;
            font-size: 40px;
            font-weight: bold;
            cursor: pointer;
            z-index: 1001;
        }

        .modal-close:hover {
            color: #ccc;
        }

        #modalImage {
            max-width: 90%;
            max-height: 80%;
            object-fit: contain;
        }

        .modal-caption {
            color: white;
            font-size: 18px;
            font-weight: 500;
            margin-top: 15px;
            text-align: center;
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

            .acara-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }

            .acara-header {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }

            .images-grid {
                grid-template-columns: 1fr;
                grid-template-rows: repeat(3, 1fr);
                height: 300px;
            }

            .image-item.main-image {
                grid-row: 1 / 2;
            }
        }

        @media (max-width: 576px) {
            .page-title {
                font-size: 1.5rem;
            }

            .acara-grid {
                grid-template-columns: 1fr;
            }

            .acara-card {
                margin: 0 0.5rem;
            }
        }
    </style>
@endsection

@section('scripts')
    <script>
        function openImageModal(imageSrc, caption) {
            const modal = document.getElementById('imageModal');
            const modalImage = document.getElementById('modalImage');
            const modalCaption = document.getElementById('modalCaption');
            
            modal.style.display = 'block';
            modalImage.src = imageSrc;
            modalCaption.textContent = caption;
            
            // Prevent body scrolling
            document.body.style.overflow = 'hidden';
        }

        function closeImageModal() {
            const modal = document.getElementById('imageModal');
            modal.style.display = 'none';
            
            // Restore body scrolling
            document.body.style.overflow = 'auto';
        }

        // Close modal when clicking outside the image
        document.getElementById('modalImage').addEventListener('click', function(e) {
            e.stopPropagation();
        });

        // Close modal with Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeImageModal();
            }
        });
    </script>
@endsection