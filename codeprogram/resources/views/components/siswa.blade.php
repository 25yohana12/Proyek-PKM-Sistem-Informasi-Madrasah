@php
    $pendaftar = auth()->guard('pendaftar')->user();
    $notifikasi = $pendaftar 
        ? \App\Models\Notifikasi::where('data_id', $pendaftar->pendaftar_id)
                                 ->orderBy('created_at', 'desc')
                                 ->get()
        : collect();
    $notifCount = $notifikasi->where('read', false)->count();
@endphp

<nav class="navbar navbar-expand-lg navbar-light" style="background-color:#a8dfb0; font-family:'Arial',sans-serif; font-size:18px;">
  <div class="container-fluid">
    {{-- Brand --}}
    <a class="navbar-brand d-flex align-items-center" href="{{ route('siswa.home') }}" style="color:#000;">
      <img src="{{ asset('images/logo.png') }}" alt="Logo" width="30" height="30" class="me-2">
      MIN TOBA SAMOSIR
    </a>

    {{-- Toggler --}}
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    {{-- Menu --}}
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav ms-auto align-items-lg-center">

        {{-- BERANDA --}}
        <li class="nav-item me-lg-3">
          <a class="nav-link" href="{{ route('siswa.home') }}" style="color:#000;">Beranda</a>
        </li>

        {{-- PROFIL --}}
        <li class="nav-item dropdown me-lg-3">
          <a class="nav-link dropdown-toggle" href="#" id="profilDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color:#000;">
            Profil
          </a>
          <ul class="dropdown-menu" aria-labelledby="profilDropdown">
            <li><a class="dropdown-item" href="{{ route('siswa.profilsekolah') }}">Profil Sekolah</a></li>
            <li><a class="dropdown-item" href="{{ route('siswa.siswa.strukturorganisasi') }}">Struktur Organisasi</a></li>
            <li><a class="dropdown-item" href="{{ route('siswa.siswa.fasilitas') }}">Fasilitas</a></li>
          </ul>
        </li>

        {{-- WARGA SEKOLAH --}}
        <li class="nav-item dropdown me-lg-3">
          <a class="nav-link dropdown-toggle" href="#" id="wargaDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color:#000;">
            Warga Sekolah
          </a>
          <ul class="dropdown-menu" aria-labelledby="wargaDropdown">
            <li><a class="dropdown-item" href="{{ route('siswa.siswa.guru') }}">Data Guru</a></li>
            <li><a class="dropdown-item" href="{{ route('siswa.siswa.siswa') }}">Data Siswa</a></li>
          </ul>
        </li>

        {{-- KEGIATAN --}}
        <li class="nav-item dropdown me-lg-3">
          <a class="nav-link dropdown-toggle" href="#" id="kegiatanDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color:#000;">
            Kegiatan
          </a>
          <ul class="dropdown-menu" aria-labelledby="kegiatanDropdown">
            <li><a class="dropdown-item" href="{{ route('siswa.siswa.acara') }}">Perayaan & Event</a></li>
            <li><a class="dropdown-item" href="{{ route('siswa.siswa.prestasi') }}">Prestasi</a></li>
          </ul>
        </li>

        {{-- PPDB / PENDAFTARAN --}}
        <li class="nav-item dropdown me-lg-3">
          <a class="nav-link dropdown-toggle" href="#" id="ppdbDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color:#000;">
            PPDB
          </a>
          <ul class="dropdown-menu" aria-labelledby="ppdbDropdown">
            <li><a class="dropdown-item" href="{{ route('siswa.create.pendaftaran') }}">Formulir</a></li>
            <li><a class="dropdown-item" href="{{ route('siswa.siswa.pengumuman') }}">Jadwal</a></li>
          </ul>
        </li>

        {{-- Notifikasi --}}
        <li class="nav-item me-lg-3 position-relative">
          <button class="btn btn-notif position-relative" id="notifBtn" title="Notifikasi" type="button">
            <i class="bi bi-bell-fill" style="font-size: 1.2rem;"></i>
            <span class="notif-badge" id="notifBadge">{{ $notifCount }}</span>
          </button>

          <div id="notifPopup" class="notif-popup">
            <div class="notif-popup-header"><strong>Notifikasi Terbaru</strong></div>
            <ul class="notif-popup-list">
              @foreach($notifikasi->take(5) as $notif)
                <li class="notif-popup-item {{ $notif->read ? 'notif-read' : 'notif-unread' }}">
                  <a href="{{ route('siswa.notifikasi.show', $notif->id) }}" class="notif-link">
                    <span class="notif-msg">{{ $notif->pesan }}</span>
                    <span class="notif-time">{{ $notif->created_at->format('d M H:i') }}</span>
                  </a>
                </li>
              @endforeach
            </ul>
          </div>
        </li>

        {{-- Logout --}}
        <li class="nav-item me-lg-3">
          <form action="{{ route('siswa.logout') }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit" class="nav-link btn btn-link" style="color:#000; text-decoration:none;">
              <i class="fas fa-sign-out-alt me-1"></i> LogOut
            </button>
          </form>
        </li>

      </ul>
    </div>
  </div>
</nav>

{{-- Styles & JS sama seperti contoh sebelumnya --}}


<style>
.btn-notif { position: relative; background: #6D8D79; color:#fff; border-radius:50%; width:48px; height:48px; display:flex; justify-content:center; align-items:center; border:none; }
.notif-badge { position: absolute; top:0; right:0; background:#ef4444; color:#fff; font-size:0.75rem; font-weight:700; padding:2px 6px; border-radius:50%; }
.notif-popup { display:none; position:absolute; top:56px; right:0; width:300px; background:#fff; border-radius:10px; box-shadow:0 4px 12px rgba(0,0,0,0.2); z-index:9999; }
.notif-popup-header { padding:8px 12px; border-bottom:1px solid #ddd; font-weight:bold; }
.notif-popup-list { list-style:none; margin:0; padding:0; max-height:260px; overflow-y:auto; }
.notif-popup-item a { display:flex; justify-content:space-between; padding:10px; text-decoration:none; color:#333; border-radius:6px; }
.notif-unread { background:#e0f2f1; } .notif-read { background:#fff; }
.notif-popup-item a:hover { background:#f1f5f9; }
.notif-msg { font-weight:600; } .notif-time { font-size:0.8rem; color:#888; }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const notifBtn = document.getElementById('notifBtn');
  const notifPopup = document.getElementById('notifPopup');

  if (notifBtn && notifPopup) {
    notifBtn.addEventListener('click', function(e) {
      notifPopup.style.display = (notifPopup.style.display === 'block') ? 'none' : 'block';
      e.stopPropagation();
    });

    document.addEventListener('click', function(e) {
      if (!notifBtn.contains(e.target) && !notifPopup.contains(e.target)) {
        notifPopup.style.display = 'none';
      }
    });
  }
});
</script>
