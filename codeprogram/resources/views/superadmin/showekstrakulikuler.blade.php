@extends('layouts.guest')

@section('content')
<div class="container">
    <div class="row">
        <!-- Main Content -->
        <div class="col-md-12">
            <div class="content" style="padding: 20px;">
                <h2 class="text-center mb-4">{{ $ekstrakulikuler->namaekstrakulikuler }}</h2>

                <!-- Description Section -->
                <div class="mb-4">
                    <h4>Deskripsi</h4>
                    <p>{{ $ekstrakulikuler->deskripsi }}</p>
                </div>

                <!-- Image Section -->
                <div class="mb-4">
                    <h4>Foto</h4>
                    <div class="row">
                        @foreach(json_decode($ekstrakulikuler->gambar) as $image)
                            <div class="col-4 mb-3">
                                <img src="{{ asset('storage/' . $image) }}" class="img-fluid" style="height: 200px; object-fit: cover;">
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Back Button -->
                <div class="d-flex justify-content-center">
                    <a href="{{ route('ekstrakulikuler.index') }}" class="btn btn-primary">Back to List</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Internal CSS for Styling -->
<style>
    .container {
        max-width: 1200px;
        margin-top: 30px;
    }

    .content {
        background-color: #ffffff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .btn-primary {
        background-color: #00796b;
        border: none;
        color: white;
        padding: 10px 20px;
        font-size: 16px;
        border-radius: 5px;
    }

    .btn-primary:hover {
        background-color: #004d40;
    }

    .img-fluid {
        border-radius: 8px;
    }
</style>

@endsection
