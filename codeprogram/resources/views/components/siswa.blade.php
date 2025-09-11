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

        <li class="nav-item me-lg-3">
          <a class="nav-link" href="{{ route('siswa.logout') }}" style="color:#000;">LogOut</a>
        </li>

      </ul>
    </div>
  </div>
</nav>

<!-- Bootstrap JS & Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
