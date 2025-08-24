@extends('layouts.superadmin')

@section('title','Data Sekolah')

@section('content')
<div class="page-container">
    <!-- Header -->
    <div class="page-header">
        <div class="header-content">
            <h1 class="page-title">
                <span class="emoji">🏫</span> Data Sekolah
            </h1>
            <p class="page-subtitle">Profil dan informasi kontak sekolah</p>
        </div>
    </div>

    <!-- Card -->
    <div class="content-card">
        <div class="card-header">
            <h2 class="card-title">
                <i class="fas fa-building"></i>
                Informasi Utama
            </h2>
        </div>

        <div class="card-body">
            @if(!isset($sekolah) || !$sekolah)
                <div class="empty-state-full">
                    <i class="fas fa-info-circle"></i>
                    <h3>Belum Ada Data Sekolah</h3>
                    <p>Silakan tambahkan atau perbarui data sekolah terlebih dahulu.</p>
                </div>
            @else
                <div class="info-grid">
                    <div class="form-group">
                        <div class="form-label">Nama Sekolah</div>
                        <div class="form-value">{{ $sekolah->namaSekolah ?? 'Belum Diisi' }}</div>
                    </div>

                    <div class="form-group">
                        <div class="form-label">Alamat</div>
                        <div class="form-value">{{ $sekolah->alamat ?? 'Belum Diisi' }}</div>
                    </div>

                    <div class="form-group">
                        <div class="form-label">Telepon</div>
                        <div class="form-value">{{ $sekolah->telepon ?? 'Belum Diisi' }}</div>
                    </div>

                    <div class="form-group">
                        <div class="form-label">Email</div>
                        <div class="form-value">
                            @if(!empty($sekolah->email))
                                <a href="mailto:{{ $sekolah->email }}">{{ $sekolah->email }}</a>
                            @else
                                Belum Diisi
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-label">Instagram</div>
                        <div class="form-value">
                            @php
                                $ig = $sekolah->instagram ?? null;
                                $igUrl = $ig ? (Str::startsWith($ig, ['http://','https://']) ? $ig : 'https://instagram.com/'.ltrim($ig,'@')) : null;
                            @endphp
                            @if($igUrl)
                                <a href="{{ $igUrl }}" target="_blank" rel="noopener">{{ $sekolah->instagram }}</a>
                            @else
                                Belum Diisi
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-label">Facebook</div>
                        <div class="form-value">
                            @php
                                $fb = $sekolah->facebook ?? null;
                                $fbUrl = $fb ? (Str::startsWith($fb, ['http://','https://']) ? $fb : 'https://facebook.com/'.$fb) : null;
                            @endphp
                            @if($fbUrl)
                                <a href="{{ $fbUrl }}" target="_blank" rel="noopener">{{ $sekolah->facebook }}</a>
                            @else
                                Belum Diisi
                            @endif
                        </div>
                    </div>
                </div>

                <div class="action-row">
                    <a href="{{ route('superadmin.sekolah.edit', $sekolah->sekolah_id) }}" class="btn btn-primary">
                        <i class="fas fa-pen"></i>
                        Edit Data
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
/* Samakan gaya dasar dengan halaman Prestasi/Dashboard */
.page-title .emoji {
    background: none !important;
    -webkit-text-fill-color: initial !important;
    color: initial !important;
}

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

.page-title {
    font-size: 2.2rem;
    font-weight: 800;
    margin: 0 0 .5rem 0;
    background: linear-gradient(135deg, #6D8D79, #5a7466);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    display: flex; align-items: center; gap: .5rem;
}

.page-subtitle {
    color: #64748b;
    font-size: 1rem;
    margin: 0;
    font-weight: 500;
}

.content-card {
    background: #fff;
    border-radius: 20px;
    box-shadow: 0 25px 50px rgba(0,0,0,.1);
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
    gap: .75rem;
    font-size: 1.25rem;
    font-weight: 700;
    color: #2d3748;
    margin: 0;
}
.card-title i { color: #6D8D79; }

.card-body { padding: 2rem; }

/* Grid 2 kolom untuk field */
.info-grid {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 1.25rem 2rem;
}

.form-group { display: flex; flex-direction: column; gap: .5rem; }

.form-label {
    font-weight: 700;
    color: #4a5568;
    font-size: .9rem;
}

.form-value {
    padding: .8rem 1rem;
    border: 2px solid #e2e8f0;
    border-radius: .75rem;
    background-color: #f8fafc;
    color: #2d3748;
    min-height: 46px;
    display: flex; align-items: center;
    word-break: break-word;
}

.form-value a { color: #2563eb; text-decoration: none; }
.form-value a:hover { text-decoration: underline; }

/* Action */
.action-row {
    margin-top: 1.5rem;
    display: flex;
    justify-content: flex-end;
}

.btn {
    display: inline-flex; align-items: center; gap: .5rem;
    padding: .75rem 1.25rem;
    border: none; border-radius: .75rem;
    font-weight: 700; text-decoration: none;
    cursor: pointer; transition: all .25s ease;
}

.btn-primary {
    background: linear-gradient(135deg, #6D8D79, #5a7466);
    color: #fff;
    box-shadow: 0 6px 16px rgba(109,141,121,.3);
}
.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 24px rgba(109,141,121,.4);
}

/* Empty state */
.empty-state-full {
    text-align: center;
    padding: 3rem 1rem;
    color: #64748b;
}
.empty-state-full i {
    font-size: 3rem; margin-bottom: 1rem; color: #cbd5e0;
}
.empty-state-full h3 { margin-bottom: .5rem; color: #4a5568; }

/* Responsive */
@media (max-width: 768px) {
    .page-header { text-align: center; }
    .info-grid { grid-template-columns: 1fr; }
    .action-row { justify-content: center; }
}
</style>
@endsection
