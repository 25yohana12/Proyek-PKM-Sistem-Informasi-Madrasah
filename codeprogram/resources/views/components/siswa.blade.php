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
            <i class="fas fa-bell"></i>
            <span class="notif-badge" id="notifBadge">{{ $notifCount ?? 0 }}</span>
          </button>
          <!-- Popup Notifikasi -->
          <div id="notifPopup" class="notif-popup" style="display:none;">
            <div class="notif-popup-header">
              <strong>Notifikasi Terbaru</strong>
            </div>
            <ul class="notif-popup-list" id="notifList">
              @if(isset($notifikasis) && $notifikasis->count() > 0)
                @foreach($notifikasis->take(5) as $notif)
                  <li class="notif-popup-item {{ $notif->read ? 'notif-read' : 'notif-unread' }}">
                    <a href="#" class="notif-link" data-id="{{ $notif->id }}">
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
                <a href="#" class="btn btn-notif-more">Lihat Selengkapnya</a>
              </div>
            @endif
          </div>
        </li>
        
        <!-- Logout -->
        <li class="nav-item me-lg-3">
          <a class="nav-link" href="{{ route('siswa.logout') }}" style="color:#000;">
            <i class="fas fa-sign-out-alt me-1"></i>LogOut
          </a>
        </li>

      </ul>
    </div>
  </div>
</nav>

<style>
/* Notification Styles - Same as dashboard.blade.php */
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
    font-size: 1.4rem;
    position: relative;
    box-shadow: 0 4px 16px rgba(109,141,121,0.15);
    transition: background 0.2s, box-shadow 0.2s;
}

.btn-notif:hover {
    background: linear-gradient(135deg, #5a7466, #6D8D79);
    box-shadow: 0 8px 24px rgba(109,141,121,0.25);
}

.notif-badge {
    position: absolute;
    top: 8px;
    right: 8px;
    background: #ef4444;
    color: #fff;
    font-size: 0.85rem;
    font-weight: 700;
    padding: 2px 7px;
    border-radius: 12px;
    box-shadow: 0 2px 8px rgba(239,68,68,0.12);
}

.notif-popup {
    position: absolute;
    top: 56px;
    right: 0;
    width: 340px;
    background: #fff;
    border-radius: 14px;
    box-shadow: 0 8px 32px rgba(109,141,121,0.18);
    z-index: 99;
    border: 1px solid #e2e8f0;
    padding: 0;
}

.notif-popup-header {
    padding: 14px 22px;
    border-bottom: 1px solid #e2e8f0;
    font-size: 1.08rem;
    color: #2d3748;
    font-weight: 700;
    background: #f8fafc;
    border-radius: 14px 14px 0 0;
}

.notif-popup-list {
    list-style: none;
    margin: 0;
    padding: 0;
    max-height: 260px;
    overflow-y: auto;
}

.notif-popup-item {
    margin: 10px 14px;
    border-radius: 10px;
    transition: background 0.2s;
    box-shadow: 0 2px 8px rgba(109,141,121,0.07);
}

.notif-popup-item a {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 12px 16px;
    text-decoration: none;
    color: #2d3748;
    font-size: 0.97rem;
    border-radius: 10px;
}

.notif-unread {
    background: #a1a7b3ff;
}

.notif-read {
    background: #fff;
}

.notif-popup-item a:hover {
    background: #e2e8f0;
}

.notif-msg {
    font-weight: 600;
    flex: 1;
    color: #374151;
}

.notif-time {
    font-size: 0.85rem;
    color: #a0aec0;
    margin-left: 12px;
    white-space: nowrap;
}

.notif-popup-empty {
    text-align: center;
    color: #64748b;
    padding: 18px 0;
    font-size: 0.98rem;
}

.notif-popup-footer {
    border-top: 1px solid #e2e8f0;
    background: #f8fafc;
    border-radius: 0 0 14px 14px;
}

.btn-notif-more {
    display: inline-block;
    padding: 7px 18px;
    font-size: 0.98rem;
    color: #2d3748;
    background: #e2e8f0;
    border-radius: 8px;
    text-decoration: none;
    font-weight: 600;
    transition: background 0.2s;
}

.btn-notif-more:hover {
    background: #cbd5e1;
    color: #1e293b;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .notif-popup {
        width: 280px;
        right: -10px;
    }
    
    .btn-notif {
        width: 44px;
        height: 44px;
        font-size: 1.2rem;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const notifBtn = document.getElementById('notifBtn');
    const notifPopup = document.getElementById('notifPopup');
    const notifBadge = document.getElementById('notifBadge');
    const notifLinks = document.querySelectorAll('.notif-link');

    if (notifBtn && notifPopup) {
        notifBtn.addEventListener('click', function(e) {
            notifPopup.style.display = notifPopup.style.display === 'none' ? 'block' : 'none';
            e.stopPropagation();
        });

        document.addEventListener('click', function(e) {
            if (!notifBtn.contains(e.target) && !notifPopup.contains(e.target)) {
                notifPopup.style.display = 'none';
            }
        });

        notifLinks.forEach(function(link) {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                // Kurangi badge saat notif diklik
                let count = parseInt(notifBadge.textContent);
                if (count > 0) notifBadge.textContent = count - 1;
                
                // Mark this notification as read visually
                const parentItem = this.closest('.notif-popup-item');
                if (parentItem) {
                    parentItem.classList.remove('notif-unread');
                    parentItem.classList.add('notif-read');
                }
                
                // Optional: AJAX untuk mark as read di backend
                // fetch('/siswa/notifikasi/' + this.dataset.id + '/read', {method: 'POST'});
            });
        });
    }
});
</script>

<!-- Bootstrap JS & Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
