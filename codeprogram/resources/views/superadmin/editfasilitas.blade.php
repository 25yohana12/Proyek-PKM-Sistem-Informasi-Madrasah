@extends('layouts.superadmin')

@section('title', 'Edit Fasilitas')

@section('content')
    <div class="page-container">
        <div class="page-header">
            <div class="header-content">
                <h1 class="page-title">
                    <span class="emoji">✏️</span> Edit Fasilitas
                </h1>
                <p class="page-subtitle">Ubah data fasilitas, sarana, dan prasarana madrasah</p>
            </div>
        </div>

        <div class="content-card">
            <div class="card-header">
                <h2 class="card-title">
                    <i class="fas fa-building"></i>
                    Form Edit Fasilitas
                </h2>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul style="margin-bottom:0;">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('superadmin.fasilitas.update', $fasilitas->fasilitas_id) }}" method="POST" enctype="multipart/form-data" class="modern-form">
                    @csrf
                    @method('PUT')

                    <!-- Nama Fasilitas -->
                    <div class="form-group">
                        <label for="namaFasilitas" class="form-label">
                            <i class="fas fa-building"></i>
                            Nama Fasilitas
                        </label>
                        <input type="text" id="namaFasilitas" name="namaFasilitas" class="form-control @error('namaFasilitas') is-invalid @enderror" value="{{ old('namaFasilitas', $fasilitas->namaFasilitas) }}" required>
                        @error('namaFasilitas')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Prasarana -->
                    <div class="form-group">
                        <label for="prasarana" class="form-label">
                            <i class="fas fa-tools"></i>
                            Prasarana
                        </label>
                        <input type="text" id="prasarana" name="prasarana" class="form-control @error('prasarana') is-invalid @enderror" value="{{ old('prasarana', $fasilitas->prasarana) }}" required>
                        @error('prasarana')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Sarana -->
                    <div class="form-group">
                        <label for="sarana" class="form-label">
                            <i class="fas fa-chair"></i>
                            Sarana
                        </label>
                        <input type="text" id="sarana" name="sarana" class="form-control @error('sarana') is-invalid @enderror" value="{{ old('sarana', $fasilitas->sarana) }}" required>
                        @error('sarana')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Jumlah Fasilitas -->
                    <div class="form-group">
                        <label for="jumlah" class="form-label">
                            <i class="fas fa-list-ol"></i>
                            Jumlah Fasilitas
                        </label>
                        <input type="number" id="jumlah" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror" value="{{ old('jumlah', $fasilitas->jumlah) }}" required>
                        @error('jumlah')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Gambar (Multiple) -->
                    <div class="form-group">
                        <label for="gambar" class="form-label">
                            <i class="fas fa-image"></i>
                            Foto Fasilitas (bisa lebih dari satu)
                        </label>
                        <input type="file" id="gambar" name="gambar[]" class="form-control @error('gambar') is-invalid @enderror" accept="image/*" multiple>
                        @error('gambar')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="form-text">Pilih satu atau beberapa foto fasilitas untuk menambah foto baru.</small>
                        @if($fasilitas->gambar)
                            <div class="current-images">
                                @foreach(json_decode($fasilitas->gambar) as $index => $image)
                                    <div class="current-image-item" data-index="{{ $index }}">
                                        <img src="{{ Storage::url($image) }}" alt="Current Image" class="current-image">
                                        <button type="button" class="remove-current-image" onclick="removeCurrentImage({{ $index }})" title="Hapus gambar">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                        <input type="hidden" name="removed_images[]" value="" disabled>
                                    </div>
                                @endforeach
                            </div>
                            <div class="form-hint">Klik ikon sampah untuk menghapus foto</div>
                        @endif
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i>
                            Simpan Perubahan
                        </button>
                        <a href="{{ route('superadmin.fasilitas.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i>
                            Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('styles')
    <style>
        .page-container {
            padding: 2rem;
            background: linear-gradient(135deg, #6D8D79 0%, #5a7466 100%);
            min-height: 100vh;
        }
        .page-header {
            display: flex;
            justify-content: flex-start;
            align-items: flex-start;
            margin-bottom: 2rem;
            padding: 2rem;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
        }
        .page-title .emoji {
            background: none !important;
            -webkit-text-fill-color: initial !important;
            color: initial !important;
        }
        .header-content { flex: 1; }
        .page-title {
            font-size: 2.5rem;
            font-weight: 800;
            color: #2d3748;
            margin: 0 0 0.5rem 0;
            background: linear-gradient(135deg, #6D8D79, #5a7466);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .page-subtitle {
            color: #64748b;
            font-size: 1.1rem;
            margin: 0;
            font-weight: 500;
        }
        .content-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .card-header {
            padding: 2rem;
            background: linear-gradient(135deg, #f8fafc, #f1f5f9);
            border-bottom: 1px solid #e2e8f0;
        }
        .card-title {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-size: 1.5rem;
            font-weight: 700;
            color: #2d3748;
            margin: 0;
        }
        .card-title i { color: #6D8D79; }
        .card-body {
            padding: 2rem;
        }
        .modern-form {
            max-width: 600px;
            margin: 0 auto;
        }
        .form-group {
            margin-bottom: 2rem;
        }
        .form-label {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-weight: 600;
            color: #2d3748;
            margin-bottom: 0.75rem;
            font-size: 1rem;
        }
        .form-label i {
            color: #6D8D79;
            font-size: 0.9rem;
        }
        .form-control {
            width: 100%;
            padding: 1rem;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: #f8fafc;
        }
        .form-control:focus {
            outline: none;
            border-color: #6D8D79;
            background: white;
            box-shadow: 0 0 0 3px rgba(109, 141, 121, 0.1);
        }
        .form-control.is-invalid {
            border-color: #ef4444;
        }
        .invalid-feedback {
            display: block;
            color: #ef4444;
            font-size: 0.875rem;
            margin-top: 0.5rem;
        }
        .form-text {
            color: #64748b;
            font-size: 0.875rem;
            margin-top: 0.5rem;
            display: block;
        }
        .form-actions {
            display: flex;
            gap: 1rem;
            justify-content: flex-end;
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 1px solid #e2e8f0;
        }
        .btn {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 8px;
            font-size: 0.875rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            justify-content: center;
        }
        .btn-primary {
            background: linear-gradient(135deg, #6D8D79, #5a7466);
            color: white;
            box-shadow: 0 4px 15px rgba(109, 141, 121, 0.3);
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(109, 141, 121, 0.4);
        }
        .btn-secondary {
            background: linear-gradient(135deg, #64748b, #475569);
            color: white;
            box-shadow: 0 4px 15px rgba(100, 116, 139, 0.3);
        }
        .btn-secondary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(100, 116, 139, 0.4);
        }
        .current-images {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
            margin-top: 1rem;
        }
        .current-image-item {
            position: relative;
            width: 100px;
            aspect-ratio: 1/1;
            border-radius: 12px;
            overflow: hidden;
            background: #f1f5f9;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            transition: box-shadow 0.2s;
        }
        .current-image-item:hover {
            box-shadow: 0 8px 24px rgba(109,141,121,0.15);
        }
        .current-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 12px;
            transition: filter 0.2s;
        }
        .remove-current-image {
            position: absolute;
            top: 8px;
            right: 8px;
            background: #ef4444;
            color: #fff;
            border: none;
            border-radius: 50%;
            width: 28px;
            height: 28px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
            cursor: pointer;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            transition: background 0.2s;
            z-index: 2;
        }
        .remove-current-image:hover {
            background: #dc2626;
        }
        .form-hint {
            margin-top: 0.5rem;
            color: #64748b;
            font-size: 0.95em;
        }
        @media (max-width: 600px) {
            .current-images { gap: 0.5rem; }
            .current-image-item { width: 70px; }
        }
    </style>
@endsection

@section('scripts')
<script>
    function removeCurrentImage(index) {
        var imageItem = document.querySelector('.current-image-item[data-index="'+index+'"]');
        if (imageItem) {
            imageItem.style.display = 'none';
            var input = imageItem.querySelector('input[type=hidden][name="removed_images[]"]');
            input.value = index;
            input.disabled = false;
        }
    }
</script>
@endsection