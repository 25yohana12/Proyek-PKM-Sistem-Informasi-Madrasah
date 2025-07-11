@extends('layouts.superadmin')

@section('title', 'Perayaan')

@section('content')
    <div class="header-container">
        <div class="header">
            <h2>PERAYAAN</h2>
        </div>
        <button class="button add-acara-btn" onclick="window.location.href='{{ route('acara.create') }}'">Tambah Acara</button>
    </div>

    <div class="acara-container">
        @foreach($acaras as $acara)
            <div class="acara-card">
                <div class="acara-header">
                    <h3>{{ $acara->judul }}</h3>
                    <div class="acara-buttons">
                        <a href="{{ route('acara.edit', $acara->acara_id) }}" class="button edit-btn">Edit</a>
                        <form action="{{ route('acara.destroy', $acara->acara_id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="button delete-btn">Hapus</button>
                        </form>
                    </div>
                </div>

                <div class="acara-body">
                    <div class="acara-images">
                        @php
                            $images = json_decode($acara->gambar);
                        @endphp
                        @foreach($images as $image)
                            <img src="{{ Storage::url($image) }}" alt="Image" class="acara-image">
                        @endforeach
                    </div>
                    <p class="acara-description">{{ $acara->deskripsi }}</p>
                    <p class="acara-date">{{ \Carbon\Carbon::parse($acara->tanggalAcara)->format('d F Y') }}</p>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@section('styles')
    <style>
        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .header {
            font-size: 24px;
            font-weight: bold;
        }

        .acara-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .acara-card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            padding: 15px;
        }

        .acara-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .acara-header h3 {
            margin: 0;
            font-size: 20px;
        }

        .acara-buttons a,
        .acara-buttons button {
            background-color: #4CAF50;
            color: white;
            padding: 8px 20px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
        }

        .acara-buttons a:hover,
        .acara-buttons button:hover {
            background-color: #45a049;
        }

        .acara-body {
            margin-top: 10px;
        }

        .acara-images {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .acara-image {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 5px;
        }

        .acara-description {
            margin: 10px 0;
            font-size: 14px;
            color: #555;
        }

        .acara-date {
            font-size: 12px;
            color: #888;
        }

        .add-acara-btn {
            background-color: #007bff; /* Blue */
            color: white;
            padding: 8px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .add-acara-btn:hover {
            background-color: #0056b3;
        }

        .button {
            padding: 8px 20px;
            border-radius: 5px;
            font-size: 14px;
        }

        .delete-btn {
            background-color: #dc3545; /* Red */
        }

        .delete-btn:hover {
            background-color: #c82333;
        }
    </style>
@endsection
