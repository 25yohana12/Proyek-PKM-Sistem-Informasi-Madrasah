@extends('layouts.siswa')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm border-0">
        <div class="card-body">
            <h4 class="mb-3">
                <strong>{{ $notif->judul }}</strong>
            </h4>
            <hr>
            <p><strong>Pesan:</strong> {{ $notif->pesan }}</p>
            <p><strong>Status:</strong>
                @if($notif->read)
                    <span class="badge bg-success">Sudah dibaca</span>
                @else
                    <span class="badge bg-warning">Belum dibaca</span>
                @endif
            </p>
            <a href="{{ route('siswa.home') }}" class="btn btn-primary">
                Kembali ke beranda
            </a>
        </div>
    </div>
</div>
@endsection