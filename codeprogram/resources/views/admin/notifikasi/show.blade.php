@php
    $notifikasis = \App\Models\Notifikasi::whereNull('data_id')->orderBy('created_at', 'desc')->get();
@endphp
@extends('layouts.superadmin')

@section('content')
<style>
    /* Custom styling for action buttons */
    .action-buttons {
        margin-top: 25px;
        display: flex;
        gap: 12px;
        align-items: center;
        flex-wrap: wrap;
    }
    
    .btn-action {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 12px 24px;
        font-weight: 600;
        border-radius: 8px;
        transition: all 0.3s ease;
        text-decoration: none;
        border: none;
        cursor: pointer;
        font-size: 14px;
        min-width: 130px;
        justify-content: center;
    }
    
    .btn-back {
        background-color: #6c757d;
        color: white;
        border: 2px solid #6c757d;
    }
    
    .btn-back:hover {
        background-color: #5a6268;
        border-color: #545b62;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(108, 117, 125, 0.3);
        color: white;
        text-decoration: none;
    }
    
    .btn-approve {
        background-color: #28a745;
        color: white;
        border: 2px solid #28a745;
    }
    
    .btn-approve:hover {
        background-color: #218838;
        border-color: #1e7e34;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(40, 167, 69, 0.4);
        color: white;
    }
    
    .btn-reject {
        background-color: #dc3545;
        color: white;
        border: 2px solid #dc3545;
    }
    
    .btn-reject:hover {
        background-color: #c82333;
        border-color: #bd2130;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(220, 53, 69, 0.4);
        color: white;
    }
    
    .btn-comment {
        background-color: #ffc107;
        color: #212529;
        border: 2px solid #ffc107;
    }
    
    .btn-comment:hover {
        background-color: #e0a800;
        border-color: #d39e00;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(255, 193, 7, 0.4);
        color: #212529;
    }
    
    /* Modal styling */
    .modal-header {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        border-bottom: 2px solid #dee2e6;
        border-radius: 8px 8px 0 0;
    }
    
    .modal-title {
        color: #495057;
        font-weight: 700;
        font-size: 18px;
    }
    
    .modal-content {
        border-radius: 12px;
        border: none;
        box-shadow: 0 10px 30px rgba(0,0,0,0.15);
    }
    
    .form-control:focus {
        border-color: #ffc107;
        box-shadow: 0 0 0 0.25rem rgba(255, 193, 7, 0.25);
    }
    
    .modal-footer {
        border-top: 2px solid #dee2e6;
        padding: 20px;
    }
    
    /* Icon styling */
    .btn-action i {
        font-size: 16px;
    }
    
    /* Responsive design */
    @media (max-width: 768px) {
        .action-buttons {
            flex-direction: column;
            align-items: stretch;
        }
        
        .btn-action {
            margin-bottom: 8px;
            min-width: auto;
        }
    }
    
    /* Success/Error alert styling */
    .alert-custom {
        border-radius: 8px;
        border: none;
        font-weight: 500;
    }
    
    /* Table enhancements */
    .table-bordered th {
        background-color: #f8f9fa;
        font-weight: 600;
        color: #495057;
        width: 200px;
        border-color: #dee2e6;
    }
    
    .table-bordered td {
        vertical-align: middle;
        border-color: #dee2e6;
    }
    
    .table-bordered img {
        border-radius: 6px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        transition: transform 0.3s ease;
    }
    
    .table-bordered img:hover {
        transform: scale(1.1);
        box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        box-shadow: 0 4px 15px rgba(0,0,0,0.2);
    }
    
    /* Status badge styling */
    .status-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 8px 16px;
        border-radius: 20px;
        font-weight: 600;
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .status-belum {
        background-color: #fff3cd;
        color: #856404;
        border: 2px solid #ffc107;
    }
    
    .status-diterima {
        background-color: #d1e7dd;
        color: #0f5132;
        border: 2px solid #28a745;
    }
    
    .status-ditolak {
        background-color: #f8d7da;
        color: #721c24;
        border: 2px solid #dc3545;
    }
    
    .status-icon {
        font-size: 16px;
    }
