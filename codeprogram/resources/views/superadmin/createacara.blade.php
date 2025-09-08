@extends('layouts.superadmin')

@section('title', 'Tambah Acara')

@section('content')
    <div class="page-container">
        <!-- Header Section -->
        <div class="page-header">
            <div class="header-content">
                <h1 class="page-title">
                    <span class="emoji">🎉</span> Tambah Acara
                </h1>
                <p class="page-subtitle">Buat acara dan perayaan madrasah baru</p>
            </div>
        </div>

        <!-- Error Messages -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-circle"></i>
                <div class="alert-content">
                    <h4>Terjadi kesalahan:</h4>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <!-- Form Card -->
        <div class="content-card">
            <div class="card-header">
                <h2 class="card-title">
                    <i class="fas fa-plus-circle"></i>
                    Form Tambah Acara
                </h2>
            </div>

            <div class="card-body">
                <form action="{{ route('superadmin.acara.store') }}" method="POST" enctype="multipart/form-data" class="modern-form">
                    @csrf

                    <!-- Judul Acara -->
                    <div class="form-group">
                        <label for="judul" class="form-label">
                            <i class="fas fa-heading"></i>
                            Judul Acara
                        </label>
                        <input type="text" 
                               id="judul" 
                               name="judul" 
                               class="form-control @error('judul') is-invalid @enderror" 
                               value="{{ old('judul') }}" 
                               placeholder="Masukkan judul acara..."
                               required>
                        @error('judul')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Deskripsi Acara -->
                    <div class="form-group">
                    <label for="deskripsi" class="form-label">
                        <i class="fas fa-align-left"></i>
                        Deskripsi Acara
                    </label>

                    <textarea id="deskripsi"
                                name="deskripsi"
                                class="form-control @error('deskripsi') is-invalid @enderror"
                                rows="4"
                                placeholder="Masukkan deskripsi acara..."
                                required>{{ old('deskripsi') }}</textarea>

                    <div class="d-flex justify-content-between mt-1" style="font-size:.875rem;">
                        <small id="deskripsiCounter">0 / 249 kata</small>
                        <small id="deskripsiHint" style="color:#64748b;">Batas <strong>&lt; 250</strong> kata</small>
                    </div>

                    @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    </div>

                    <!-- Tanggal Acara -->
                    <div class="form-group">
                        <label for="tanggalAcara" class="form-label">
                            <i class="fas fa-calendar-alt"></i>
                            Tanggal Acara
                        </label>
                        <input type="date" 
                               id="tanggalAcara" 
                               name="tanggalAcara" 
                               class="form-control @error('tanggalAcara') is-invalid @enderror" 
                               value="{{ old('tanggalAcara') }}" 
                               required>
                        @error('tanggalAcara')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Upload Gambar -->
                    <div class="form-group">
                        <label for="gambar" class="form-label">
                            <i class="fas fa-images"></i>
                            Foto Acara (Opsional)
                        </label>
                        <div class="file-upload-area">
                            <input type="file" 
                                   id="gambar" 
                                   name="gambar[]" 
                                   class="file-input @error('gambar') is-invalid @enderror" 
                                   accept="image/*" 
                                   multiple>
                            <div class="file-upload-content">
                                <div class="file-upload-icon">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                </div>
                                <h3>Upload Foto Acara</h3>
                                <p>Klik untuk memilih atau drag & drop file</p>
                                <div class="file-requirements">
                                    <span class="requirement">✓ Format: JPG, PNG, GIF</span>
                                    <span class="requirement">✓ Maksimal: 2MB per file</span>
                                    <span class="requirement">✓ Jumlah: Bebas (bisa kosong)</span>
                                </div>
                            </div>
                        </div>
                        @error('gambar')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Preview Area -->
                    <div class="form-group">
                        <div id="imagePreview" class="image-preview-area" style="display: none;">
                            <div class="preview-header">
                                <h4>
                                    <i class="fas fa-eye"></i>
                                    Preview Gambar
                                </h4>
                                <button type="button" class="clear-btn" onclick="clearPreviews()">
                                    <i class="fas fa-times"></i>
                                    Hapus Semua
                                </button>
                            </div>
                            <div id="previewContainer" class="preview-container"></div>
                            <div class="preview-footer">
                                <span id="fileCount" class="file-count">0 file dipilih</span>
                            </div>
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i>
                            <span>Simpan Acara</span>
                        </button>
                        <a href="{{ route('superadmin.acara.index') }}" class="btn btn-secondary">
                            <i class="fas fa-times"></i>
                            <span>Batal</span>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
