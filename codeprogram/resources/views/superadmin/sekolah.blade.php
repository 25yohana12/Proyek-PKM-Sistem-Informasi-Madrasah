@extends('layouts.superadmin')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Profil Sekolah</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($sekolah)
        <table class="table table-bordered">
            <tr>
                <th>Nama Sekolah</th>
                <td>{{ $sekolah->namaSekolah }}</td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td>{{ $sekolah->alamat }}</td>
            </tr>
            <tr>
                <th>Telepon</th>
                <td>{{ $sekolah->telepon }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $sekolah->email }}</td>
            </tr>
            <tr>
                <th>Instagram</th>
                <td>{{ $sekolah->instagram }}</td>
            </tr>
            <tr>
                <th>Facebook</th>
                <td>{{ $sekolah->facebook }}</td>
            </tr>
        </table>

        <a href="{{ route('sekolah.edit', $sekolah->sekolah_id) }}" class="btn btn-primary">Edit Data Sekolah</a>
    @else
        <p>Data sekolah belum tersedia.</p>
    @endif
</div>
@endsection
