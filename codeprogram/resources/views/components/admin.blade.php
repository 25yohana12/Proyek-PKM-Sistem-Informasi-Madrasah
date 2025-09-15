<style>
    .sidebar {
        width: 250px;
        background: #fff;
        border-right: 1px solid #ddd;
        min-height: 100vh;
        padding: 15px;
    }

    .sidebar h2 {
        font-size: 18px;
        font-weight: 700;
        margin-bottom: 20px;
        color: #2c3e50;
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
        color: #333;
        text-decoration: none;
        border-radius: 6px;
        transition: all 0.2s ease;
    }

    .sidebar ul li a:hover {
        background: #f5f5f5;
        color: #007bff;
    }

    .sidebar ul li a.active {
        background: #e9f5ff;
        color: #007bff;
        font-weight: 600;
    }

    .dropdown-toggle::after {
        content: "\f107"; /* FontAwesome caret-down */
        font-family: "Font Awesome 5 Free";
        font-weight: 900;
        float: right;
        transition: transform 0.3s ease;
    }

    .dropdown.show + .dropdown-toggle::after {
        transform: rotate(-180deg);
    }

    .dropdown {
        display: none;
        padding-left: 15px;
        border-left: 2px solid #eee;
        margin-left: 5px;
    }

    .dropdown.show {
        display: block;
        animation: fadeIn 0.3s ease-in-out;
    }

    .dropdown li a {
        padding: 8px 15px;
        font-size: 14px;
        border-radius: 4px;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-5px); }
        to { opacity: 1; transform: translateY(0); }
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
                <a href="#" class="dropdown-toggle {{ request()->routeIs('admin.informasipendaftaran') || request()->routeIs('admin.pendaftaran') ? 'active' : '' }}">
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