document.addEventListener('DOMContentLoaded', function () {
  const textarea = document.getElementById('deskripsi');
  const counter  = document.getElementById('deskripsiCounter');
  const hint     = document.getElementById('deskripsiHint');
  const LIMIT    = 249; // < 250 kata

  function countWords(text) {
    const clean = (text || '')
      .replace(/<[^>]*>/g, '')      // buang HTML bila ada
      .trim()
      .replace(/\s+/g, ' ');
    if (!clean) return 0;
    return clean.split(' ').filter(Boolean).length;
  }

  function updateState() {
    const words = countWords(textarea.value);
    counter.textContent = `${words} / ${LIMIT} kata`;

    // reset validasi
    textarea.setCustomValidity('');
    textarea.classList.remove('is-invalid');
    hint.style.color = '#64748b';

    if (words >= 250) {
      const msg = `Deskripsi maksimal 249 kata. Saat ini: ${words} kata.`;
      textarea.setCustomValidity(msg);   // blokir submit
      textarea.classList.add('is-invalid');
      hint.style.color = '#ef4444';      // beri peringatan merah
      // munculkan popup validasi saat ini juga (opsional):
      // textarea.reportValidity();
    }
  }

  updateState();
  textarea.addEventListener('input', updateState);
});
</script>
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
            align-items: flex-start;
            gap: 0.75rem;
            padding: 1.5rem;
            border-radius: 12px;
            margin-bottom: 1.5rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .alert-danger {
            background: linear-gradient(135deg, #fee2e2, #fecaca);
            color: #991b1b;
            border-left: 4px solid #ef4444;
        }

        .alert-content h4 {
            margin: 0 0 0.5rem 0;
            font-weight: 600;
        }

        .alert-content ul {
            margin: 0;
            padding-left: 1.5rem;
        }

        .alert-content li {
            margin-bottom: 0.25rem;
        }

        /* Content Card */
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

        /* Form Styles */
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

        /* File Upload Area */
        .file-upload-area {
            position: relative;
            border: 2px dashed #cbd5e0;
            border-radius: 12px;
            padding: 2rem;
            text-align: center;
            transition: all 0.3s ease;
            background: #f8fafc;
        }

        .file-upload-area:hover {
            border-color: #6D8D79;
            background: #f0f9ff;
        }

        .file-upload-area.dragover {
            border-color: #6D8D79;
            background: #ecfdf5;
        }

        .file-input {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
        }

        .file-upload-content {
            pointer-events: none;
        }

        .file-upload-icon {
            font-size: 3rem;
            color: #6D8D79;
            margin-bottom: 1rem;
        }

        .file-upload-content h3 {
            font-size: 1.25rem;
            font-weight: 600;
            color: #2d3748;
            margin-bottom: 0.5rem;
        }

        .file-upload-content p {
            color: #64748b;
            margin-bottom: 1rem;
        }

        .file-requirements {
            display: flex;
            flex-direction: column;
            gap: 0.25rem;
        }

        .requirement {
            font-size: 0.875rem;
            color: #059669;
            font-weight: 500;
        }

        /* Image Preview */
        .image-preview-area {
            background: #f8fafc;
            border-radius: 12px;
            padding: 1.5rem;
            border: 1px solid #e2e8f0;
        }

        .preview-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .preview-header h4 {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 1.125rem;
            font-weight: 600;
            color: #2d3748;
            margin: 0;
        }

        .preview-header i {
            color: #6D8D79;
        }

        .clear-btn {
            background: #ef4444;
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 6px;
            font-size: 0.875rem;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .clear-btn:hover {
            background: #dc2626;
        }

        .preview-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .preview-item {
            position: relative;
            border-radius: 8px;
            overflow: hidden;
            background: white;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .preview-image {
            width: 100%;
            height: 150px;
            object-fit: cover;
        }

        .preview-info {
            padding: 0.75rem;
        }

        .preview-name {
            font-size: 0.875rem;
            font-weight: 500;
            color: #2d3748;
            margin-bottom: 0.25rem;
        }

        .preview-size {
            font-size: 0.75rem;
            color: #64748b;
        }

        .remove-btn {
            position: absolute;
            top: 0.5rem;
            right: 0.5rem;
            width: 24px;
            height: 24px;
            background: rgba(239, 68, 68, 0.9);
            color: white;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.75rem;
        }

        .remove-btn:hover {
            background: #dc2626;
        }

        .preview-footer {
            text-align: center;
            padding-top: 1rem;
            border-top: 1px solid #e2e8f0;
        }

        .file-count {
            background: linear-gradient(135deg, #6D8D79, #5a7466);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.875rem;
            font-weight: 600;
        }

        /* Form Actions */
        .form-actions {
            display: flex;
            gap: 1rem;
            justify-content: flex-end;
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 1px solid #e2e8f0;
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

            .modern-form {
                max-width: 100%;
            }

            .form-actions {
                flex-direction: column;
            }

            .btn {
                width: 100%;
            }

            .preview-container {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 576px) {
            .page-title {
                font-size: 1.5rem;
            }

            .card-body {
                padding: 1rem;
            }

            .file-upload-area {
                padding: 1rem;
            }

            .file-upload-icon {
                font-size: 2rem;
            }
        }
    </style>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const fileInput = document.getElementById('gambar');
            const fileUploadArea = document.querySelector('.file-upload-area');
            const previewArea = document.getElementById('imagePreview');
            const previewContainer = document.getElementById('previewContainer');
            const fileCountSpan = document.getElementById('fileCount');
            let selectedFiles = [];

            // File input change handler
            fileInput.addEventListener('change', function(e) {
                handleFiles(e.target.files);
            });

            // Drag and drop handlers
            fileUploadArea.addEventListener('dragover', function(e) {
                e.preventDefault();
                fileUploadArea.classList.add('dragover');
            });

            fileUploadArea.addEventListener('dragleave', function(e) {
                e.preventDefault();
                fileUploadArea.classList.remove('dragover');
            });

            fileUploadArea.addEventListener('drop', function(e) {
                e.preventDefault();
                fileUploadArea.classList.remove('dragover');
                handleFiles(e.dataTransfer.files);
            });

            function handleFiles(files) {
                // Convert FileList to Array and add to existing files
                const newFiles = Array.from(files);
                
                // Validate file types and sizes
                const validTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
                const maxSize = 2 * 1024 * 1024; // 2MB

                for (let file of newFiles) {
                    if (!validTypes.includes(file.type)) {
                        alert(`Format file "${file.name}" tidak valid. Harap pilih file JPG, PNG, atau GIF.`);
                        return;
                    }
                    if (file.size > maxSize) {
                        alert(`Ukuran file "${file.name}" terlalu besar. Maksimal 2MB per file.`);
                        return;
                    }
                }

                // Add new files to existing selection
                selectedFiles = [...selectedFiles, ...newFiles];
                
                updateFileInput();
                showPreviews();
            }

            function updateFileInput() {
                const dt = new DataTransfer();
                selectedFiles.forEach(file => dt.items.add(file));
                fileInput.files = dt.files;
            }

            function showPreviews() {
                previewContainer.innerHTML = '';
                
                if (selectedFiles.length === 0) {
                    previewArea.style.display = 'none';
                    return;
                }

                selectedFiles.forEach((file, index) => {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const previewItem = document.createElement('div');
                        previewItem.className = 'preview-item';
                        previewItem.innerHTML = `
                            <img src="${e.target.result}" alt="Preview" class="preview-image">
                            <div class="preview-info">
                                <div class="preview-name">${file.name}</div>
                                <div class="preview-size">${formatFileSize(file.size)}</div>
                            </div>
                            <button type="button" class="remove-btn" onclick="removeFile(${index})">
                                <i class="fas fa-times"></i>
                            </button>
                        `;
                        previewContainer.appendChild(previewItem);
                    };
                    reader.readAsDataURL(file);
                });

                // Update file count
                fileCountSpan.textContent = `${selectedFiles.length} file${selectedFiles.length > 1 ? 's' : ''} dipilih`;
                previewArea.style.display = 'block';
            }

            // Global function to remove file
            window.removeFile = function(index) {
                selectedFiles.splice(index, 1);
                updateFileInput();
                showPreviews();
            };

            // Global function to clear all previews
            window.clearPreviews = function() {
                selectedFiles = [];
                fileInput.value = '';
                previewArea.style.display = 'none';
                previewContainer.innerHTML = '';
            };

            function formatFileSize(bytes) {
                if (bytes === 0) return '0 Bytes';
                const k = 1024;
                const sizes = ['Bytes', 'KB', 'MB', 'GB'];
                const i = Math.floor(Math.log(bytes) / Math.log(k));
                return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
            }
        });
    </script>
@endsection