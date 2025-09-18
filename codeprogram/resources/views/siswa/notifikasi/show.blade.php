@extends('layouts.siswa')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm border-0">
        <div class="card-body">
            @if ($dataPendaftar)
                <h4 class="mb-3">
                    Selamat, Anda telah berhasil melakukan pendaftaran 
                    <strong>{{ $dataPendaftar->nama }}</strong>.
                </h4>
            @else
                <h4 class="mb-3 text-danger">Data pendaftar tidak ditemukan.</h4>
            @endif

            <hr>

            <p><strong>Judul Notifikasi:</strong> {{ $notif->judul }}</p>
            <p><strong>Pesan:</strong> {{ $notif->pesan }}</p>
            <p><strong>Status:</strong> 
                @if($notif->read)
                    <span class="badge bg-success">Sudah dibaca</span>
                @else
                    <span class="badge bg-warning">Belum dibaca</span>
                @endif
            </p>

            <a href="{{ route('siswa.notifikasi.index') }}" class="btn btn-primary">
                Kembali ke daftar notifikasi
            </a>
        </div>
    </div>
</div>
@endsection
