@extends('layouts.superadmin')

@section('content')
<div class="container">
    <h2>Daftar Pendaftar</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Pendaftar</th>
                <th>Email</th>
                <th>NISN</th>
                <th>Tempat, Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Telepon</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pendaftar as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->namaPendaftar }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->nisn }}</td>
                <td>{{ $item->tempatLahir }}, {{ $item->tanggalLahir }}</td>
                <td>{{ $item->jenisKelamin }}</td>
                <td>{{ $item->telepon }}</td>
                <td>{{ $item->alamat }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
