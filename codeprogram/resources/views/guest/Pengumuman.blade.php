@extends('layouts.guest')

@section('content')

    <!-- Pengumuman -->
    <section class="bg-white p-6 rounded-lg shadow-md mb-8">
        <h2 class="text-2xl font-semibold text-green-600">PENGUMUMAN</h2>
        <p class="mt-4 text-lg">
            MIN Toba Samosir membuka pendaftaran siswa baru untuk tahun ajaran {{ $informasi->tahunAjaran }}. Berikut jadwal penting yang perlu diperhatikan:
        </p>
        <div class="mt-4">
            <p><strong>Jadwal Pendaftaran:</strong> {{ \Carbon\Carbon::parse($informasi->tanggalPendaftaran)->format('d F Y') }}</p>
            <p><strong>Waktu:</strong> Pukul 09:00 - 14:00 WIB</p>
            <p><strong>Tempat:</strong> MIN Toba Samosir atau melalui formulir online di website resmi</p>
        </div>
        <div class="mt-4">
            <p><strong>Pengumuman Hasil Seleksi:</strong> {{ \Carbon\Carbon::parse($informasi->tanggalPengumuman)->format('d F Y') }}</p>
            <p><strong>Daftar Ulang:</strong> {{ \Carbon\Carbon::parse($informasi->tanggalPenutupan)->format('d F Y') }} di kantor MIN Toba Samosir</p>
        </div>
        
        <div class="mt-4">
            <p><strong>Jumlah Siswa yang Diterima:</strong> {{ $informasi->jumlahSiswa }} siswa</p>
        </div>

        <div class="mt-4">
            <h3 class="text-xl font-semibold">Pengumuman:</h3>
            <p>{{ $informasi->pengumuman }}</p>
        </div>
    </section>

    <!-- Prosedur Pendaftaran -->
    <section class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold text-green-600">PROSEDUR PENDAFTARAN</h2>
        <ol class="list-decimal list-inside mt-4">
            <li class="mb-4"><strong>1. Mengisi Formulir Pendaftaran</strong><br> Calon siswa diminta untuk mengisi formulir pendaftaran yang tersedia di website.</li>
            <li class="mb-4"><strong>2. Mengunggah Dokumen Persyaratan</strong><br> Calon pendaftar wajib mengunggah dokumen-dokumen yang diperlukan.</li>
            <li class="mb-4"><strong>3. Verifikasi dan Seleksi oleh Admin</strong><br> Setelah dokumen diterima, admin akan melakukan verifikasi dan seleksi.</li>
            <li class="mb-4"><strong>4. Pengumuman Hasil Seleksi</strong><br> Hasil seleksi akan diumumkan secara online melalui halaman pengumuman di website.</li>
            <li><strong>5. Daftar Ulang bagi Peserta yang Lulus</strong><br> Peserta yang lulus diharapkan melakukan daftar ulang pada waktu yang telah ditentukan.</li>
        </ol>
    </section>

@endsection
