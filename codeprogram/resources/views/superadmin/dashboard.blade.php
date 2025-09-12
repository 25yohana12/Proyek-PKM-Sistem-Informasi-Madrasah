@extends('layouts.superadmin')

@section('title', 'Dashboard')

@section('content')
<div class="page-container">
    <!-- Header Section -->
    <div class="page-header">
        <div class="header-content">
            <h1 class="page-title">
                <span class="emoji">📊</span> DASHBOARD MIN TOBA SAMOSIR
            </h1>
            <p class="page-subtitle">Pantau data guru, siswa, fasilitas, prestasi, dan aktivitas sekolah</p>
        </div>
    </div>

    <!-- Cards Section -->
    <div class="content-card">
        <div class="card-header">
            <h2 class="card-title">
                <i class="fas fa-gauge-high"></i>
                Ringkasan Data
            </h2>
        </div>
        <div class="card-body">
            <div class="dashboard-grid">
                <a href="{{ route('superadmin.guru.index') }}" class="stat-card">
                    <div class="stat-icon"><i class="fas fa-chalkboard-user"></i></div>
                    <div class="stat-label">Guru</div>
                    <div class="stat-value">{{ $guruCount }}</div>
                </a>
                <a href="{{ route('superadmin.siswa.index') }}" class="stat-card">
                    <div class="stat-icon"><i class="fas fa-user-graduate"></i></div>
                    <div class="stat-label">Siswa</div>
                    <div class="stat-value">{{ $siswaCount }}</div>
                </a>
                <a href="{{ route('superadmin.fasilitas.index') }}" class="stat-card">
                    <div class="stat-icon"><i class="fas fa-building"></i></div>
                    <div class="stat-label">Fasilitas</div>
                    <div class="stat-value">{{ $fasilitasCount }}</div>
                </a>
                <a href="{{ route('superadmin.prestasi.index') }}" class="stat-card">
                    <div class="stat-icon"><i class="fas fa-trophy"></i></div>
                    <div class="stat-label">Prestasi</div>
                    <div class="stat-value">{{ $prestasiCount }}</div>
                </a>
                <a href="{{ route('superadmin.ekstrakurikuler.index') }}" class="stat-card">
                    <div class="stat-icon"><i class="fas fa-volleyball"></i></div>
                    <div class="stat-label">Ekstrakurikuler</div>
                    <div class="stat-value">{{ $ekstrakurikulerCount }}</div>
                </a>
                <a href="{{ route('superadmin.acara.index') }}" class="stat-card">
                    <div class="stat-icon"><i class="fas fa-calendar-check"></i></div>
                    <div class="stat-label">Acara</div>
                    <div class="stat-value">{{ $acaraCount }}</div>
                </a>
                <div class="stat-card">
                    <div class="stat-icon"><i class="fas fa-file-signature"></i></div>
                    <div class="stat-label">Pendaftar</div>
                    <div class="stat-value">{{ $datapendaftarCount }}</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Apa yang Bisa Dilakukan -->
    <div class="content-card" style="margin-top:1.5rem;">
        <div class="card-header">
            <h2 class="card-title">
                <i class="fas fa-list-check"></i>
                Apa yang Bisa Dilakukan?
            </h2>
        </div>
        <div class="card-body">
            <div class="what-can-be-done">
                <h3>Apa yang Bisa Dilakukan?</h3>
                <ul>
                    <li>Dashboard: Pantau data & aktivitas sistem.</li>
                    <li>Akun Admin: Tambah/edit admin lainnya.</li>
                    <li>Data Guru & Kelas: Kelola civitas & struktur akademik.</li>
                    <li>Struktur Organisasi: Edit hierarki sekolah.</li>
                    <li>Publikasi: Unggah perayaan, galeri, dan prestasi.</li>
                    <li>Profil Sekolah: Ubah visi, misi, sejarah.</li>
                    <li>Kontak: Perbarui info alamat & telepon.</li>
                    <li>Ekstrakurikuler & Fasilitas: Atur ekskul dan sarana sekolah.</li>
                    <li>Pendaftaran: Kelola info PPDB & verifikasi pendaftar.</li>
                </ul>
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
    .btn-notif {
        background: linear-gradient(135deg, #6D8D79, #5a7466);
        color: #fff;
        border: none;
        border-radius: 50%;
        width: 48px;
        height: 48px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.4rem;
        position: relative;
        box-shadow: 0 4px 16px rgba(109,141,121,0.15);
        transition: background 0.2s, box-shadow 0.2s;
    }
    .btn-notif:hover {
        background: linear-gradient(135deg, #5a7466, #6D8D79);
        box-shadow: 0 8px 24px rgba(109,141,121,0.25);
    }
    .notif-badge {
        position: absolute;
        top: 8px;
        right: 8px;
        background: #ef4444;
        color: #fff;
        font-size: 0.85rem;
        font-weight: 700;
        padding: 2px 7px;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(239,68,68,0.12);
    }
    .notif-widget {
        background: #fff;
        border-radius: 14px;
        box-shadow: 0 4px 18px rgba(109,141,121,0.09);
        padding: 18px 24px;
        margin-bottom: 24px;
        max-width: 420px;
    }
    .notif-title {
        font-size: 1.15rem;
        font-weight: 700;
        color: #2d3748;
        margin-bottom: 12px;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .notif-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    .notif-item {
        padding: 8px 0;
        border-bottom: 1px solid #f1f5f9;
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: 0.98rem;
    }
    .notif-unread .notif-msg {
        font-weight: 600;
        color: #38a169;
    }
    .notif-read .notif-msg {
        color: #64748b;
    }
    .notif-time {
        font-size: 0.85rem;
        color: #a0aec0;
        margin-left: 12px;
    }
    .notif-empty {
        text-align: center;
        color: #64748b;
        padding: 16px 0;
        font-size: 0.98rem;
    }
    .page-container {
        padding: 2rem;
        background: linear-gradient(135deg, #6D8D79 0%, #5a7466 100%);
        min-height: 100vh;
    }
    .page-header {
        display: flex;
        justify-content: flex-start;
        align-items: flex-start;
        margin-bottom: 2rem;
        padding: 2rem;
        background: rgba(255, 255, 255, 0.95);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        backdrop-filter: blur(10px);
        border-radius: 0 !important;
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
        display: flex; align-items: center; gap: .5rem;
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
    .card-title i { color: #6D8D79; }
    .card-body { padding: 2rem; }
    .dashboard-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 1.25rem;
        padding: 0 10px;
    }
    .stat-card {
        display: flex;
        flex-direction: column;
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 16px;
        padding: 1.25rem 1.25rem 1.1rem;
        text-decoration: none;
        transition: transform .25s ease, box-shadow .25s ease;
        box-shadow: 0 8px 30px rgba(0,0,0,.06);
        color: inherit;
    }
    .stat-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 16px 36px rgba(0,0,0,.12);
    }
    .stat-icon {
        width: 44px; height: 44px;
        display: grid; place-items: center;
        border-radius: 12px;
        background: linear-gradient(135deg, #6D8D79, #5a7466);
        color: #fff;
        margin-bottom: .75rem;
        font-size: 1.1rem;
        box-shadow: 0 6px 16px rgba(109,141,121,.3);
    }
    .stat-label {
        font-size: .95rem;
        color: #64748b;
        font-weight: 600;
    }
    .stat-value {
        font-size: 2rem;
        font-weight: 800;
        color: #2d3748;
        line-height: 1;
        margin-top: .25rem;
    }
    .what-can-be-done h3 {
        font-size: 1.5rem;
        color: #2c3e50;
        margin-bottom: 16px;
        text-align: center;
    }
    .what-can-be-done ul {
        list-style: none;
        padding: 0;
        margin: 0;
        width: 100%;
        column-count: 2;
        column-gap: 40px;
        text-align: left;
    }
    .what-can-be-done li {
        font-size: 1rem;
        color: #34495e;
        margin: 0 0 10px 0;
        break-inside: avoid;
        -webkit-column-break-inside: avoid;
        -moz-column-break-inside: avoid;
    }
    @media (max-width: 1024px) {
        .stat-value { font-size: 1.75rem; }
    }
    @media (max-width: 768px) {
        .page-header { flex-direction: column; text-align: center; }
        .dashboard-grid { grid-template-columns: 1fr 1fr; }
        .what-can-be-done ul { column-count: 1; }
    }
    @media (max-width: 540px) {
        .dashboard-grid { grid-template-columns: 1fr; }
    }
</style>
@endsection