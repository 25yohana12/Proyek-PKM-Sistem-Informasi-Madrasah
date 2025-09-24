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
                <th>No Telepon</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pendaftar as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->namaPendaftar }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->telepon }}</td>
                <td>
                    @if($item->konfirmasi == 'Diterima')
                        <span class="badge bg-success">Diterima</span>
                    @elseif($item->konfirmasi == 'Ditolak')
                        <span class="badge bg-danger">Ditolak</span>
                    @else
                        <span class="badge bg-warning">Menunggu</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.notifikasi.show', $item->pendaftar_id) }}" class="btn btn-info btn-sm">Lihat Detail</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection