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
            <a href="#">Detail</a>
        </div>
        <div class="card">
            <h3>Siswa</h3>
            <p>{{ $siswaCount }}</p>
            <a href="#">Detail</a>
        </div>
        <div class="card">
            <h3>Fasilitas</h3>
            <p>{{ $fasilitasCount }}</p>
            <a href="#">Detail</a>
        </div>
        <div class="card">
            <h3>Prestasi</h3>
            <p>{{ $prestasiCount }}</p>
            <a href="#">Detail</a>
        </div>
        <div class="card">
            <h3>Ekstrakurikuler</h3>
            <p>{{ $ekstrakurikulerCount }}</p>
            <a href="#">Detail</a>
        </div>
        <div class="card">
            <h3>Acara</h3>
            <p>{{ $acaraCount }}</p>
            <a href="#">Detail</a>
        </div>
        <div class="card">
            <h3>Pendaftar</h3>
            <p>{{ $pendaftarCount }}</p>
            <a href="#">Detail</a>
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
