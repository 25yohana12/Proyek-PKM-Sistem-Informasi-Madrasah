@extends('layouts.guest')

@section('content')
    <!-- Pengumuman -->
    <section class="bg-white p-8 rounded-lg shadow-lg mb-8 max-w-4xl mx-auto">
        <h2 class="text-3xl font-semibold text-green-600">PENGUMUMAN</h2>
        <p class="mt-4 text-lg text-gray-700">
            MIN Toba Samosir membuka pendaftaran siswa baru untuk tahun ajaran <span class="font-semibold">{{ $informasi->tahunAjaran }}</span>. Berikut jadwal penting yang perlu diperhatikan:
        </p>

        <div class="mt-6 space-y-4 text-gray-600">
            <p><strong class="text-green-600">Jadwal Pendaftaran:</strong> <span class="font-semibold">{{ \Carbon\Carbon::parse($informasi->tanggalPendaftaran)->format('d F Y') }}</span></p>
            <p><strong class="text-green-600">Waktu:</strong> Pukul 09:00 - 14:00 WIB</p>
            <p><strong class="text-green-600">Tempat:</strong> MIN Toba Samosir atau melalui formulir online di website resmi</p>
        </div>

        <div class="mt-6 space-y-4 text-gray-600">
            <p><strong class="text-green-600">Pengumuman Hasil Seleksi:</strong> <span class="font-semibold">{{ \Carbon\Carbon::parse($informasi->tanggalPengumuman)->format('d F Y') }}</span></p>
            <p><strong class="text-green-600">Daftar Ulang:</strong> <span class="font-semibold">{{ \Carbon\Carbon::parse($informasi->tanggalPenutupan)->format('d F Y') }}</span> di kantor MIN Toba Samosir</p>
        </div>
        
        <div class="mt-6 text-gray-600">
            <p><strong class="text-green-600">Jumlah Siswa yang Diterima:</strong> <span class="font-semibold">{{ $informasi->jumlahSiswa }} siswa</span></p>
        </div>

        <div class="mt-6">
            <h3 class="text-xl font-semibold text-green-600">Pengumuman:</h3>
            <p class="text-gray-700">{{ $informasi->pengumuman }}</p>
        </div>
    </section>

    <!-- Prosedur Pendaftaran -->
    <section class="bg-white p-8 rounded-lg shadow-lg max-w-4xl mx-auto">
        <h2 class="text-3xl font-semibold text-green-600">PROSEDUR PENDAFTARAN</h2>
        <ol class="list-decimal list-inside mt-6 space-y-4 text-gray-600">
            <li><strong class="text-green-600">1. Mengisi Formulir Pendaftaran</strong><br> Calon siswa diminta untuk mengisi formulir pendaftaran yang tersedia di website.</li>
            <li><strong class="text-green-600">2. Mengunggah Dokumen Persyaratan</strong><br> Calon pendaftar wajib mengunggah dokumen-dokumen yang diperlukan.</li>
            <li><strong class="text-green-600">3. Verifikasi dan Seleksi oleh Admin</strong><br> Setelah dokumen diterima, admin akan melakukan verifikasi dan seleksi.</li>
            <li><strong class="text-green-600">4. Pengumuman Hasil Seleksi</strong><br> Hasil seleksi akan diumumkan secara online melalui halaman pengumuman di website.</li>
            <li><strong class="text-green-600">5. Daftar Ulang bagi Peserta yang Lulus</strong><br> Peserta yang lulus diharapkan melakukan daftar ulang pada waktu yang telah ditentukan.</li>
        </ol>
    </section>
@endsection
