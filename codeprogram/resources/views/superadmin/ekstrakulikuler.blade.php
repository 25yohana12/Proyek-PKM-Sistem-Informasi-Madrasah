@extends('layouts.superadmin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Main Content -->
        <div class="col-md-12">
            <div class="content" style="padding: 20px;">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>Ekstrakurikuler</h2>
                    <a href="{{ route('ekstrakulikuler.create') }}" class="btn btn-success">Tambah Ekstrakurikuler</a>
                </div>

                <!-- Table -->
                <table class="table table-bordered mt-4">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Nama Ekstrakurikuler</th>
                            <th>Deskripsi</th>
                            <th>Foto</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ekstrakulikulers as $key => $ekstrakulikuler)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $ekstrakulikuler->namaekstrakulikuler }}</td>
                                <td>{{ $ekstrakulikuler->deskripsi }}</td>
                                <td>
                                    <img src="{{ asset('storage/' . json_decode($ekstrakulikuler->gambar)[0]) }}" 
                                         alt="Foto" style="width: 100px; height: 100px; object-fit: cover;">
                                </td>
                                <td>
                                    <a href="{{ route('ekstrakulikuler.show', $ekstrakulikuler->ekstrakulikuler_id) }}" 
                                       class="btn btn-info">Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Internal CSS -->
<style>
    /* Table Styles */
    .table {
        width: 100%;
        background-color: white;
        margin-top: 20px;
    }

    .table th, .table td {
        text-align: center;
        vertical-align: middle;
    }

    .table td img {
        width: 100px;
        height: 100px;
        object-fit: cover;
    }

    /* Button Styles */
    .btn-success {
        background-color: #4CAF50;
        border: none;
        color: white;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 10px 0;
        border-radius: 5px;
    }

    .btn-info {
        background-color: #00796b;
        border: none;
        padding: 10px 20px;
        color: white;
        text-align: center;
        font-size: 16px;
        border-radius: 5px;
    }

    .btn-info:hover {
        background-color: #004d40;
    }
</style>
@endsection
