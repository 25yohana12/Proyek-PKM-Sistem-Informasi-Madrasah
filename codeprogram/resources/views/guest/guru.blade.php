@extends('layouts.guest')

@section('content')
    <div class="container">
        <h2 class="text-center">Tenaga Pengajar</h2>
        <div class="card-container">
            @foreach($gurus as $guru)
                <div class="card">
                    <img src="{{ asset('storage/' . $guru->gambar) }}" alt="Guru Image" class="card-img">
                    <div class="card-text">
                        <p><strong>Nama:</strong> {{ $guru->namaGuru }}</p>
                        <p><strong>NIP:</strong> {{ $guru->nip }}</p>
                        <p><strong>Posisi:</strong> {{ $guru->posisi }}</p>
                        <p><strong>Deskripsi:</strong> {{ $guru->deskripsi }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('styles')
    <style>
        /* General Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
            color: #333;
        }
        h2 {
            color: #00796b;
        }

        /* Container */
        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
        }

        /* Card Styles */
        .card-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-top: 20px;
        }
        .card {
            background-color: #e0f2f1;
            border-radius: 8px;
            padding: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .card-img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 15px;
        }
        .card-text p {
            margin: 5px 0;
        }
    </style>
@endsection
