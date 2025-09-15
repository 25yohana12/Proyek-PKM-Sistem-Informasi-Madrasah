<nav class="navbar navbar-expand-lg navbar-light" style="background-color:#a8dfb0; font-family:'Arial',sans-serif; font-size:18px;">
  <div class="container-fluid">

    {{-- Brand --}}
    <a class="navbar-brand d-flex align-items-center" href="{{ route('siswa.home') }}" style="color:#000;">
      <img src="{{ asset('images/logo.png') }}" alt="Logo" width="30" height="30" class="me-2">
      MIN TOBA SAMOSIR
    </a>

    {{-- Toggler --}}
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
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
        
        <!-- Notifikasi -->
        <li class="nav-item me-lg-3 position-relative">
          <button class="btn btn-notif position-relative" id="notifBtn" title="Notifikasi" type="button">
            <!-- Ikon Bel -->
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-bell-fill" viewBox="0 0 16 16">
              <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2m.995-14.901a1 1 0 1 0-1.99 0A5 5 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901"/>
            </svg>
            <!-- Badge -->
            <span class="notif-badge" id="notifBadge">{{ $notifCount ?? 0 }}</span>
          </button>
          
          <!-- Popup -->
          <div id="notifPopup" class="notif-popup">
            <div class="notif-popup-header">
              <strong>Notifikasi Terbaru</strong>
            </div>
            <ul class="notif-popup-list" id="notifList">
              @if(isset($notifikasis) && $notifikasis->count() > 0)
                @foreach($notifikasis->take(5) as $notif)
                  <li class="notif-popup-item {{ $notif->read ? 'notif-read' : 'notif-unread' }}">
                    <a href="{{ route('admin.notifikasi.show', $notif->id) }}" class="notif-link" data-id="{{ $notif->id }}">
                      <span class="notif-msg">{{ $notif->pesan }}</span>
                      <span class="notif-time">{{ $notif->created_at->format('d M H:i') }}</span>
                    </a>
                  </li>
                @endforeach
              @else
                <li class="notif-popup-empty">
                  <i class="fas fa-info-circle"></i> Belum ada notifikasi baru.
                </li>
              @endif
            </ul>
            @if(isset($notifikasis) && $notifikasis->count() > 5)
              <div class="notif-popup-footer text-center py-2">
                <a href="{{ route('admin.notifikasi.index') }}" class="btn btn-notif-more">Lihat Selengkapnya</a>
              </div>
            @endif
          </div>
        </li>

        <!-- Logout -->
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<style>
/* Tombol notif */
.btn-notif {
    background: linear-gradient(135deg, #6D8D79, #5a7466);
    color: #fff;
    border: none;
    border-radius: 50%;
    width: 48px;
    height: 48px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
    position: relative;
    box-shadow: 0 4px 16px rgba(109,141,121,0.15);
    cursor: pointer;
}

/* Badge */
.notif-badge {
    position: absolute;
    top: 6px;
    right: 6px;
    background: #ef4444;
    color: #fff;
    font-size: 0.75rem;
    font-weight: 700;
    padding: 2px 7px;
    border-radius: 12px;
}

/* Popup */
.notif-popup {
    display: none;
    position: absolute;
    top: 56px;
    right: 0;
    width: 340px;
    background: #fff;
    border-radius: 14px;
    box-shadow: 0 8px 32px rgba(109,141,121,0.18);
    z-index: 9999;
    pointer-events: auto;
}
.notif-popup.hidden {
    display: none;
    pointer-events: none;
}

/* Header popup */
.notif-popup-header {
    padding: 12px 18px;
    border-bottom: 1px solid #e2e8f0;
    font-weight: bold;
}

/* List notif */
.notif-popup-list {
    list-style: none;
    margin: 0;
    padding: 0;
    max-height: 260px;
    overflow-y: auto;
}

.notif-popup-item {
    margin: 8px 12px;
    border-radius: 10px;
    transition: background 0.2s;
}

.notif-popup-item a {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 14px;
    text-decoration: none;
    color: #333;
}

.notif-unread { background: #e0f2f1; }
.notif-read { background: #fff; }

.notif-popup-item a:hover { background: #f1f5f9; }

.notif-msg { font-weight: 600; }
.notif-time { font-size: 0.8rem; color: #888; }
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

<!-- Bootstrap -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
