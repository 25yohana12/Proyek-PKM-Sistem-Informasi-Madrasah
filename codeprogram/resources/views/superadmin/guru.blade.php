@extends('layouts.superadmin') 

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Data Guru</h2>
    
    <a href="{{ route('guru.create') }}" class="btn btn-primary mb-3">Tambah Data</a>
    
    <div class="row">
        @foreach ($gurus as $guru)
        <div class="col-md-4 mb-4">
            <div class="card" style="width: 18rem;">
                <img src="{{ asset('storage/'.$guru->gambar) }}" class="card-img-top" alt="{{ $guru->namaGuru }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $guru->namaGuru }}</h5>
                    <p class="card-text"><strong>NIP:</strong> {{ $guru->nip }}</p>
                    <p class="card-text"><strong>Posisi:</strong> {{ $guru->posisi }}</p>
                    <p class="card-text"><strong>Deskripsi:</strong> {{ $guru->deskripsi }}</p>
                    <a href="{{ route('guru.edit', $guru->guru_id) }}" class="btn btn-success">Edit</a>
                    <form action="{{ route('guru.destroy', $guru->guru_id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
