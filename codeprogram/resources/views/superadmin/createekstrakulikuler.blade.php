@extends('layouts.superadmin')

@section('title', 'Tambah Ekstrakurikuler')

@section('content')
    <div class="page-container">
        <!-- Header Section -->
        <div class="page-header">
            <div class="header-content">
                <h1 class="page-title">
                    <span class="emoji">🎯</span> Ekstrakurikuler Madrasah
                </h1>
                <p class="page-subtitle">Tambahkan ekstrakurikuler baru untuk pengembangan minat siswa</p>
            </div>
            <div class="breadcrumb">
                <a href="{{ route('superadmin.ekstrakurikuler.index') }}" class="breadcrumb-link">
                    <i class="fas fa-users"></i> Ekstrakurikuler
                </a>
                <span class="breadcrumb-separator">/</span>
                <span class="breadcrumb-current">Tambah Ekstrakurikuler</span>
            </div>
        </div>

        <!-- Form Container -->
        <div class="form-container">
            <form action="{{ route('superadmin.ekstrakurikuler.store') }}" method="POST" enctype="multipart/form-data" class="modern-form">
                @csrf

                <!-- Nama Ekstrakurikuler -->
                <div class="form-group">
                    <label for="nama" class="form-label">
                        <i class="fas fa-heading"></i>
                        Nama Ekstrakurikuler
                    </label>
                    <input type="text" 
                           id="nama" 
                           name="namaekstrakulikuler" 
                           class="form-control" 
                           placeholder="Masukkan nama ekstrakurikuler..." 
                           value="{{ old('namaekstrakulikuler') }}" 
                           required>
                    <div class="form-hint">Berikan nama yang menarik untuk ekstrakurikuler ini</div>
                </div>

                <!-- Deskripsi Ekstrakurikuler -->
                <div class="form-group">
                    <label for="deskripsi" class="form-label">
                        <i class="fas fa-align-left"></i>
                        Deskripsi Ekstrakurikuler
                    </label>
                    <textarea id="deskripsi" 
                              name="deskripsi" 
                              class="form-control" 
                              rows="4" 
                              placeholder="Deskripsikan ekstrakurikuler ini..."
                              required>{{ old('deskripsi') }}</textarea>
                    <div class="form-hint">Jelaskan tentang manfaat dan aktivitas dalam ekstrakurikuler ini</div>
                </div>

                <!-- Upload Foto -->
                <div class="form-group">
                    <label for="foto" class="form-label">
                        <i class="fas fa-camera"></i>
                        Upload Foto
                    </label>
                    <div class="file-upload-container">
                        <input type="file" 
                               id="gambar" 
                               name="gambar[]" 
                               class="file-input" 
                               accept="image/*" 
                               multiple 
                               required>
                        <label for="foto" class="file-upload-label">
                            <div class="upload-icon">
                                <i class="fas fa-cloud-upload-alt"></i>
                            </div>
                            <div class="upload-text">
                                <strong>Klik untuk pilih foto</strong>
                                <span>atau drag & drop foto di sini</span>
                            </div>
                            <div class="upload-hint">
                                Pilih beberapa foto sekaligus (JPG, PNG, GIF)
                            </div>
                        </label>
                        <div id="preview-container" class="preview-container"></div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i>
                        <span>Simpan Ekstrakurikuler</span>
                    </button>
                    <a href="{{ route('superadmin.ekstrakurikuler.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i>
                        <span>Kembali</span>
                    </a>
                </div>
            </form>
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

        .breadcrumb {
            display: flex;
            align-items: center;
            font-size: 0.9rem;
            color: #64748b;
        }

        .breadcrumb-link {
            color: #6D8D79;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .breadcrumb-link:hover {
            color: #5a7466;
        }

        .breadcrumb-separator {
            margin: 0 0.5rem;
            color: #cbd5e1;
        }

        .breadcrumb-current {
            color: #2d3748;
            font-weight: 600;
        }

        /* Form Container */
        .form-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .modern-form {
            padding: 3rem;
        }

        /* Form Groups */
        .form-group {
            margin-bottom: 2rem;
        }

        .form-label {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 1.1rem;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 0.75rem;
        }

        .form-label i {
            color: #6D8D79;
            font-size: 1rem;
        }

        .form-control {
            width: 100%;
            padding: 1rem 1.25rem;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: #fafafa;
            font-family: 'Poppins', sans-serif;
        }

        .form-control:focus {
            outline: none;
            border-color: #6D8D79;
            background: white;
            box-shadow: 0 0 0 3px rgba(109, 141, 121, 0.1);
        }

        .form-control::placeholder {
            color: #94a3b8;
        }

        .form-hint {
            font-size: 0.85rem;
            color: #64748b;
            margin-top: 0.5rem;
            font-style: italic;
        }

        /* File Upload Styles */
        .file-upload-container {
            position: relative;
        }

        .file-input {
            position: absolute;
            opacity: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
        }

        .file-upload-label {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 3rem 2rem;
            border: 2px dashed #cbd5e1;
            border-radius: 12px;
            background: #f8fafc;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .file-upload-label:hover {
            border-color: #6D8D79;
            background: #f0f8f5;
        }

        .upload-icon {
            font-size: 3rem;
            color: #6D8D79;
            margin-bottom: 1rem;
        }

        .upload-text {
            text-align: center;
            margin-bottom: 0.5rem;
        }

        .upload-text strong {
            display: block;
            font-size: 1.1rem;
            color: #2d3748;
            margin-bottom: 0.25rem;
        }

        .upload-text span {
            color: #64748b;
            font-size: 0.9rem;
        }

        .upload-hint {
            color: #94a3b8;
            font-size: 0.85rem;
            text-align: center;
        }

        .preview-container {
            margin-top: 1rem;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
            gap: 1rem;
        }

        .preview-item {
            position: relative;
            border-radius: 8px;
            overflow: hidden;
            aspect-ratio: 1;
            background: #f1f5f9;
        }

        .preview-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .preview-remove {
            position: absolute;
            top: 0.5rem;
            right: 0.5rem;
            width: 24px;
            height: 24px;
            background: #ef4444;
            color: white;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.75rem;
            transition: background 0.3s ease;
        }

        .preview-remove:hover {
            background: #dc2626;
        }

        /* Action Buttons */
        .form-actions {
            display: flex;
            gap: 1rem;
            margin-top: 3rem;
            justify-content: flex-end; 
            padding-top: 2rem;
            border-top: 1px solid #e2e8f0;
        }

        .btn {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 1rem 2rem;
            border: none;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            font-family: 'Poppins', sans-serif;
        }

        .btn-primary {
            background: linear-gradient(135deg, #6D8D79, #5a7466);
            color: white;
            box-shadow: 0 8px 25px rgba(109, 141, 121, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 35px rgba(109, 141, 121, 0.4);
            background: linear-gradient(135deg, #5a7466, #4a6356);
        }

        .btn-secondary {
            background: linear-gradient(135deg, #6b7280, #4b5563);
            color: white;
            box-shadow: 0 8px 25px rgba(107, 114, 128, 0.3);
        }

        .btn-secondary:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 35px rgba(107, 114, 128, 0.4);
            background: linear-gradient(135deg, #4b5563, #374151);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .page-container {
                padding: 1rem;
            }

            .page-header {
                flex-direction: column;
                text-align: center;
                gap: 1rem;
            }

            .page-title {
                font-size: 2rem;
            }

            .modern-form {
                padding: 2rem;
            }

            .form-actions {
                flex-direction: column;
            }

            .btn {
                width: 100%;
                justify-content: center;
            }
        }

        @media (max-width: 576px) {
            .page-title {
                font-size: 1.5rem;
            }

            .modern-form {
                padding: 1.5rem;
            }

            .file-upload-label {
                padding: 2rem 1rem;
            }

            .upload-icon {
                font-size: 2rem;
            }
        }
    </style>
@endsection

@section('scripts')
    <script>
        // File upload preview
        document.getElementById('gambar').addEventListener('change', function(e) {
            const previewContainer = document.getElementById('preview-container');
            previewContainer.innerHTML = '';
            
            Array.from(e.target.files).forEach((file, index) => {
                if (file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const previewItem = document.createElement('div');
                        previewItem.className = 'preview-item';
                        previewItem.innerHTML = `
                            <img src="${e.target.result}" class="preview-image" alt="Preview">
                            <button type="button" class="preview-remove" onclick="removePreview(${index})">
                                <i class="fas fa-times"></i>
                            </button>
                        `;
                        previewContainer.appendChild(previewItem);
                    };
                    reader.readAsDataURL(file);
                }
            });
        });

        // Remove preview function
        function removePreview(index) {
            const fileInput = document.getElementById('gambar');
            const dt = new DataTransfer();
            
            Array.from(fileInput.files).forEach((file, i) => {
                if (i !== index) {
                    dt.items.add(file);
                }
            });
            
            fileInput.files = dt.files;
            fileInput.dispatchEvent(new Event('change'));
        }

        // Drag and drop functionality
        const fileUploadLabel = document.querySelector('.file-upload-label');
        
        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            fileUploadLabel.addEventListener(eventName, preventDefaults, false);
        });

        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }

        ['dragenter', 'dragover'].forEach(eventName => {
            fileUploadLabel.addEventListener(eventName, highlight, false);
        });

        ['dragleave', 'drop'].forEach(eventName => {
            fileUploadLabel.addEventListener(eventName, unhighlight, false);
        });

        function highlight(e) {
            fileUploadLabel.style.borderColor = '#6D8D79';
            fileUploadLabel.style.background = '#f0f8f5';
        }

        function unhighlight(e) {
            fileUploadLabel.style.borderColor = '#cbd5e1';
            fileUploadLabel.style.background = '#f8fafc';
        }

        fileUploadLabel.addEventListener('drop', handleDrop, false);

        function handleDrop(e) {
            const dt = e.dataTransfer;
            const files = dt.files;
            
            document.getElementById('gambar').files = files;
            document.getElementById('gambar').dispatchEvent(new Event('change'));
        }
    </script>
@endsection
