<nav class="navbar navbar-expand-lg navbar-light bg-success fixed-top shadow-sm">
  <div class="container-fluid">
    <a class="navbar-brand d-flex align-items-center text-white fw-bold" href="{{ url('/') }}">
      <img src="{{ asset('images/logo.png') }}" alt="Logo" width="30" height="30" class="me-2">
      MIN TOBA SAMOSIR
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav ms-auto">
        <!-- BERANDA -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" href="#" id="berandaDropdown" role="button" data-bs-toggle="dropdown">
            BERANDA
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ url('/') }}">Home</a></li>
            <li><a class="dropdown-item" href="{{ url('/galeri') }}">Galeri</a></li>
            <li><a class="dropdown-item" href="{{ url('/strukturorganisasi') }}">Struktur Organisasi</a></li>
          </ul>
        </li>

        <!-- TENTANG -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" href="#" id="tentangDropdown" role="button" data-bs-toggle="dropdown">
            TENTANG
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ url('/ProfilSekolah') }}">Profil Sekolah</a></li>
            <li><a class="dropdown-item" href="{{ url('/guru') }}">Data Guru</a></li>
            <li><a class="dropdown-item" href="{{ route('guest.siswa') }}">Data Siswa</a></li>
          </ul>
        </li>

        <!-- KEGIATAN -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" href="#" id="kegiatanDropdown" role="button" data-bs-toggle="dropdown">
            KEGIATAN
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('guest.acara') }}">Perayaan & Event</a></li>
            <li><a class="dropdown-item" href="{{ route('guest.prestasi') }}">Prestasi</a></li>
            <li><a class="dropdown-item" href="{{ route('guest.Fasilitas') }}">Fasilitas</a></li>
          </ul>
        </li>

        <!-- PENDAFTARAN -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" href="#" id="pendaftaranDropdown" role="button" data-bs-toggle="dropdown">
            PENDAFTARAN
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ url('/pendaftaran/formulir') }}">Formulir</a></li>
            <li><a class="dropdown-item" href="{{ url('/pendaftaran/jadwal') }}">Jadwal</a></li>
            <li><a class="dropdown-item" href="{{ url('/pendaftaran/syarat') }}">Syarat</a></li>
          </ul>
        </li>

        <!-- PROFIL -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" href="#" id="profilDropdown" role="button" data-bs-toggle="dropdown">
            <i class="bi bi-person-circle"></i>
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="{{ url('/login') }}">Profil Saya</a></li>
            <li><a class="dropdown-item" href="{{ url('/logout') }}">Keluar</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
