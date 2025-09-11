@extends('layouts.superadmin')

@section('title', 'Tambah Prestasi')

@section('content')
    <div class="page-container">
        <!-- Header Section -->
        <div class="page-header">
            <div class="header-content">
                <h1 class="page-title">
                    <span class="emoji">➕</span> Tambah Prestasi
                </h1>
                <p class="page-subtitle">Tambahkan prestasi baru siswa atau sekolah</p>
            </div>
            <div class="header-actions">
                <a href="{{ route('superadmin.prestasi.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i>
                    <span>Kembali</span>
                </a>
            </div>
        </div>

        <!-- Content -->
        <div class="content-card">
            <div class="card-header">
                <h2 class="card-title">
                    <i class="fas fa-plus"></i>
                    Form Tambah Prestasi
                </h2>
            </div>
            <div class="card-body">
                <form action="{{ route('superadmin.prestasi.store') }}" method="POST" enctype="multipart/form-data" class="modern-form">
                    @csrf

                    <!-- Nama Prestasi -->
                    <div class="form-group">
                        <label for="nama" class="form-label">
                            <i class="fas fa-user"></i>
                            Nama Peserta
                        </label>
                        <input type="text" 
                               id="nama" 
                               name="nama" 
                               class="form-control @error('nama') is-invalid @enderror" 
                               value="{{ old('nama') }}" 
                               placeholder="Masukkan nama prestasi"
                               required>
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Judul Prestasi -->
                    <div class="form-group">
                        <label for="judul" class="form-label">
                            <i class="fas fa-heading"></i>
                            Judul Prestasi
                        </label>
                        <input type="text" 
                               id="judul" 
                               name="judul" 
                               class="form-control @error('judul') is-invalid @enderror" 
                               value="{{ old('judul') }}" 
                               placeholder="Masukkan judul prestasi"
                               required>
                        @error('judul')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Jenis Prestasi -->
                    <div class="form-group">
                        <label for="jenis_prestasi" class="form-label">
                            <i class="fas fa-list"></i>
                            Jenis Prestasi
                        </label>
                        <select id="jenis_prestasi" 
                                name="jenis_prestasi" 
                                class="form-control @error('jenis_prestasi') is-invalid @enderror" 
                                required>
                            <option value="">-- Pilih Jenis Prestasi --</option>
                            <option value="akademik" {{ old('jenis_prestasi') == 'akademik' ? 'selected' : '' }}>Akademik</option>
                            <option value="non-akademik" {{ old('jenis_prestasi') == 'non-akademik' ? 'selected' : '' }}>Non-Akademik</option>
                        </select>
                        @error('jenis_prestasi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Penghargaan -->
                    <div class="form-group">
                        <label for="penghargaan" class="form-label">
                            <i class="fas fa-medal"></i>
                            Penghargaan
                        </label>
                        <input type="text" 
                               id="penghargaan" 
                               name="penghargaan" 
                               class="form-control @error('penghargaan') is-invalid @enderror" 
                               value="{{ old('penghargaan') }}" 
                               placeholder="Contoh: Juara 1, Juara 2, dst"
                               required>
                        @error('penghargaan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Deskripsi -->
                    <div class="form-group">
                        <label for="deskripsi" class="form-label">
                            <i class="fas fa-align-left"></i>
                            Deskripsi Prestasi
                        </label>
                        <textarea id="deskripsi" 
                                  name="deskripsi" 
                                  class="form-control @error('deskripsi') is-invalid @enderror" 
                                  rows="5"
                                  placeholder="Deskripsikan prestasi secara detail..."
                                  required>{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Gambar -->
                    <div class="form-group">
                        <label for="gambar" class="form-label">
                            <i class="fas fa-images"></i>
                            Gambar Prestasi
                        </label>
                        <div class="upload-area" id="uploadArea">
                            <input type="file" 
                                   id="gambar" 
                                   name="gambar[]" 
                                   class="form-control @error('gambar') is-invalid @enderror" 
                                   multiple 
                                   accept="image/*"
                                   onchange="previewImages(event)">
                            <div class="upload-placeholder">
                                <i class="fas fa-cloud-upload-alt"></i>
                                <p>Klik untuk pilih gambar atau drag & drop</p>
                                <small>Pilih satu atau lebih gambar (JPG, PNG, maksimal 2MB per file)</small>
                            </div>
                        </div>
                        @error('gambar')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        
                        <!-- Preview Container -->
                        <div id="imagePreview" class="image-preview-container"></div>
                    </div>

                    <!-- Form Actions -->
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i>
                            <span>Simpan Prestasi</span>
                        </button>
                        <a href="{{ route('superadmin.prestasi.index') }}" class="btn btn-secondary">
                            <i class="fas fa-times"></i>
                            <span>Batal</span>
                        </a>
                    </div>
                </form>
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

        .modern-form {
            max-width: 800px;
            margin: 0 auto;
        }

        .form-group {
            margin-bottom: 2rem;
        }

        .form-label {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-weight: 600;
            color: #2d3748;
            margin-bottom: 0.75rem;
            font-size: 1rem;
        }

        .form-label i {
            color: #6D8D79;
            font-size: 0.9rem;
        }

        .form-control {
            width: 100%;
            padding: 1rem;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: #f8fafc;
        }

        .form-control:focus {
            outline: none;
            border-color: #6D8D79;
            background: white;
            box-shadow: 0 0 0 3px rgba(109, 141, 121, 0.1);
        }

        .form-control.is-invalid {
            border-color: #ef4444;
        }

        .invalid-feedback {
            display: block;
            color: #ef4444;
            font-size: 0.875rem;
            margin-top: 0.5rem;
        }

        textarea.form-control {
            resize: vertical;
            min-height: 120px;
        }

        .upload-area {
            position: relative;
            border: 2px dashed #cbd5e0;
            border-radius: 12px;
            padding: 2rem;
            text-align: center;
            transition: all 0.3s ease;
            background: #f8fafc;
        }

        .upload-area:hover {
            border-color: #6D8D79;
            background: #f0fdf4;
        }

        .upload-area input[type="file"] {
            position: absolute;
            inset: 0;
            opacity: 0;
            cursor: pointer;
            padding: 0;
            border: none;
        }

        .upload-placeholder i {
            font-size: 3rem;
            color: #cbd5e0;
            margin-bottom: 1rem;
        }

        .upload-placeholder p {
            font-size: 1.1rem;
            font-weight: 600;
            color: #4a5568;
            margin-bottom: 0.5rem;
        }

        .upload-placeholder small {
            color: #64748b;
        }

        .image-preview-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            gap: 1rem;
            margin-top: 1rem;
        }

        .preview-item {
            position: relative;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .preview-item img {
            width: 100%;
            height: 120px;
            object-fit: cover;
        }

        .preview-item .remove-btn {
            position: absolute;
            top: 0.5rem;
            right: 0.5rem;
            background: rgba(239, 68, 68, 0.9);
            color: white;
            border: none;
            border-radius: 50%;
            width: 24px;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 0.75rem;
        }

        .form-actions {
            display: flex;
            gap: 1rem;
            justify-content: flex-end;
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 1px solid #e2e8f0;
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

            .form-actions {
                flex-direction: column;
            }

            .btn {
                width: 100%;
            }

            .image-preview-container {
                grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
            }
        }
    </style>
@endsection

@section('scripts')
    <script>
        function previewImages(event) {
            const files = event.target.files;
            const previewContainer = document.getElementById('imagePreview');
            previewContainer.innerHTML = '';

            Array.from(files).forEach((file, index) => {
                if (file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const previewItem = document.createElement('div');
                        previewItem.className = 'preview-item';
                        previewItem.innerHTML = `
                            <img src="${e.target.result}" alt="Preview ${index + 1}">
                            <button type="button" class="remove-btn" onclick="removePreview(this, ${index})">
                                <i class="fas fa-times"></i>
                            </button>
                        `;
                        previewContainer.appendChild(previewItem);
                    };
                    reader.readAsDataURL(file);
                }
            });
        }

        function removePreview(button, index) {
            const previewItem = button.parentElement;
            previewItem.remove();
            
            // Reset file input jika semua preview dihapus
            const previewContainer = document.getElementById('imagePreview');
            if (previewContainer.children.length === 0) {
                document.getElementById('gambar').value = '';
            }
        }
    </script>
@endsection