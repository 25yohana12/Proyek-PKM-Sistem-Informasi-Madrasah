@extends('layouts.superadmin')

@section('title', 'Data Kelas')

@section('content')
<div class="page-container">
    <!-- Header Section -->
    <div class="page-header">
        <div class="header-content">
            <h1 class="page-title">
                <span class="emoji">🏫</span> Data Siswa
            </h1>
            <p class="page-subtitle">Informasi kelas, wali kelas, dan jumlah murid</p>
        </div>
    </div>

    <!-- Daftar Kelas -->
    <div class="content-card">
        <div class="card-header">
            <h2 class="card-title">
                <i class="fas fa-chalkboard"></i> Daftar Kelas
            </h2>
            <span class="stat-badge">{{ count($siswa) }} Kelas</span>
        </div>
        <div class="card-body">
            @if(count($siswa) > 0)
                <div class="acara-grid">
                    @foreach($siswa as $item)
                        <div class="acara-card">
                            <!-- Foto -->
                            @if($item->gambar)
                                <img src="{{ asset('storage/' . $item->gambar) }}" 
                                     alt="gambar kelas" 
                                     class="acara-image" 
                                     style="height: 200px; width:100%; object-fit: cover;">
                            @else
                                <img src="{{ asset('images/default.jpg') }}" 
                                     alt="default image" 
                                     class="acara-image" 
                                     style="height: 200px; width:100%; object-fit: cover;">
                            @endif

                            <!-- Isi Card -->
                            <div class="acara-content text-center">
                                <h3 class="acara-title">KELAS {{ strtoupper($item->kelas) }}</h3>
                                <p class="acara-description"><strong>Wali Kelas :</strong> {{ $item->namaWali ?? '-' }}</p>
                                <p class="acara-description"><strong>Jumlah Murid :</strong> {{ $item->jumlahMurid ?? 0 }}</p>
                                <p class="acara-description"><strong>Jumlah Siswa :</strong> {{ $item->jumlahSiswa ?? 0 }}</p>
                                <p class="acara-description"><strong>Jumlah Siswi :</strong> {{ $item->jumlahSiswi ?? 0 }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="empty-state">
                    <div class="empty-content">
                        <div class="empty-icon">
                            <i class="fas fa-chalkboard"></i>
                        </div>
                        <h3 class="empty-title">Belum ada data kelas</h3>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    /* Reuse gaya dari halaman Perayaan */
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
    }
    .page-title {
        font-size: 2.5rem;
        font-weight: 800;
        background: linear-gradient(135deg, #6D8D79, #5a7466);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    .page-subtitle {
        color: #64748b;
        font-size: 1.1rem;
        margin: 0;
        font-weight: 500;
    }
    .btn-primary {
        background: linear-gradient(135deg, #6D8D79, #5a7466);
        color: white;
        border: none;
        border-radius: 8px;
        padding: 0.75rem 1.5rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(109, 141, 121, 0.4);
    }
    .content-card {
        background: white;
        border-radius: 20px;
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.1);
        margin-bottom: 2rem;
    }
    .card-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1.5rem 2rem;
        background: #f8fafc;
        border-bottom: 1px solid #e2e8f0;
    }
    .card-title {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 1.5rem;
        font-weight: 700;
        color: #2d3748;
    }
    .stat-badge {
        background: linear-gradient(135deg, #6D8D79, #5a7466);
        color: white;
        padding: 0.4rem 1rem;
        border-radius: 20px;
        font-size: 0.875rem;
        font-weight: 600;
    }
    .acara-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 1.5rem;
        padding: 2rem;
    }
    .acara-card {
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        border: 1px solid #e2e8f0;
        background: white;
        transition: all 0.3s ease;
    }
    .acara-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    }
    .acara-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1rem;
    }
    .acara-actions {
        display: flex;
        gap: 0.5rem;
    }
    .action-btn {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        border: none;
        cursor: pointer;
    }
    .edit-btn {
        background: linear-gradient(135deg, #f59e0b, #d97706);
    }
    .delete-btn {
        background: linear-gradient(135deg, #ef4444, #dc2626);
    }
    .acara-content {
        padding: 1.5rem;
    }
    .acara-title {
        font-size: 1.25rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
        color: #2d3748;
    }
    .acara-description {
        font-size: 0.9rem;
        color: #64748b;
        margin-bottom: 0.25rem;
    }
    .empty-state {
        text-align: center;
        padding: 3rem;
    }
    .empty-icon {
        width: 80px;
        height: 80px;
        background: #f1f5f9;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        color: #94a3b8;
        margin: 0 auto 1rem;
    }
</style>
@endsection
