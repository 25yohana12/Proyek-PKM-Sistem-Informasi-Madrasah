@extends('layouts.superadmin')

@section('content')
<div class="container">
    <div class="header">
        <h1>MIN TOBA SAMOSIR</h1>
        <p>Madrash, Tempat Belajar, Tempat</p>
    </div>

    <div class="dashboard-cards">
        <div class="card">
            <h3>Guru</h3>
            <p>{{ $guruCount }}</p>
            <a href="{{ route('superadmin.guru.index') }}" class="btn">Detail</a>
        </div>
        <div class="card">
            <h3>Siswa</h3>
            <p>{{ $siswaCount }}</p>
            <a href="{{ route('superadmin.siswa.index') }}" class="btn">Detail</a>
        </div>
        <div class="card">
            <h3>Fasilitas</h3>
            <p>{{ $fasilitasCount }}</p>
            <a href="{{ route('superadmin.fasilitas.index') }}" class="btn">Detail</a>
        </div>
        <div class="card">
            <h3>Prestasi</h3>
            <p>{{ $prestasiCount }}</p>
            <a href="{{ route('superadmin.prestasi.index') }}" class="btn">Detail</a>
        </div>
        <div class="card">
            <h3>Ekstrakurikuler</h3>
            <p>{{ $ekstrakurikulerCount }}</p>
            <a href="{{ route('superadmin.ekstrakurikuler.index') }}" class="btn">Detail</a>
        </div>
        <div class="card">
            <h3>Acara</h3>
            <p>{{ $acaraCount }}</p>
            <a href="{{ route('superadmin.acara.index') }}" class="btn">Detail</a>
        </div>
        <div class="card">
            <h3>Pendaftar</h3>
            <p>{{ $datapendaftarCount }}</p>
            <a href="#" class="btn">Detail</a>
        </div>
    </div>

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
            <li>Pendaftaran: Kelola info PPDB & Verifikasi akhir pendaftar.</li>
        </ul>
    </div>
</div>
@endsection

@section('styles')
<style>
    /* Container */
    .container {
        padding: 20px;
        background-color: #f9f9f9;
        max-width: 1200px;
        margin: 0 auto;
    }

    /* Header */
    .header {
        display: flex;
        align-items: center;
        justify-content: flex-start;
        padding: 20px 0;
        position: sticky;
        top: 0;
        z-index: 10;
        background-color: #6D8D79;
        border-bottom: 2px solid #6D8D79;
        margin-bottom: 20px;
    }

    .header h1 {
        font-size: 3rem;
        color: #2c3e50;
        margin-bottom: 10px;
    }

    .header p {
        font-size: 1.25rem;
        color: #7f8c8d;
    }

    /* Dashboard Cards */
    .dashboard-cards {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 20px;
        margin-bottom: 40px;
    }

    .card {
        background-color: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        padding: 30px 20px;
        text-align: center;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border: 1px solid #ddd;
    }

    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
    }

    .card h3 {
        font-size: 1.5rem;
        color: #2c3e50;
        margin-bottom: 10px;
    }

    .card p {
        font-size: 2rem;
        font-weight: bold;
        color: #3498db;
        margin-bottom: 15px;
    }

    .card a {
        text-decoration: none;
        background-color: #2ecc71;
        color: #fff;
        padding: 12px 25px;
        border-radius: 8px;
        transition: background-color 0.3s ease;
        font-weight: bold;
    }

    .card a:hover {
        background-color: #27ae60;
    }

    /* What Can Be Done Section */
    .what-can-be-done {
        background-color: #ecf0f1;
        padding: 20px;
        border-radius: 12px;
        margin-top: 40px;
    }

    .what-can-be-done h3 {
        font-size: 2rem;
        color: #2c3e50;
        margin-bottom: 20px;
    }

    .what-can-be-done ul {
        list-style: none;
        padding: 0;
    }

    .what-can-be-done li {
        font-size: 1.1rem;
        color: #34495e;
        margin-bottom: 10px;
    }

    /* Media Queries */
    @media (max-width: 768px) {
        .card {
            padding: 20px 15px;
        }

        .header h1 {
            font-size: 2.5rem;
        }

        .header p {
            font-size: 1.1rem;
        }

        .what-can-be-done h3 {
            font-size: 1.5rem;
        }

        .what-can-be-done li {
            font-size: 1rem;
        }
    }
</style>
@endsection
