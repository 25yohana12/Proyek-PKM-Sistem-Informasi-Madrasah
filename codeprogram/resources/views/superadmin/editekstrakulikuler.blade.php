@extends('layouts.superadmin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Main Content -->
        <div class="col-md-12">
            <div class="content" style="padding: 20px;">
                <h2 class="text-center mb-4">Edit Ekstrakurikuler</h2>

                <!-- Form to Edit Ekstrakurikuler -->
                <form action="{{ route('ekstrakulikuler.update', $ekstrakulikuler->ekstrakulikuler_id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-3">
                        <label for="namaekstrakurikuler">Nama Ekstrakurikuler</label>
                        <input type="text" class="form-control" name="namaekstrakurikuler" id="namaekstrakurikuler" value="{{ old('namaekstrakurikuler', $ekstrakulikuler->namaekstrakulikuler) }}" placeholder="Tulis Nama Ekstrakurikuler" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea class="form-control" name="deskripsi" id="deskripsi" placeholder="Tulis Deskripsi" rows="5" required>{{ old('deskripsi', $ekstrakulikuler->deskripsi) }}</textarea>
                    </div>

                    <div class="form-group mb-3">
                        <label for="gambar">Foto</label>
                        <div class="drop-area" id="drop-area" style="border: 2px dashed #00796b; padding: 20px; text-align: center;">
                            <input type="file" name="gambar[]" id="gambar" multiple accept="image/*" style="display: none;">
                            <p>Choose a file or drag & drop it here</p>
                            <p>JPEG, PNG, PDG formats, up to 50MB</p>
                            <button type="button" class="btn btn-outline-success" id="browse-file-btn">Browse File</button>
                        </div>
                        <div class="mt-3">
                            <strong>Current Images:</strong>
                            <div class="row">
                                @foreach(json_decode($ekstrakulikuler->gambar) as $image)
                                    <div class="col-3 mb-2">
                                        <img src="{{ asset('storage/' . $image) }}" class="img-fluid" style="height: 100px; object-fit: cover;">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-success mr-3">Update</button>
                        <a href="{{ route('ekstrakulikuler.index') }}" class="btn btn-danger">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Internal CSS for Form Styling -->
<style>
    .drop-area {
        background-color: #f1f1f1;
        border-radius: 8px;
        border: 2px dashed #00796b;
        padding: 20px;
        text-align: center;
    }

    .drop-area:hover {
        background-color: #e0f2f1;
    }

    .drop-area p {
        margin: 10px 0;
    }

    .btn-success {
        background-color: #4CAF50;
        border: none;
        color: white;
        padding: 10px 20px;
        font-size: 16px;
        border-radius: 5px;
    }

    .btn-danger {
        background-color: #f44336;
        border: none;
        color: white;
        padding: 10px 20px;
        font-size: 16px;
        border-radius: 5px;
    }

    .btn-outline-success {
        background-color: transparent;
        border-color: #00796b;
        color: #00796b;
        padding: 8px 15px;
        border-radius: 5px;
        cursor: pointer;
    }

    .btn-outline-success:hover {
        background-color: #00796b;
        color: white;
    }
</style>

<!-- Internal JavaScript for drag-and-drop functionality -->
<script>
    document.getElementById("drop-area").addEventListener("dragover", function(event) {
        event.preventDefault();
        event.stopPropagation();
        document.getElementById("drop-area").style.backgroundColor = "#e0f2f1";
    });

    document.getElementById("drop-area").addEventListener("dragleave", function(event) {
        event.preventDefault();
        event.stopPropagation();
        document.getElementById("drop-area").style.backgroundColor = "#f1f1f1";
    });

    document.getElementById("drop-area").addEventListener("drop", function(event) {
        event.preventDefault();
        event.stopPropagation();

        const files = event.dataTransfer.files;
        if (files.length >= 3) {
            document.getElementById("gambar").files = files;
        } else {
            alert("Please upload at least 3 images.");
        }
    });

    document.getElementById("browse-file-btn").addEventListener("click", function() {
        document.getElementById("gambar").click();
    });

    document.getElementById("gambar").addEventListener("change", function(event) {
        const files = event.target.files;
        if (files.length >= 3) {
            document.getElementById("drop-area").style.backgroundColor = "#e0f2f1";
        } else {
            alert("Please upload at least 3 images.");
        }
    });
</script>

@endsection
