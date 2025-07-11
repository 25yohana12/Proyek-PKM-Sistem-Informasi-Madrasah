@extends('layouts.superadmin')

@section('title', 'Daftar Prestasi')

@section('header', 'Prestasi')

@section('content')
    <div class="container">
        <a href="{{ route('prestasi.create') }}" class="btn btn-primary mb-3">Tambah Prestasi</a>
        
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Penghargaan</th> <!-- Kolom Deskripsi diubah menjadi Penghargaan -->
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($prestasis as $prestasi)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $prestasi->judul }}</td>
                        <td>{{ Str::limit($prestasi->penghargaan, 100) }}</td> <!-- Menampilkan penghargaan -->
                        <td>
                            @foreach (json_decode($prestasi->gambar) as $gambar)
                                <img src="{{ Storage::url($gambar) }}" alt="Foto Prestasi" width="100">
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ route('prestasi.show', $prestasi->prestasi_id) }}" class="btn btn-success">Detail</a>
                            <a href="{{ route('prestasi.edit', $prestasi->prestasi_id) }}" class="btn btn-success">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
