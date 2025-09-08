<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #E4FFEE; color: black; font-family: 'Arial', sans-serif; font-weight: normal; font-size: 18px;">
  <div class="container-fluid">
    <a class="navbar-brand d-flex align-items-center" href="{{ route('siswa.home') }}" style="color: black; font-size: 18px;">
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
            <li><a class="dropdown-item" href="{{ route('siswa.home') }}" style="color: black; font-size: 18px;">Home</a></li>
            <li><a class="dropdown-item" href="{{ route('siswa.siswa.galeri') }}" style="color: black; font-size: 18px;">Galeri</a></li>
            <li><a class="dropdown-item" href="{{ route('siswa.siswa.strukturorganisasi') }}" style="color: black; font-size: 18px;">Struktur Organisasi</a></li>
          </ul>
        </li>

        <!-- TENTANG -->
        <li class="nav-item dropdown" style="margin-right: 35px;">
          <a class="nav-link dropdown-toggle" href="#" id="tentangDropdown" role="button" data-bs-toggle="dropdown" style="color: black; font-size: 18px;">
            TENTANG
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('siswa.siswa.siswa') }}" style="color: black; font-size: 18px;">Profil Sekolah</a></li>
            <li><a class="dropdown-item" href="{{ route('siswa.siswa.guru') }}" style="color: black; font-size: 18px;">Data Guru</a></li>
            <li><a class="dropdown-item" href="{{ route('siswa.siswa.siswa') }}" style="color: black; font-size: 18px;">Data Siswa</a></li>
          </ul>
        </li>

        <!-- KEGIATAN -->
        <li class="nav-item dropdown" style="margin-right: 35px;">
          <a class="nav-link dropdown-toggle" href="#" id="kegiatanDropdown" role="button" data-bs-toggle="dropdown" style="color: black; font-size: 18px;">
            KEGIATAN
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('siswa.siswa.acara') }}" style="color: black; font-size: 18px;">Perayaan & Event</a></li>
            <li><a class="dropdown-item" href="{{ route('siswa.siswa.prestasi') }}" style="color: black; font-size: 18px;">Prestasi</a></li>
            <li><a class="dropdown-item" href="{{ route('siswa.siswa.fasilitas') }}" style="color: black; font-size: 18px;">Fasilitas</a></li>
          </ul>
        </li>

        <!-- PENDAFTARAN -->
        <li class="nav-item dropdown" style="margin-right: 35px;">
          <a class="nav-link dropdown-toggle" href="#" id="pendaftaranDropdown" role="button" data-bs-toggle="dropdown" style="color: black; font-size: 18px;">
            PENDAFTARAN
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('siswa.create.pendaftaran') }}" style="color: black; font-size: 18px;">Formulir</a></li>
            <li><a class="dropdown-item" href="{{ route('siswa.siswa.pengumuman') }}" style="color: black; font-size: 18px;">Pengumuman</a></li>
          </ul>
        </li>

        <!-- PROFIL -->
        <li class="nav-item dropdown" style="margin-right: 35px;">
          <a class="nav-link dropdown-toggle" href="#" id="profilDropdown" role="button" data-bs-toggle="dropdown" style="color: black; font-size: 18px;">
            <i class="bi bi-person-circle"></i>
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="#" style="color: black; font-size: 18px;">Profil Saya</a></li>
            <li><a class="dropdown-item" href="{{ route('siswa.logout') }}" style="color: black; font-size: 18px;">Keluar</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

<style>
  .nav-item.dropdown .nav-link::after {
    display: none !important;
  }
</style>