</style>
<div class="container py-4">
    <h2 class="mb-4">Detail Pendaftar</h2>
    @if($pendaftar)
        <table class="table table-bordered">
            <tr><th>Nama Pendaftar</th><td>{{ $pendaftar->namaPendaftar }}</td></tr>
            <tr><th>Email</th><td>{{ $pendaftar->email }}</td></tr>
            <tr>
                <th>Status Pendaftaran</th>
                <td>
                    @if($pendaftar->konfirmasi == 'Diterima')
                        <span class="status-badge status-diterima">
                            <i class="fas fa-check-circle status-icon"></i>
                            Diterima
                        </span>
                    @elseif($pendaftar->konfirmasi == 'Ditolak')
                        <span class="status-badge status-ditolak">
                            <i class="fas fa-times-circle status-icon"></i>
                            Ditolak
                        </span>
                    @else
                        <span class="status-badge status-belum">
                            <i class="fas fa-clock status-icon"></i>
                            Menunggu Konfirmasi
                        </span>
                    @endif
                </td>
            </tr>
            <tr><th>NISN</th><td>{{ $pendaftar->nisn }}</td></tr>
            <tr><th>Telepon</th><td>{{ $pendaftar->telepon }}</td></tr>
            <tr><th>Tempat Lahir</th><td>{{ $pendaftar->tempatLahir }}</td></tr>
            <tr><th>Tanggal Lahir</th><td>{{ $pendaftar->tanggalLahir }}</td></tr>
            <tr><th>Jenis Kelamin</th><td>{{ $pendaftar->jenisKelamin }}</td></tr>
            <tr><th>Alamat</th><td>{{ $pendaftar->alamat }}</td></tr>
            <tr><th>Kewarganegaraan</th><td>{{ $pendaftar->kewarganegaraan }}</td></tr>
            <tr><th>Agama</th><td>{{ $pendaftar->agama }}</td></tr>
            <tr><th>Cita-cita</th><td>{{ $pendaftar->citaCita }}</td></tr>
            <tr><th>Hobi</th><td>{{ $pendaftar->hobi }}</td></tr>
            <tr><th>Pembiaya</th><td>{{ $pendaftar->pembiaya }}</td></tr>
            <tr><th>Kebutuhan Khusus</th><td>{{ $pendaftar->kebutuhanKhusus }}</td></tr>
            <tr><th>Pra Sekolah</th><td>{{ $pendaftar->praSekolah }}</td></tr>
            <tr><th>No. KK</th><td>{{ $pendaftar->noKartuKeluarga }}</td></tr>
            <tr><th>Kepala Keluarga</th><td>{{ $pendaftar->kepalaKeluarga }}</td></tr>
            <tr>
                <th>Foto Kartu Keluarga</th>
                <td>
                    @if($pendaftar->fotoKartuKeluarga)
                        <a href="{{ asset('storage/'.$pendaftar->fotoKartuKeluarga) }}" target="_blank">
                            <img src="{{ asset('storage/'.$pendaftar->fotoKartuKeluarga) }}" alt="KK" style="max-width:120px;max-height:120px;">
                        </a>
                    @else
                        <span class="text-muted">Belum diupload</span>
                    @endif
                </td>
            </tr>
            <tr>
                <th>Foto Akte Lahir</th>
                <td>
                    @if($pendaftar->fotoAkteLahir)
                        <a href="{{ asset('storage/'.$pendaftar->fotoAkteLahir) }}" target="_blank">
                            <img src="{{ asset('storage/'.$pendaftar->fotoAkteLahir) }}" alt="Akte" style="max-width:120px;max-height:120px;">
                        </a>
                    @else
                        <span class="text-muted">Belum diupload</span>
                    @endif
                </td>
            </tr>
            <tr>
                <th>Foto Pendaftar</th>
                <td>
                    @if($pendaftar->fotoPendaftar)
                        <a href="{{ asset('storage/'.$pendaftar->fotoPendaftar) }}" target="_blank">
                            <img src="{{ asset('storage/'.$pendaftar->fotoPendaftar) }}" alt="Foto" style="max-width:120px;max-height:120px;">
                        </a>
                    @else
                        <span class="text-muted">Belum diupload</span>
                    @endif
                </td>
            </tr>
            <tr><th>Nama Ayah</th><td>{{ $pendaftar->namaAyah }}</td></tr>
            <tr><th>Status Ayah</th><td>{{ $pendaftar->statusAyah }}</td></tr>
            <tr><th>NIK Ayah</th><td>{{ $pendaftar->nikAyah }}</td></tr>
            <tr><th>Tempat Lahir Ayah</th><td>{{ $pendaftar->tempatLahirAyah }}</td></tr>
            <tr><th>Tanggal Lahir Ayah</th><td>{{ $pendaftar->tanggalLahirAyah }}</td></tr>
            <tr><th>Pendidikan Ayah</th><td>{{ $pendaftar->pendidikanAyah }}</td></tr>
            <tr><th>Pekerjaan Ayah</th><td>{{ $pendaftar->pekerjaanAyah }}</td></tr>
            <tr><th>Pendapatan Ayah</th><td>{{ $pendaftar->pendapatanAyah }}</td></tr>
            <tr><th>Nama Ibu</th><td>{{ $pendaftar->namaIbu }}</td></tr>
            <tr><th>Status Ibu</th><td>{{ $pendaftar->statusIbu }}</td></tr>
            <tr><th>NIK Ibu</th><td>{{ $pendaftar->nikIbu }}</td></tr>
            <tr><th>Tempat Lahir Ibu</th><td>{{ $pendaftar->tempatLahirIbu }}</td></tr>
            <tr><th>Tanggal Lahir Ibu</th><td>{{ $pendaftar->tanggalLahirIbu }}</td></tr>
            <tr><th>Pendidikan Ibu</th><td>{{ $pendaftar->pendidikanIbu }}</td></tr>
            <tr><th>Pekerjaan Ibu</th><td>{{ $pendaftar->pekerjaanIbu }}</td></tr>
            <tr><th>Pendapatan Ibu</th><td>{{ $pendaftar->pendapatanIbu }}</td></tr>
            <tr><th>Nama Wali</th><td>{{ $pendaftar->namaWali }}</td></tr>
            <tr><th>Status Wali</th><td>{{ $pendaftar->statusWali }}</td></tr>
            <tr><th>NIK Wali</th><td>{{ $pendaftar->nikWali }}</td></tr>
            <tr><th>Tempat Lahir Wali</th><td>{{ $pendaftar->tempatLahirWali }}</td></tr>
            <tr><th>Tanggal Lahir Wali</th><td>{{ $pendaftar->tanggalLahirWali }}</td></tr>
            <tr><th>Pendidikan Wali</th><td>{{ $pendaftar->pendidikanWali }}</td></tr>
            <tr><th>Pekerjaan Wali</th><td>{{ $pendaftar->pekerjaanWali }}</td></tr>
            <tr><th>Pendapatan Wali</th><td>{{ $pendaftar->pendapatanWali }}</td></tr>
            <tr><th>Provinsi</th><td>{{ $pendaftar->provinsi }}</td></tr>
            <tr><th>Kabupaten</th><td>{{ $pendaftar->kabupaten }}</td></tr>
            <tr><th>Status Rumah</th><td>{{ $pendaftar->statusRumah }}</td></tr>
            <tr><th>Kecamatan</th><td>{{ $pendaftar->kecamatan }}</td></tr>
            <tr><th>Desa</th><td>{{ $pendaftar->desa }}</td></tr>
            <tr><th>Jarak Rumah</th><td>{{ $pendaftar->jarakRumah }}</td></tr>
            <tr><th>Kendaraan</th><td>{{ $pendaftar->kendaraan }}</td></tr>
            <tr><th>Waktu Perjalanan</th><td>{{ $pendaftar->waktuPerjalanan }}</td></tr>
        </table>
        
        <!-- Action Buttons -->
        <div class="action-buttons">
            <a href="{{ route('admin.dashboard') }}" class="btn-action btn-back">
                <i class="fas fa-arrow-left"></i> Kembali ke Dashboard
            </a>
            
            @if($pendaftar->konfirmasi == 'Belum')
                <!-- Form Terima -->
                <form action="{{ route('admin.pendaftar.terima', $pendaftar->pendaftar_id) }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn-action btn-approve" onclick="return confirm('Terima pendaftar ini?')">
                        <i class="fas fa-check-circle"></i> Terima
                    </button>
                </form>

                <!-- Form Tolak -->
                <form action="{{ route('admin.pendaftar.tolak', $pendaftar->pendaftar_id) }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn-action btn-reject" onclick="return confirm('Tolak pendaftar ini?')">
                        <i class="fas fa-times-circle"></i> Tolak
                    </button>
                </form>
            @elseif($pendaftar->konfirmasi == 'Diterima')
                <div class="alert alert-success alert-custom">
                    <i class="fas fa-info-circle me-2"></i>
                    <strong>Status:</strong> Pendaftar ini sudah <strong>DITERIMA</strong>
                </div>
            @elseif($pendaftar->konfirmasi == 'Ditolak')
                <div class="alert alert-danger alert-custom">
                    <i class="fas fa-info-circle me-2"></i>
                    <strong>Status:</strong> Pendaftar ini sudah <strong>DITOLAK</strong>
                </div>
            @endif
            
            <!-- Modal Komentar tetap bisa digunakan -->
            <button type="button" class="btn-action btn-comment" data-bs-toggle="modal" data-bs-target="#komentarModal">
                <i class="fas fa-comment-dots"></i> Komentar
            </button>
        </div>
        
        <!-- Modal Komentar -->
        <div class="modal fade" id="komentarModal" tabindex="-1" aria-labelledby="komentarModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form action="{{ route('admin.pendaftar.komentar', $pendaftar->pendaftar_id) }}" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="komentarModalLabel">
                                <i class="fas fa-comment-alt me-2"></i>Kirim Komentar ke Pendaftar
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="komentar" class="form-label fw-bold">
                                    Komentar untuk: <span class="text-primary">{{ $pendaftar->namaPendaftar }}</span>
                                </label>
                                <textarea class="form-control" id="komentar" name="komentar" rows="5" 
                                    placeholder="Tuliskan komentar atau catatan untuk pendaftar...&#10;&#10;Contoh:&#10;- Mohon lengkapi dokumen yang masih kurang&#10;- Perlu perbaikan pada data orangtua&#10;- Silakan hubungi admin untuk informasi lebih lanjut" required></textarea>
                            </div>
                            <div class="alert alert-info alert-custom">
                                <i class="fas fa-info-circle me-2"></i>
                                <strong>Informasi:</strong> Komentar ini akan dikirim ke notifikasi siswa dan email: 
                                <strong>{{ $pendaftar->email }}</strong>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                <i class="fas fa-times"></i> Batal
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-paper-plane"></i> Kirim Komentar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @else
        <div class="alert alert-warning alert-custom">
            <i class="fas fa-exclamation-triangle me-2"></i>
            Data pendaftar tidak ditemukan.
        </div>
        <div class="action-buttons">
            <a href="#" class="btn-action btn-back" onclick="goBack()">
                <i class="fas fa-arrow-left"></i> Kembali ke Dashboard
            </a>
        </div>
    @endif
