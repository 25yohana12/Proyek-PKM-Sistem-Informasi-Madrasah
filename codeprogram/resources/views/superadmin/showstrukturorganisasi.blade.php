@extends('layouts.superadmin')
@section('title','Detail Struktur Organisasi')

@section('content')
<div class="container py-4">
    <a href="{{ route('strukturOrganisasi.index') }}" class="btn btn-secondary mb-3">‹ Kembali</a>

    <div class="card shadow-sm">
        <div class="row g-0">
            <div class="col-md-4 text-center p-4">
                <img src="{{ asset('storage/'.$strukturOrganisasi->gambar) }}"
                     class="img-fluid rounded" style="max-height:320px;object-fit:cover">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h2 class="card-title">{{ $strukturOrganisasi->namaGuru }}</h2>
                    <dl class="row">
                        <dt class="col-sm-4">NIP</dt>
                        <dd class="col-sm-8">{{ $strukturOrganisasi->nip }}</dd>

                        <dt class="col-sm-4">Jabatan</dt>
                        <dd class="col-sm-8">{{ $strukturOrganisasi->jabatan }}</dd>

                        <dt class="col-sm-4">Dibuat</dt>
                        <dd class="col-sm-8">{{ $strukturOrganisasi->created_at->format('d M Y H:i') }}</dd>

                        <dt class="col-sm-4">Diperbarui</dt>
                        <dd class="col-sm-8">{{ $strukturOrganisasi->updated_at->format('d M Y H:i') }}</dd>
                    </dl>

                    <a href="{{ route('strukturOrganisasi.edit', $strukturOrganisasi) }}" class="btn btn-warning me-2">Edit</a>
                    <form action="{{ route('strukturOrganisasi.destroy', $strukturOrganisasi) }}"
                          method="POST" class="d-inline" onsubmit="return confirm('Hapus data ini?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
