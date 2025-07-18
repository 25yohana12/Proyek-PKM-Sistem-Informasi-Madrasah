<div class="sidebar" id="sidebar">
    <h2>MIN TOBA SAMOSIR</h2>
    <nav>
        <ul>
            <!-- Dashboard -->
            <li><a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <i class="fas fa-home"></i>Dashboard
            </a></li>
            
            <!-- Akun Admin -->
            <li><a href="{{ route('admin.index') }}" class="{{ request()->routeIs('admin.*') ? 'active' : '' }}">
                <i class="fas fa-users"></i>Akun Admin
            </a></li>
            
            <!-- Sub Menu dari Akun Admin -->
            <li><a href="#" class="sub-menu {{ request()->routeIs('civitas.*') ? 'active' : '' }}">
                <i class="fas fa-graduation-cap"></i>Civitas
            </a></li>
            
            <li><a href="{{ route('data.guru') }}" class="sub-menu {{ request()->routeIs('data.guru') ? 'active' : '' }}">
                <i class="fas fa-chalkboard-teacher"></i>Data Guru
            </a></li>
            
            <li><a href="#" class="sub-menu {{ request()->routeIs('kelas.*') ? 'active' : '' }}">
                <i class="fas fa-door-open"></i>Data Kelas
            </a></li>
            
            <li><a href="#" class="sub-menu {{ request()->routeIs('struktur.*') ? 'active' : '' }}">
                <i class="fas fa-sitemap"></i>Struktur Organisasi
            </a></li>
            
            <!-- Publikasi -->
            <li><a href="#" class="{{ request()->routeIs('publikasi.*') ? 'active' : '' }}">
                <i class="fas fa-newspaper"></i>Publikasi
            </a></li>
            
            <!-- Sub Menu dari Publikasi -->
            <li><a href="{{ route('acara.index') }}" class="sub-menu {{ request()->routeIs('acara.*') ? 'active' : '' }}">
                <i class="fas fa-calendar-alt"></i>Perayaan
            </a></li>
            
            <li><a href="{{ route('galeri.index') }}" class="sub-menu {{ request()->routeIs('galeri.*') ? 'active' : '' }}">
                <i class="fas fa-images"></i>Galeri
            </a></li>
            
            <li><a href="{{ route('prestasi.index') }}" class="sub-menu {{ request()->routeIs('prestasi.*') ? 'active' : '' }}">
                <i class="fas fa-trophy"></i>Prestasi
            </a></li>
            
            <!-- Profil Sekolah -->
            <li><a href="#" class="{{ request()->routeIs('profil.*') ? 'active' : '' }}">
                <i class="fas fa-school"></i>Profil Sekolah
            </a></li>
            
            <!-- Sub Menu dari Profil Sekolah -->
            <li><a href="#" class="sub-menu {{ request()->routeIs('kontak.*') ? 'active' : '' }}">
                <i class="fas fa-phone"></i>Kontak
            </a></li>
            
            <li><a href="{{ route('ekstrakulikuler.index') }}" class="sub-menu {{ request()->routeIs('ekstrakulikuler.*') ? 'active' : '' }}">
                <i class="fas fa-running"></i>Ekstrakurikuler
            </a></li>
            
            <li><a href="{{ route('fasilitas.index') }}" class="sub-menu {{ request()->routeIs('fasilitas.*') ? 'active' : '' }}">
                <i class="fas fa-building"></i>Fasilitas
            </a></li>
            
            <!-- Pendaftaran -->
            <li><a href="#" class="{{ request()->routeIs('pendaftaran.*') ? 'active' : '' }}">
                <i class="fas fa-user-plus"></i>Pendaftaran
            </a></li>

            <li><a href="{{ route('informasi.index') }}" class="sub-menu {{ request()->routeIs('informasi.*') ? 'active' : '' }}">
                <i class="fas fa-info-circle"></i>Informasi Pendaftaran
            </a></li>
            
            <li><a href="{{ route('daftar-pendaftar.index') }}" class="sub-menu {{ request()->routeIs('daftar-pendaftar.*') ? 'active' : '' }}">
                <i class="fas fa-list-ul"></i>Daftar Pendaftar
            </a></li>
            
            <!-- Logout -->
            <li><a href="#" onclick="confirmLogout()">
                <i class="fas fa-sign-out-alt"></i>Logout
            </a></li>
        </ul>
    </nav>
</div>