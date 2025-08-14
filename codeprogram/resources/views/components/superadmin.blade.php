<style>
    .sidebar ul {
        list-style-type: none;
        padding: 0;
    }

    .sidebar ul li a {
        display: block;
        padding: 10px 15px;
        color: #333;
        text-decoration: none;
    }

    .sidebar ul li a.active {
        background-color: #f0f0f0;
        font-weight: bold;
    }

    /* Hapus segitiga di dropdown-toggle */
    .dropdown-toggle::after {
        content: "";
    }

    /* Dropdown item menjorok ke dalam */
    .dropdown {
        display: none;
        padding-left: 20px;
        border-left: 2px solid #ddd;
        margin-left: 10px;
    }

    .dropdown.show {
        display: block;
    }

    .dropdown li a {
        padding: 8px 20px;
        font-size: 14px;
    }
</style>

<div class="sidebar" id="sidebar">
    <h2>MIN TOBA SAMOSIR</h2>
    <nav>
        <ul>
            <!-- 1. Dashboard -->
<li>
    <a href="{{ route('superadmin.dashboard') }}" class="{{ request()->routeIs('superadmin.dashboard') ? 'active' : '' }}">
        <i class="fas fa-home"></i> Dashboard
    </a>
</li>

<!-- 2. Akun Admin -->
<li>
    <a href="{{ route('superadmin.admin.index') }}" class="{{ request()->routeIs('superadmin.admin.*') ? 'active' : '' }}">
        <i class="fas fa-users"></i> Akun Admin
    </a>
</li>

<!-- 3. Civitas -->
<li>
    <a href="#" class="dropdown-toggle">
        <i class="fas fa-graduation-cap"></i> Civitas
    </a>
    <ul class="dropdown {{ request()->routeIs('superadmin.guru.*') || request()->routeIs('superadmin.siswa.*') || request()->routeIs('superadmin.strukturorganisasi.*') ? 'show' : '' }}">
        <li>
            <a href="{{ route('superadmin.guru.index') }}" class="{{ request()->routeIs('superadmin.guru.*') ? 'active' : '' }}">
                <i class="fas fa-chalkboard-teacher"></i> Data Guru
            </a>
        </li>
        <li>
            <a href="{{ route('superadmin.siswa.index') }}" class="{{ request()->routeIs('superadmin.siswa.*') ? 'active' : '' }}">
                <i class="fas fa-door-open"></i> Data Siswa
            </a>
        </li>
        <li>
            <a href="{{ route('superadmin.strukturorganisasi.index') }}" class="{{ request()->routeIs('superadmin.strukturorganisasi.*') ? 'active' : '' }}">
                <i class="fas fa-sitemap"></i> Struktur Organisasi
            </a>
        </li>
    </ul>
</li>

<!-- 4. Publikasi -->
<li>
    <a href="#" class="dropdown-toggle">
        <i class="fas fa-newspaper"></i> Publikasi
    </a>
    <ul class="dropdown {{ request()->routeIs('superadmin.acara.*') || request()->routeIs('superadmin.galeri.*') || request()->routeIs('superadmin.prestasi.*') ? 'show' : '' }}">
        <li>
            <a href="{{ route('superadmin.acara.index') }}" class="{{ request()->routeIs('superadmin.acara.*') ? 'active' : '' }}">
                <i class="fas fa-calendar-alt"></i> Perayaan
            </a>
        </li>
        <li>
            <a href="{{ route('superadmin.galeri.index') }}" class="{{ request()->routeIs('superadmin.galeri.*') ? 'active' : '' }}">
                <i class="fas fa-images"></i> Galeri
            </a>
        </li>
        <li>
            <a href="{{ route('superadmin.prestasi.index') }}" class="{{ request()->routeIs('superadmin.prestasi.*') ? 'active' : '' }}">
                <i class="fas fa-trophy"></i> Prestasi
            </a>
        </li>
    </ul>
</li>

<!-- 5. Profil Sekolah -->
<li>
    <a href="#" class="dropdown-toggle">
        <i class="fas fa-school"></i> Profil Sekolah
    </a>
    <ul class="dropdown {{ request()->routeIs('superadmin.ekstrakurikuler.*') || request()->routeIs('superadmin.fasilitas.*') || request()->routeIs('superadmin.sekolah.*') ? 'show' : '' }}">
        <li>
            <a href="{{ route('superadmin.sekolah.index') }}" class="{{ request()->routeIs('superadmin.sekolah.*') ? 'active' : '' }}">
                <i class="fas fa-school"></i> Sekolah
            </a>
        </li>
        <li>
            <a href="{{ route('superadmin.ekstrakurikuler.index') }}" class="{{ request()->routeIs('superadmin.ekstrakurikuler.*') ? 'active' : '' }}">
                <i class="fas fa-running"></i> Ekstrakurikuler
            </a>
        </li>
        <li>
            <a href="{{ route('superadmin.fasilitas.index') }}" class="{{ request()->routeIs('superadmin.fasilitas.*') ? 'active' : '' }}">
                <i class="fas fa-building"></i> Fasilitas
            </a>
        </li>
    </ul>
</li>

<!-- 6. Pendaftaran -->
<li>
    <a href="#" class="dropdown-toggle">
        <i class="fas fa-user-plus"></i> Pendaftaran
    </a>
    <ul class="dropdown {{ request()->routeIs('superadmin.informasipendaftaran.*') || request()->routeIs('superadmin.pendaftaran.*') ? 'show' : '' }}">
        <li>
            <a href="{{ route('superadmin.informasipendaftaran.index') }}" class="{{ request()->routeIs('superadmin.informasipendaftaran.*') ? 'active' : '' }}">
                <i class="fas fa-info-circle"></i> Informasi Pendaftaran
            </a>
        </li>
        <li>
            <a href="{{ route('superadmin.pendaftaran.index') }}" class="{{ request()->routeIs('superadmin.pendaftaran.*') ? 'active' : '' }}">
                <i class="fas fa-list-ul"></i> Daftar Pendaftar
            </a>
        </li>
    </ul>
</li>

<!-- 7. Logout -->
<li>
    <a href="#" onclick="confirmLogout()">
        <i class="fas fa-sign-out-alt"></i> Logout
    </a>
</li>

        </ul>
    </nav>
</div>

<script>
    document.querySelectorAll('.dropdown-toggle').forEach(function (toggle) {
        toggle.addEventListener('click', function (e) {
            e.preventDefault();
            let dropdown = this.nextElementSibling;
            dropdown.classList.toggle('show');
        });
    });
</script>
