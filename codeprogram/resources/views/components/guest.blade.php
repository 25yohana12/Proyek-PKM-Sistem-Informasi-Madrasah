<nav class="navbar navbar-expand-lg navbar-light" style="background-color:#a8dfb0; font-family:'Arial',sans-serif; font-size:18px;">
  <div class="container-fluid">

    {{-- Brand --}}
    <a class="navbar-brand d-flex align-items-center" href="{{ route('guest.home') }}" style="color:#000;">
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

        {{-- BERANDA (bukan dropdown) --}}
        <li class="nav-item me-lg-3">
          <a class="nav-link" href="{{ route('guest.home') }}" style="color:#000;">Beranda</a>
        </li>

        {{-- PROFIL --}}
        <li class="nav-item dropdown me-lg-3">
          <a class="nav-link dropdown-toggle" href="#" id="profilDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color:#000;">
            Profil
          </a>
          <ul class="dropdown-menu" aria-labelledby="profilDropdown">
            <li><a class="dropdown-item" href="{{ url('/ProfilSekolah') }}">Profil Sekolah</a></li>
            <li><a class="dropdown-item" href="{{ route('guest.strukturorganisasi') }}">Struktur Organisasi</a></li>
            <li><a class="dropdown-item" href="{{ route('guest.fasilitas') }}">Fasilitas</a></li>
          </ul>
        </li>

        {{-- WARGA SEKOLAH --}}
        <li class="nav-item dropdown me-lg-3">
          <a class="nav-link dropdown-toggle" href="#" id="wargaDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color:#000;">
            Warga Sekolah
          </a>
          <ul class="dropdown-menu" aria-labelledby="wargaDropdown">
            <li><a class="dropdown-item" href="{{ route('guest.guru') }}">Data Guru</a></li>
            <li><a class="dropdown-item" href="{{ route('guest.siswa') }}">Data Siswa</a></li>
          </ul>
        </li>

        {{-- KEGIATAN --}}
        <li class="nav-item dropdown me-lg-3">
          <a class="nav-link dropdown-toggle" href="#" id="kegiatanDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color:#000;">
            Kegiatan
          </a>
          <ul class="dropdown-menu" aria-labelledby="kegiatanDropdown">
            <li><a class="dropdown-item" href="{{ route('guest.acara') }}">Perayaan</a></li>
            <li><a class="dropdown-item" href="{{ route('guest.prestasi') }}">Prestasi</a></li>
          </ul>
        </li>

        {{-- PPDB / PENDAFTARAN --}}
        <li class="nav-item dropdown me-lg-3">
          <a class="nav-link dropdown-toggle" href="#" id="ppdbDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color:#000;">
            Informasi
          </a>
          <ul class="dropdown-menu" aria-labelledby="ppdbDropdown">
            <li><a class="dropdown-item" href="{{ route('siswa.register_awal') }}">Formulir</a></li>
            <li><a class="dropdown-item" href="{{ route('guest.pengumuman') }}">Jadwal</a></li>
          </ul>
        </li>

        {{-- LOGIN --}}
        <li class="nav-item">
          <a class="btn btn-primary" href="{{ route('login') }}" style="font-size:16px; background-color:#34C759; color:#000; border:0;">
            Login
          </a>
        </li>

      </ul>
    </div>
  </div>
</nav>