</div>

<script>
    // Frontend-only functions (no backend calls)
    function goBack() {
        // Simulate going back to dashboard
        alert('Kembali ke Dashboard (Frontend Only)');
        // window.history.back(); // Uncomment this for actual back functionality
    }
    
    function showApproveConfirm() {
        if (confirm('Apakah Anda yakin ingin MENERIMA pendaftar ini?\n\nPendaftar: {{ $pendaftar->namaPendaftar ?? "Nama Pendaftar" }}')) {
            alert('✅ Pendaftar DITERIMA!\n(Frontend Only - Backend belum diimplementasi)');
            // Here you would normally make an AJAX call or form submission
        }
    }
    
    function showRejectConfirm() {
        if (confirm('Apakah Anda yakin ingin MENOLAK pendaftar ini?\n\nPendaftar: {{ $pendaftar->namaPendaftar ?? "Nama Pendaftar" }}')) {
            alert('❌ Pendaftar DITOLAK!\n(Frontend Only - Backend belum diimplementasi)');
            // Here you would normally make an AJAX call or form submission
        }
    }
    
    function sendComment() {
        const comment = document.getElementById('komentar').value.trim();
        
        if (comment === '') {
            alert('Mohon isi komentar terlebih dahulu!');
            return;
        }
        
        if (confirm('Kirim komentar ini ke {{ $pendaftar->email ?? "email@pendaftar.com" }}?\n\nKomentar:\n' + comment)) {
            alert('💬 Komentar berhasil dikirim!\n(Frontend Only - Backend belum diimplementasi)');
            
            // Close modal and reset form
            const modal = bootstrap.Modal.getInstance(document.getElementById('komentarModal'));
            modal.hide();
            document.getElementById('komentar').value = '';
        }
    }
    
    // Add some visual feedback for button interactions
    document.addEventListener('DOMContentLoaded', function() {
        const buttons = document.querySelectorAll('.btn-action');
        
        buttons.forEach(button => {
            button.addEventListener('click', function() {
                // Add a ripple effect
                this.style.transform = 'scale(0.95)';
                setTimeout(() => {
                    this.style.transform = '';
                }, 150);
            });
        });
    });
</script>

@endsection