@extends('layouts.superadmin')

@section('title', 'Fasilitas')

@section('content')
    <div class="header">Daftar Fasilitas</div>

    <div class="table-container">
        <button class="button" onclick="window.location.href='{{ route('fasilitas.create') }}'">Tambah Fasilitas</button>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Fasilitas</th>
                    <th>Prasarana</th>
                    <th>Sarana</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($fasilitas as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->namaFasilitas }}</td>
                        <td>{{ $item->prasarana }}</td>
                        <td>{{ $item->sarana }}</td>
                        <td>
                            @php
                                $images = json_decode($item->gambar); // Decode gambar JSON
                            @endphp
                            @if (!empty($images))
                                <img src="{{ Storage::url($images[0]) }}" alt="Foto {{ $item->namaFasilitas }}" class="img-thumbnail">
                            @else
                                <p>Tidak ada gambar</p>
                            @endif
                        </td>
                        <td>
                            <button class="button" onclick="window.location.href='{{ route('fasilitas.show', $item->fasilitas_id) }}'">Detail</button>
                            <button class="button" onclick="window.location.href='{{ route('fasilitas.edit', $item->fasilitas_id) }}'">Edit</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('styles')
    <style>
        .header {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .table-container {
            margin-top: 20px;
            overflow-x: auto;
        }
        .button {
            background-color: #4CAF50; /* Green */
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin: 4px;
        }
        .button:hover {
            background-color: #45a049; /* Darker green on hover */
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2; /* Light gray background for header */
        }
        img.img-thumbnail {
            width: 100px; /* Set a fixed width for images */
            height: auto; /* Maintain aspect ratio */
            border-radius: 5px; /* Round the corners of the image */
        }
        table tr:hover {
            background-color: #f5f5f5; /* Highlight row on hover */
        }
        .table-container button {
            display: inline-block;
            margin-right: 5px;
        }
    </style>
@endsection
