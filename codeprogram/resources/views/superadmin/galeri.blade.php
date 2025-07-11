@extends('layouts.superadmin')

@section('title', 'Galeri')

@section('content')
    <div class="header-container">
        <div class="header">
            <h2>GALERI</h2>
        </div>
        <button class="button add-gallery-btn" onclick="window.location.href='{{ route('galeri.create') }}'">Tambah Galeri</button>
    </div>

    <div class="table-container">
        <table class="gallery-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($galeris as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->judul }}</td>
                        <td>
                            @php
                                $images = json_decode($item->gambar);
                            @endphp
                            @if (!empty($images))
                                <img src="{{ Storage::url($images[0]) }}" alt="Foto {{ $item->judul }}" class="gallery-image">
                            @else
                                <p>No Image</p>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('galeri.edit', $item->galeri_id) }}" class="button edit-btn">Edit</a>
                            <a href="{{ route('galeri.show', $item->galeri_id) }}" class="button edit-btn">Detail</a>
                            <form action="{{ route('galeri.destroy', $item->galeri_id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="button delete-btn">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
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

        .add-gallery-btn {
            background-color: #4CAF50; /* Green */
            color: white;
            padding: 8px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        .add-gallery-btn:hover {
            background-color: #45a049; /* Darker green on hover */
        }

        .table-container {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2; /* Light gray background for header */
        }

        .gallery-image {
            width: 100px; /* Set a fixed width for images */
            height: auto; /* Maintain aspect ratio */
            border-radius: 5px;
        }

        .button {
            background-color: #4CAF50; /* Green */
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .button:hover {
            background-color: #45a049; /* Darker green on hover */
        }

        .edit-btn {
            background-color: #007bff; /* Blue for edit */
        }

        .edit-btn:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }

        .delete-btn {
            background-color: #dc3545; /* Red for delete */
        }

        .delete-btn:hover {
            background-color: #c82333; /* Darker red on hover */
        }

        /* Hover effect for table rows */
        tr:hover {
            background-color: #f5f5f5;
        }
    </style>
@endsection
