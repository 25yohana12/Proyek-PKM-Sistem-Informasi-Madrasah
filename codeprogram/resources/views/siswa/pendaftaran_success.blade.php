@extends('layouts.siswa')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center" style="margin-top: 100px;">
            <div class="success-card">
                <div class="success-icon">
                    <i class="fas fa-check-circle"></i>
                </div>
                <h2 class="success-title">Pendaftaran Berhasil!</h2>
                <p class="success-message">Terima kasih telah mendaftar. Data Anda telah berhasil disimpan.</p>
                
                <div class="action-buttons">
                    <a href="{{ route('siswa.siswa.pengumuman') }}" class="btn btn-primary">
                        <i class="fas fa-calendar-alt"></i>
                        Lihat Jadwal
                    </a>
                    <a href="{{ route('siswa.home') }}" class="btn btn-secondary">
                        <i class="fas fa-home"></i>
                        Kembali ke Beranda
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.success-card {
    background: white;
    padding: 3rem 2rem;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    margin-bottom: 2rem;
}

.success-icon {
    font-size: 4rem;
    color: #28a745;
    margin-bottom: 1.5rem;
}

.success-title {
    color: #2d3748;
    font-weight: 700;
    margin-bottom: 1rem;
}

.success-message {
    color: #64748b;
    font-size: 1.1rem;
    margin-bottom: 2rem;
}

.action-buttons {
    display: flex;
    gap: 1rem;
    justify-content: center;
    flex-wrap: wrap;
}

.btn {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.75rem 1.5rem;
    border-radius: 8px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s ease;
}

.btn-primary {
    background: linear-gradient(135deg, #28a745, #20a441);
    color: white;
    border: none;
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(40, 167, 69, 0.3);
    color: white;
    text-decoration: none;
}

.btn-secondary {
    background: #6c757d;
    color: white;
    border: none;
}

.btn-secondary:hover {
    background: #5a6268;
    transform: translateY(-2px);
    color: white;
    text-decoration: none;
}

@media (max-width: 768px) {
    .action-buttons {
        flex-direction: column;
        align-items: center;
    }
    
    .btn {
        width: 100%;
        max-width: 250px;
        justify-content: center;
    }
}
</style>
@endsection
