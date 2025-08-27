@extends('layouts.superadmin')
@section('title', 'Struktur Organisasi')

@section('content')
<div class="page-container">
    <!-- Header -->
    <div class="page-header">
        <div class="header-content">
            <h1 class="page-title">
                <span class="emoji">🏫</span> Struktur Organisasi
            </h1>
            <p class="page-subtitle">Daftar guru dan jabatan dalam struktur organisasi sekolah</p>
        </div>
        <a href="{{ route('superadmin.strukturorganisasi.create') }}" class="btn btn-primary">
            + Tambah Data
        </a>
    </div>

    <!-- Success alert -->
    @if (session('success'))
        <div class="alert alert-success">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
    @endif

    <!-- Table Card -->
    <div class="content-card">
        <div class="card-body table-responsive">
            <table class="custom-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Foto</th>
                        <th>Nama</th>
                        <th>NIP</th>
                        <th>Jabatan</th>
                        <th class="text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($items as $i => $item)
                        <tr>
                            <td>{{ $items->firstItem() + $i }}</td>
                            <td style="width:90px">
                                <img src="{{ asset('storage/'.$item->gambar) }}" class="table-img">
                            </td>
                            <td>{{ $item->namaGuru }}</td>
                            <td>{{ $item->nip }}</td>
                            <td>{{ $item->jabatan }}</td>
                            <td class="text-right">
                                <a href="{{ route('superadmin.strukturorganisasi.edit', $item) }}" 
                                   class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('superadmin.strukturorganisasi.destroy', $item) }}" 
                                      method="POST" class="inline-form" 
                                      onsubmit="return confirm('Hapus data ini?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4">Belum ada data.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination -->
    <div class="pagination-wrapper">
        {{ $items->links() }}
    </div>
</div>
@endsection

@section('styles')
<style>
    /* Page background */
    .page-container {
        padding: 2rem;
        background: linear-gradient(135deg, #6D8D79 0%, #5a7466 100%);
        min-height: 100vh;
    }

    /* Header */
    .page-header {
        margin-bottom: 1.5rem;
        padding: 1.5rem 2rem;
        background: rgba(255, 255, 255, 0.95);
        border-radius: 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: 0 20px 40px rgba(0,0,0,0.1);
    }

    .page-title {
        font-size: 1.75rem;
        font-weight: 800;
        margin: 0;
        background: linear-gradient(135deg, #6D8D79, #5a7466);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .page-subtitle {
        font-size: 0.95rem;
        color: #64748b;
        margin-top: 0.25rem;
    }

    /* Card */
    .content-card {
        background: white;
        border-radius: 20px;
        box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        padding: 1.5rem;
    }

    .table-responsive {
        overflow-x: auto;
    }

    /* Table */
    .custom-table {
        width: 100%;
        border-collapse: collapse;
    }

    .custom-table th, 
    .custom-table td {
        padding: 0.9rem 1rem;
        border-bottom: 1px solid #e5e7eb;
        text-align: left;
    }

    .custom-table th {
        background: #f9fafb;
        font-weight: 600;
        color: #374151;
    }

    .custom-table tr:hover {
        background: #f9fafc;
    }

    .text-right {
        text-align: right;
    }

    /* Table image */
    .table-img {
        max-height: 70px;
        border-radius: 10px;
        box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    }

    /* Buttons */
    .btn {
        display: inline-block;
        padding: 0.5rem 1rem;
        border-radius: 10px;
        font-weight: 600;
        border: none;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .btn-primary {
        background: linear-gradient(135deg, #6D8D79, #5a7466);
        color: white;
        box-shadow: 0 4px 15px rgba(109,141,121,0.3);
    }
    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(109,141,121,0.4);
    }

    .btn-warning {
        background: #f59e0b;
        color: white;
    }

    .btn-danger {
        background: #ef4444;
        color: white;
    }

    .btn-sm {
        padding: 0.35rem 0.75rem;
        font-size: 0.85rem;
        border-radius: 8px;
    }

    .inline-form {
        display: inline;
    }

    /* Alerts */
    .alert {
        margin-bottom: 1.5rem;
        padding: 1rem 1.25rem;
        border-radius: 12px;
        font-size: 0.95rem;
    }

    .alert-success {
        background: linear-gradient(135deg, #16a34a, #15803d);
        color: white;
    }

    /* Pagination */
    .pagination-wrapper {
        margin-top: 1.5rem;
        text-align: center;
    }
</style>
@endsection
