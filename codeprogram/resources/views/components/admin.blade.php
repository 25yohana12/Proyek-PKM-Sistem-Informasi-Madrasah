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

    .dropdown-toggle::after {
        content: "";
    }

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
                <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fas fa-home"></i> Dashboard
                </a>
            </li>

            <!-- 2. Akun Admin -->
            <li>
                <a href="{{ route('admin.admin') }}" class="{{ request()->routeIs('admin.admin') ? 'active' : '' }}">
                    <i class="fas fa-users"></i> Akun Admin
                </a>
            </li>

            <!-- 3. Civitas -->
            <li>
                <a href="#" class="dropdown-toggle">
                    <i class="fas fa-graduation-cap"></i> Civitas
                </a>
                <ul class="dropdown {{ request()->routeIs('admin.guru') || request()->routeIs('admin.siswa') || request()->routeIs('admin.strukturorganisasi') ? 'show' : '' }}">
                    <li>
                        <a href="{{ route('admin.guru') }}" class="{{ request()->routeIs('admin.guru') ? 'active' : '' }}">
                            <i class="fas fa-chalkboard-teacher"></i> Data Guru
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.siswa') }}" class="{{ request()->routeIs('admin.siswa') ? 'active' : '' }}">
                            <i class="fas fa-door-open"></i> Data Siswa
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.strukturorganisasi') }}" class="{{ request()->routeIs('admin.strukturorganisasi') ? 'active' : '' }}">
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
                <ul class="dropdown {{ request()->routeIs('admin.acara') || request()->routeIs('admin.prestasi') ? 'show' : '' }}">
                    <li>
                        <a href="{{ route('admin.acara') }}" class="{{ request()->routeIs('admin.acara') ? 'active' : '' }}">
                            <i class="fas fa-calendar-alt"></i> Perayaan
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.prestasi') }}" class="{{ request()->routeIs('admin.prestasi') ? 'active' : '' }}">
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
                <ul class="dropdown {{ request()->routeIs('admin.ekstrakulikuler') || request()->routeIs('admin.fasilitas') || request()->routeIs('admin.sekolah') ? 'show' : '' }}">
                    <li>
                        <a href="{{ route('admin.sekolah') }}" class="{{ request()->routeIs('admin.sekolah') ? 'active' : '' }}">
                            <i class="fas fa-school"></i> Sekolah
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.ekstrakulikuler') }}" class="{{ request()->routeIs('admin.ekstrakulikuler') ? 'active' : '' }}">
                            <i class="fas fa-running"></i> Ekstrakurikuler
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.fasilitas') }}" class="{{ request()->routeIs('admin.fasilitas') ? 'active' : '' }}">
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
                <ul class="dropdown {{ request()->routeIs('admin.informasipendaftaran') || request()->routeIs('admin.pendaftaran') ? 'show' : '' }}">
                    <li>
                        <a href="{{ route('admin.informasipendaftaran') }}" class="{{ request()->routeIs('admin.informasipendaftaran') ? 'active' : '' }}">
                            <i class="fas fa-info-circle"></i> Informasi Pendaftaran
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.pendaftaran') }}" class="{{ request()->routeIs('admin.pendaftaran') ? 'active' : '' }}">
                            <i class="fas fa-list-ul"></i> Daftar Pendaftar
                        </a>
                    </li>
                </ul>
            </li>

            <!-- 7. Logout -->
            <li>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
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
