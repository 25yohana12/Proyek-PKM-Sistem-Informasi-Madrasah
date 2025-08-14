@extends('layouts.superadmin')
@section('title', 'Struktur Organisasi')

@section('content')
<div class="container py-4">

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h4">Struktur Organisasi</h1>
        <a href="{{ route('superadmin.strukturorganisasi.create') }}" class="btn btn-primary">+ Tambah Data</a>
    </div>

    <div class="table-responsive shadow-sm rounded">
        <table class="table table-striped align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>NIP</th>
                    <th>Jabatan</th>
                    <th class="text-end">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($items as $i => $item)
                    <tr>
                        <td>{{ $items->firstItem() + $i }}</td>
                        <td style="width:90px">
                            <img src="{{ asset('storage/'.$item->gambar) }}"
                                 class="img-thumbnail" style="max-height:70px">
                        </td>
                        <td>{{ $item->namaGuru }}</td>
                        <td>{{ $item->nip }}</td>
                        <td>{{ $item->jabatan }}</td>
                        <td class="text-end">
                            <a href="{{ route('superadmin.strukturorganisasi.edit',  $item) }}" class="btn btn-sm btn-warning me-1">Edit</a>
                            <form action="{{ route('superadmin.strukturorganisasi.destroy', $item) }}"
                                  method="POST" class="d-inline" onsubmit="return confirm('Hapus data ini?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="text-center py-4">Belum ada data.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-3">{{ $items->links() }}</div>
</div>
@endsection
