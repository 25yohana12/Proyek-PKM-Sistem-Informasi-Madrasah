@extends('layouts.superadmin')

@section('title', 'Detail Fasilitas')

@section('content')
    <div class="page-container">
        <div class="detail-card">
            <h1 class="detail-title">
                <i class="fas fa-building"></i> Detail Fasilitas
            </h1>
            <div class="detail-list">
                <div class="detail-row">
                    <span class="detail-label"><i class="fas fa-building"></i> Nama Fasilitas</span>
                    <span class="detail-value">{{ $fasilitas->namaFasilitas }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label"><i class="fas fa-tools"></i> Prasarana</span>
                    <span class="detail-value">{{ $fasilitas->prasarana }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label"><i class="fas fa-chair"></i> Sarana</span>
                    <span class="detail-value">{{ $fasilitas->sarana }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label"><i class="fas fa-list-ol"></i> Jumlah Fasilitas</span>
                    <span class="detail-value">{{ $fasilitas->jumlah }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label"><i class="fas fa-image"></i> Foto Fasilitas</span>
                    <span class="detail-value">
                        <div class="gallery-modern">
                            @if($fasilitas->gambar)
                                @php $images = json_decode($fasilitas->gambar); @endphp
                                @foreach($images as $image)
                                    <img src="{{ Storage::url($image) }}" alt="Foto Fasilitas" class="gallery-img">
                                @endforeach
                            @else
                                <span class="no-image">Tidak ada foto</span>
                            @endif
                        </div>
                    </span>
                </div>
            </div>
            <div class="button-group">
                <a href="{{ route('superadmin.fasilitas.edit', $fasilitas->fasilitas_id) }}" class="btn-modern btn-edit">
                    <i class="fas fa-edit"></i> Edit Fasilitas
                </a>
                <a href="{{ route('superadmin.fasilitas.index') }}" class="btn-modern btn-back">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
    </div>
@endsection

@section('styles')
<style>
.page-container {
    min-height: 100vh;
    background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
    padding: 3rem 0;
    display: flex;
    justify-content: center;
    align-items: flex-start;
}
.detail-card {
    background: #fff;
    border-radius: 20px;
    box-shadow: 0 8px 32px rgba(109,141,121,0.10);
    padding: 2.5rem 2rem;
    max-width: 520px;
    width: 100%;
    margin: 0 auto;
}
.detail-title {
    font-size: 2rem;
    font-weight: 800;
    color: #2d3748;
    margin-bottom: 2rem;
    display: flex;
    align-items: center;
    gap: 0.7rem;
    background: linear-gradient(135deg, #6D8D79, #5a7466);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}
.detail-list {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
}
.detail-row {
    display: flex;
    flex-direction: column;
    gap: 0.3rem;
    padding-bottom: 1rem;
    border-bottom: 1px solid #e2e8f0;
}
.detail-row:last-child { border-bottom: none; }
.detail-label {
    font-size: 1rem;
    font-weight: 600;
    color: #475569;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}
.detail-label i {
    color: #6D8D79;
    font-size: 1rem;
}
.detail-value {
    font-size: 1.1rem;
    color: #22223b;
    font-weight: 500;
    margin-left: 1.2rem;
}
.gallery-modern {
    display: flex;
    gap: 0.7rem;
    flex-wrap: wrap;
    margin-top: 0.2rem;
}
.gallery-img {
    width: 80px;
    height: 80px;
    object-fit: cover;
    border-radius: 12px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    border: 2px solid #e2e8f0;
    background: #f1f5f9;
    transition: transform 0.2s;
}
.gallery-img:hover {
    transform: scale(1.08);
    border-color: #6D8D79;
}
.no-image {
    color: #64748b;
    font-size: 0.98em;
    font-style: italic;
}
.button-group {
    display: flex;
    gap: 1rem;
    margin-top: 2.5rem;
    justify-content: flex-end;
}
.btn-modern {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.7rem 1.5rem;
    border-radius: 10px;
    font-size: 1rem;
    font-weight: 600;
    text-decoration: none;
    border: none;
    cursor: pointer;
    transition: background 0.2s, box-shadow 0.2s;
    box-shadow: 0 2px 8px rgba(109,141,121,0.08);
}
.btn-edit {
    background: linear-gradient(135deg, #6D8D79, #5a7466);
    color: #fff;
}
.btn-edit:hover {
    background: linear-gradient(135deg, #5a7466, #6D8D79);
    box-shadow: 0 4px 16px rgba(109,141,121,0.18);
}
.btn-back {
    background: linear-gradient(135deg, #64748b, #475569);
    color: #fff;
}
.btn-back:hover {
    background: linear-gradient(135deg, #475569, #64748b);
    box-shadow: 0 4px 16px rgba(100,116,139,0.18);
}
@media (max-width: 600px) {
    .detail-card { padding: 1.2rem 0.5rem; }
    .gallery-img { width: 60px; height: 60px; }
    .button-group { flex-direction: column; gap: 0.7rem; }
}
</style>
@endsection