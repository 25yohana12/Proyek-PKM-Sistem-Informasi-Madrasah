@extends('layouts.superadmin')

@section('title', 'Edit Informasi Pendaftaran')

@section('content')
    <div class="page-container">
        <!-- Header Section -->
        <div class="page-header">
            <div class="header-content">
                <h1 class="page-title">
                    <span class="emoji">✏️</span> Edit Informasi Pendaftaran
                </h1>
                <p class="page-subtitle">Ubah informasi pendaftaran siswa baru</p>
            </div>
        </div>

        <!-- Content -->
        <div class="content-card">
            <div class="card-header">
                <h2 class="card-title">
                    <i class="fas fa-edit"></i>
                    Form Edit Informasi Pendaftaran
                </h2>
            </div>
            <div class="card-body">
                <form action="{{ route('superadmin.informasipendaftaran.update', $informasi->informasi_id) }}" method="POST" class="modern-form" id="informasiForm">
                    @csrf
                    @method('PUT')

                    <!-- Tahun Ajaran -->
                    <div class="form-group">
                        <label for="tahunAjaran" class="form-label">
                            <i class="fas fa-calendar-alt"></i>
                            Tahun Ajaran
                        </label>
                        <input type="text" 
                               id="tahunAjaran" 
                               name="tahunAjaran" 
                               class="form-control @error('tahunAjaran') is-invalid @enderror" 
                               value="{{ old('tahunAjaran', $informasi->tahunAjaran) }}" 
                               placeholder="Contoh: 2025/2026"
                               required>
                        @error('tahunAjaran')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Tanggal Pendaftaran -->
                    <div class="form-group">
                        <label for="tanggalPendaftaran" class="form-label">
                            <i class="fas fa-calendar-plus"></i>
                            Tanggal Mulai Pendaftaran
                        </label>
                        <input type="date" 
                               id="tanggalPendaftaran" 
                               name="tanggalPendaftaran" 
                               class="form-control @error('tanggalPendaftaran') is-invalid @enderror" 
                               value="{{ old('tanggalPendaftaran', $informasi->tanggalPendaftaran?->format('Y-m-d')) }}"
                               onchange="validateDates()"
                               required>
                        @error('tanggalPendaftaran')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div id="tanggalPendaftaranError" class="invalid-feedback" style="display: none;"></div>
                    </div>

                    <!-- Tanggal Penutupan -->
                    <div class="form-group">
                        <label for="tanggalPenutupan" class="form-label">
                            <i class="fas fa-calendar-times"></i>
                            Tanggal Penutupan Pendaftaran
                        </label>
                        <input type="date" 
                               id="tanggalPenutupan" 
                               name="tanggalPenutupan" 
                               class="form-control @error('tanggalPenutupan') is-invalid @enderror" 
                               value="{{ old('tanggalPenutupan', $informasi->tanggalPenutupan?->format('Y-m-d')) }}"
                               onchange="validateDates()"
                               required>
                        @error('tanggalPenutupan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div id="tanggalPenutupanError" class="invalid-feedback" style="display: none;"></div>
                    </div>

                    <!-- Tanggal Pengumuman -->
                    <div class="form-group">
                        <label for="tanggalPengumuman" class="form-label">
                            <i class="fas fa-bullhorn"></i>
                            Tanggal Pengumuman Hasil
                        </label>
                        <input type="date" 
                               id="tanggalPengumuman" 
                               name="tanggalPengumuman" 
                               class="form-control @error('tanggalPengumuman') is-invalid @enderror" 
                               value="{{ old('tanggalPengumuman', $informasi->tanggalPengumuman?->format('Y-m-d')) }}"
                               onchange="validateDates()"
                               required>
                        @error('tanggalPengumuman')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div id="tanggalPengumumanError" class="invalid-feedback" style="display: none;"></div>
                    </div>

                    <!-- Jumlah Siswa -->
                    <div class="form-group">
                        <label for="jumlahSiswa" class="form-label">
                            <i class="fas fa-users"></i>
                            Kuota Siswa Baru
                        </label>
                        <input type="number" 
                               id="jumlahSiswa" 
                               name="jumlahSiswa" 
                               class="form-control @error('jumlahSiswa') is-invalid @enderror" 
                               value="{{ old('jumlahSiswa', $informasi->jumlahSiswa) }}" 
                               min="0"
                               required>
                        @error('jumlahSiswa')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Pengumuman -->
                    <div class="form-group">
                        <label for="pengumuman" class="form-label">
                            <i class="fas fa-bullhorn"></i>
                            Pengumuman
                        </label>
                        <textarea id="pengumuman" 
                                  name="pengumuman" 
                                  class="form-control @error('pengumuman') is-invalid @enderror" 
                                  rows="5"
                                  placeholder="Masukkan pengumuman terkait pendaftaran...">{{ old('pengumuman', $informasi->pengumuman) }}</textarea>
                        @error('pengumuman')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Form Actions -->
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary" id="submitBtn">
                            <i class="fas fa-save"></i>
                            <span>Simpan Perubahan</span>
                        </button>
                        <a href="{{ route('superadmin.informasipendaftaran.index') }}" class="btn btn-secondary">
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
            max-width: 600px;
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

        .btn-back {
            background: linear-gradient(135deg, #3b82f6, #2563eb);
            color: white;
            box-shadow: 0 4px 15px rgba(59, 130, 246, 0.3);
        }

        .btn-back:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(59, 130, 246, 0.4);
        }

        @media (max-width: 768px) {
            .form-actions {
                flex-direction: column;
            }
            
            .btn {
                width: 100%;
            }
        }
    </style>
@endsection

@section('scripts')
<script>
function validateDates() {
    const tanggalPendaftaran = document.getElementById('tanggalPendaftaran').value;
    const tanggalPenutupan = document.getElementById('tanggalPenutupan').value;
    const tanggalPengumuman = document.getElementById('tanggalPengumuman').value;
    
    // Clear previous errors
    clearErrors();
    
    let isValid = true;
    
    // Convert to Date objects for comparison
    const startDate = new Date(tanggalPendaftaran + 'T00:00:00');
    const endDate = new Date(tanggalPenutupan + 'T00:00:00');
    const announcementDate = new Date(tanggalPengumuman + 'T00:00:00');
    
    // Validate start date is not in the past (optional)
    const today = new Date();
    today.setHours(0, 0, 0, 0);
    
    if (tanggalPendaftaran && startDate < today) {
        showError('tanggalPendaftaran', 'Tanggal pendaftaran tidak boleh di masa lalu');
        isValid = false;
    }
    
    // Validate end date is after start date
    if (tanggalPendaftaran && tanggalPenutupan) {
        if (endDate <= startDate) {
            showError('tanggalPenutupan', 'Tanggal penutupan harus setelah tanggal mulai pendaftaran');
            isValid = false;
        }
    }
    
    // Validate announcement date is after end date
    if (tanggalPenutupan && tanggalPengumuman) {
        if (announcementDate <= endDate) {
            showError('tanggalPengumuman', 'Tanggal pengumuman harus setelah tanggal penutupan pendaftaran');
            isValid = false;
        }
    }
    
    // Validate announcement date is after start date
    if (tanggalPendaftaran && tanggalPengumuman) {
        if (announcementDate <= startDate) {
            showError('tanggalPengumuman', 'Tanggal pengumuman harus setelah tanggal mulai pendaftaran');
            isValid = false;
        }
    }
    
    // Enable/disable submit button
    const submitBtn = document.getElementById('submitBtn');
    if (isValid) {
        submitBtn.disabled = false;
        submitBtn.style.opacity = '1';
        submitBtn.style.cursor = 'pointer';
    } else {
        submitBtn.disabled = true;
        submitBtn.style.opacity = '0.6';
        submitBtn.style.cursor = 'not-allowed';
    }
    
    return isValid;
}

function showError(fieldId, message) {
    const field = document.getElementById(fieldId);
    const errorDiv = document.getElementById(fieldId + 'Error');
    
    field.classList.add('is-invalid');
    errorDiv.textContent = message;
    errorDiv.style.display = 'block';
}

function clearErrors() {
    const fields = ['tanggalPendaftaran', 'tanggalPenutupan', 'tanggalPengumuman'];
    
    fields.forEach(fieldId => {
        const field = document.getElementById(fieldId);
        const errorDiv = document.getElementById(fieldId + 'Error');
        
        field.classList.remove('is-invalid');
        if (errorDiv) {
            errorDiv.style.display = 'none';
            errorDiv.textContent = '';
        }
    });
}

// Form submission validation
document.getElementById('informasiForm').addEventListener('submit', function(e) {
    if (!validateDates()) {
        e.preventDefault();
        alert('Mohon perbaiki tanggal yang tidak valid sebelum menyimpan!');
        return false;
    }
});

// Initialize validation on page load
document.addEventListener('DOMContentLoaded', function() {
    validateDates();
});
</script>
@endsection