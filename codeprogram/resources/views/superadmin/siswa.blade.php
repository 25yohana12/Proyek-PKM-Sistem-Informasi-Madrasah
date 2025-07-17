@extends('layouts.superadmin')

@section('content')
<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2><strong>Data Kelas</strong></h2>
        <a href="{{ route('siswa.create') }}" class="btn btn-success">Tambah Data</a>
    </div>

    <div class="mb-3">
        <strong>Jumlah Total Murid :</strong> {{ $totalMurid ?? 0 }} &nbsp;&nbsp;
        <strong>Jumlah Total Siswa :</strong> {{ $totalSiswa ?? 0 }} &nbsp;&nbsp;
        <strong>Jumlah Total Siswi :</strong> {{ $totalSiswi ?? 0 }}
    </div>

    <div class="row">
        @foreach($siswa as $item)
        <div class="col-md-3 mb-4">
            <div class="card shadow-sm">
                @if($item->gambar)
                    <img src="{{ asset('storage/' . $item->gambar) }}" class="card-img-top" alt="gambar kelas" style="height: 180px; object-fit: cover;">
                @else
                    <img src="{{ asset('images/default.jpg') }}" class="card-img-top" alt="default image" style="height: 180px; object-fit: cover;">
                @endif

                <div class="position-absolute top-0 start-0 p-2">
                    <a href="{{ route('siswa.edit', $item->siswa_id) }}" class="btn btn-sm btn-success">Edit</a>
                </div>
                <div class="position-absolute top-0 end-0 p-2">
                    <form action="{{ route('siswa.destroy', $item->siswa_id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </div>

                <div class="card-body text-center" style="background-color: #a6e3c8;">
                    <h5 class="card-title mb-2">KELAS {{ strtoupper($item->kelas) }}</h5>
                    <p class="mb-1"><strong>WALI KELAS :</strong> {{ $item->namaWali ?? '-' }}</p>
                    <p class="mb-1"><strong>Jumlah Murid :</strong> {{ $item->jumlahMurid ?? 0 }}</p>
                    <p class="mb-1"><strong>Jumlah Siswa :</strong> {{ $item->jumlahSiswa ?? 0 }}</p>
                    <p class="mb-1"><strong>Jumlah Siswi :</strong> {{ $item->jumlahSiswi ?? 0 }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
