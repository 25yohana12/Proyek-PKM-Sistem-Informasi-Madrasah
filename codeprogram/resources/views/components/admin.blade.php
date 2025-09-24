<style>
    .sidebar {
        width: 250px;
        background: linear-gradient(135deg, #6D8D79 0%, #a8dfb0 100%);
        border-right: 1px solid #5a7466;
        min-height: 100vh;
        padding: 15px;
    }

    .sidebar h2 {
        color: #fff;
        font-weight: bold;
        margin-bottom: 30px;
        letter-spacing: 1px;
        text-shadow: 0 2px 8px rgba(0,0,0,0.08);
    }

    .sidebar ul {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    .sidebar ul li {
        margin-bottom: 5px;
    }

    .sidebar ul li a {
        display: block;
        padding: 10px 15px;
        color: #fff;
        text-decoration: none;
        border-radius: 6px;
        transition: all 0.2s;
        font-weight: 500;
    }

    .sidebar ul li a:hover {
        background: #a8dfb0;
        color: #1b3c2e;
    }

    .sidebar ul li a.active {
        background: #fff;
        color: #388e3c;
        font-weight: 700;
        box-shadow: 0 2px 8px rgba(0,0,0,0.04);
    }

    .dropdown-toggle::after {
        content: "\f107";
        font-family: "Font Awesome 5 Free";
        font-weight: 900;
        float: right;
        transition: transform 0.3s;
    }

    .dropdown.show + .dropdown-toggle::after {
        transform: rotate(-180deg);
    }

    .dropdown {
        display: none;
        padding-left: 15px;
        border-left: 2px solid #a8dfb0;
        margin-left: 5px;
    }

    .dropdown.show {
        display: block;
        animation: fadeIn 0.3s;
    }

    .dropdown li a {
        padding: 8px 15px;
        font-size: 14px;
        border-radius: 4px;
        color: #fff;
        background: none;
    }

    .dropdown li a:hover, .dropdown li a.active {
        background: #fff;
        color: #388e3c;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-5px);}
        to { opacity: 1; transform: translateY(0);}
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

            <!-- 6. Pendaftaran -->
            <li>
                <a href="#" class="dropdown-toggle {{ request()->routeIs('admin.informasipendaftaran') || request()->routeIs('admin.pendaftaran') || request()->routeIs('admin.datapendaftar') ? 'active' : '' }}">
                    <i class="fas fa-user-plus"></i> Pendaftaran
                </a>
                <ul class="dropdown {{ request()->routeIs('admin.informasipendaftaran') || request()->routeIs('admin.pendaftaran') || request()->routeIs('admin.datapendaftar') ? 'show' : '' }}">
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
                    <!-- <li>
                        <a href="{{ route('admin.datapendaftar') }}" class="{{ request()->routeIs('admin.datapendaftar') ? 'active' : '' }}">
                            <i class="fas fa-table"></i> Data Pendaftar
                        </a>
                    </li> -->
                    <li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:inline;">
                            @csrf
                            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </form>
                    </li>
                </ul>
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