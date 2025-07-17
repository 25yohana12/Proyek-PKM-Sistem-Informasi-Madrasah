@extends('layouts.superadmin')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Informasi Pendaftaran</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($informasi)
        <table class="table table-bordered">
            <tr>
                <th>Tahun Ajaran</th>
                <td>{{ $informasi->tahunAjaran }}</td>
            </tr>
            <tr>
                <th>Tanggal Pendaftaran</th>
                <td>{{ \Carbon\Carbon::parse($informasi->tanggalPendaftaran)->format('d-m-Y') }}</td>
            </tr>
            <tr>
                <th>Tanggal Pengumuman</th>
                <td>{{ \Carbon\Carbon::parse($informasi->tanggalPengumuman)->format('d-m-Y') }}</td>
            </tr>
            <tr>
                <th>Tanggal Penutupan</th>
                <td>{{ \Carbon\Carbon::parse($informasi->tanggalPenutupan)->format('d-m-Y') }}</td>
            </tr>
            <tr>
                <th>Jumlah Siswa</th>
                <td>{{ $informasi->jumlahSiswa }}</td>
            </tr>
            <tr>
                <th>Pengumuman</th>
                <td>{!! nl2br(e($informasi->pengumuman)) !!}</td>
            </tr>
        </table>

        <a href="{{ route('informasi.edit', $informasi->informasi_id) }}" class="btn btn-primary">Edit Informasi</a>
    @else
        <p>Belum ada informasi pendaftaran yang tersedia.</p>
    @endif
</div>
@endsection
