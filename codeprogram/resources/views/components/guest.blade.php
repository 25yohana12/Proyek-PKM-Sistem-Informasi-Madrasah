<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #60f797; color: black; font-family: 'Arial', sans-serif; font-weight: normal; font-size: 18px;">
  <div class="container-fluid">
    <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}" style="color: black; font-size: 18px;">
      <img src="{{ asset('images/logo.png') }}" alt="Logo" width="30" height="30" class="me-2">
      MIN TOBA SAMOSIR
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav ms-auto">
        <!-- BERANDA -->
        <li class="nav-item dropdown" style="margin-right: 35px;">
          <a class="nav-link dropdown-toggle" href="#" id="berandaDropdown" role="button" data-bs-toggle="dropdown" style="color: black; font-size: 18px;">
            BERANDA
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ url('/') }}" style="color: black; font-size: 18px;">Home</a></li>
            <li><a class="dropdown-item" href="{{ url('/galeri') }}" style="color: black; font-size: 18px;">Galeri</a></li>
            <li><a class="dropdown-item" href="{{ url('/strukturorganisasi') }}" style="color: black; font-size: 18px;">Struktur Organisasi</a></li>
          </ul>
        </li>

        <!-- TENTANG -->
        <li class="nav-item dropdown" style="margin-right: 35px;">
          <a class="nav-link dropdown-toggle" href="#" id="tentangDropdown" role="button" data-bs-toggle="dropdown" style="color: black; font-size: 18px;">
            TENTANG
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ url('/ProfilSekolah') }}" style="color: black; font-size: 18px;">Profil Sekolah</a></li>
            <li><a class="dropdown-item" href="{{ url('/guru') }}" style="color: black; font-size: 18px;">Data Guru</a></li>
            <li><a class="dropdown-item" href="{{ route('guest.siswa') }}" style="color: black; font-size: 18px;">Data Siswa</a></li>
          </ul>
        </li>

        <!-- KEGIATAN -->
        <li class="nav-item dropdown" style="margin-right: 35px;">
          <a class="nav-link dropdown-toggle" href="#" id="kegiatanDropdown" role="button" data-bs-toggle="dropdown" style="color: black; font-size: 18px;">
            KEGIATAN
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('guest.acara') }}" style="color: black; font-size: 18px;">Perayaan & Event</a></li>
            <li><a class="dropdown-item" href="{{ route('guest.prestasi') }}" style="color: black; font-size: 18px;">Prestasi</a></li>
            <li><a class="dropdown-item" href="{{ route('guest.fasilitas') }}" style="color: black; font-size: 18px;">Fasilitas</a></li>
          </ul>
        </li>

        <!-- PENDAFTARAN -->
        <li class="nav-item dropdown" style="margin-right: 35px;">
          <a class="nav-link dropdown-toggle" href="#" id="pendaftaranDropdown" role="button" data-bs-toggle="dropdown" style="color: black; font-size: 18px;">
            PENDAFTARAN
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ url('/pendaftaran/formulir') }}" style="color: black; font-size: 18px;">Formulir</a></li>
            <li><a class="dropdown-item" href="{{ url('/pengumuman') }}" style="color: black; font-size: 18px;">Jadwal</a></li>
            <li><a class="dropdown-item" href="{{ url('/pendaftaran/syarat') }}" style="color: black; font-size: 18px;">Syarat</a></li>
          </ul>
        </li>

        <!-- LOGIN BUTTON -->
        <li class="nav-item" style="margin-right: 35px;">
          <a class="nav-link" href="{{ url('/login') }}" style="color: black; font-size: 18px;">
            <button class="btn btn-primary" style="font-size: 18px;">Login</button>
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<style>
  /* Menghilangkan ikon segitiga kebawah (dropdown arrow) tanpa menghilangkan dropdown */
  .nav-item.dropdown .nav-link::after {
    display: none !important;
  }
</style>
