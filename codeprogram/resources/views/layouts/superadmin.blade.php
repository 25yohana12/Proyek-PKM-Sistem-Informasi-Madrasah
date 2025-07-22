<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Base Styles -->
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f7fafc;
        }

        .admin-layout {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar Base Styles */
        .sidebar {
            width: 280px;
            background-color: #6D8D79;
            color: white;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
            box-shadow: 4px 0 15px rgba(0, 0, 0, 0.1);
            z-index: 100;
            padding-top: 30px;
        }

        .sidebar h2 {
            color: #ffffff;
            font-size: 1.375rem;
            font-weight: bold;
            text-align: center;
            margin-bottom: 30px;
            padding: 0 20px;
        }

        .sidebar nav ul {
            list-style: none;
            padding: 0;
        }

        .sidebar nav ul li {
            margin-bottom: 0.25rem;
        }

        /* Main menu items (Dashboard, Akun Admin, dll) */
        .sidebar nav ul li a {
            display: flex;
            align-items: center;
            color: #000000ff; /* Warna hitam untuk tulisan default */
            font-size: 16px;
            padding: 12px 20px;
            text-decoration: none;
            transition: all 0.3s ease;
            border-left: 4px solid transparent;
            position: relative;
        }

        .sidebar nav ul li a:hover {
            background-color: rgba(255, 255, 255, 0.1);
            color: #000000ff; /* Tetap hitam saat hover */
        }

        .sidebar nav ul li a.active {
            border-left-color: #ffffff;
            background-color: rgba(0, 0, 0, 0.1);
            color: #ffffff; /* Tulisan putih untuk menu aktif */
            font-weight: 600;
        }

        /* Sub menu items (dengan indent) */
        .sidebar nav ul li a.sub-menu {
            padding-left: 40px;
            font-size: 15px;
            color: #000000ff; /* Warna hitam agak abu untuk sub-menu */
        }

        .sidebar nav ul li a.sub-menu:hover {
            background-color: rgba(255, 255, 255, 0.08);
            color: #4a5568; /* Tetap hitam saat hover */
        }

        .sidebar nav ul li a.sub-menu.active {
            border-left-color: #ffffff;
            background-color: rgba(0, 0, 0, 0.1);
            color: #ffffff; 
            font-weight: 600;
        }

        .sidebar nav ul li a i {
            margin-right: 10px;
            width: 20px;
            font-size: 0.9rem;
        }

        /* Main Content */
        .main-content {
            flex: 1;
            margin-left: 280px;
            min-height: 100vh;
            background: transparent;
            padding: 20px;
        }

        /* Override any conflicting styles */
        .main-content .page-container {
            padding: 0;
            margin: 0;
        }

        /* Button Styles */
        .btn {
            background-color: #6D8D79;
            color: white;
            padding: 8px 16px;
            border-radius: 8px;
            text-decoration: none;
            transition: background-color 0.3s ease;
            border: none;
            cursor: pointer;
            font-family: 'Poppins', sans-serif;
        }

        .btn:hover {
            background-color: #5a7466;
        }

        /* Header Styles (if needed) */
        .header {
            background-color: #6D8D79;
            color: white;
            padding: 15px 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header h1 {
            font-size: 24px;
            font-weight: bold;
        }

        /* Mobile Responsive */
        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                position: fixed;
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }

            .mobile-menu-btn {
                display: block;
                position: fixed;
                top: 1rem;
                left: 1rem;
                z-index: 200;
                background: #6D8D79;
                color: white;
                border: none;
                padding: 0.75rem;
                border-radius: 0.5rem;
                cursor: pointer;
            }
        }

        .mobile-menu-btn {
            display: none;
        }

        /* Scrollbar Styling */
        .sidebar::-webkit-scrollbar {
            width: 6px;
        }

        .sidebar::-webkit-scrollbar-track {
            background: #6D8D79;
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: #5a7466;
            border-radius: 3px;
        }

        .sidebar::-webkit-scrollbar-thumb:hover {
            background: #4a6356;
        }
    </style>
    
    <!-- Page Specific Styles -->
    @yield('styles')
</head>
<body class="bg-gray-100">
    <!-- Mobile Menu Button -->
    <button class="mobile-menu-btn" onclick="toggleSidebar()">
        <i class="fas fa-bars"></i>
    </button>

    <div class="admin-layout">
        <!-- Sidebar Component -->
        @include('components.superadmin')

        <!-- Main Content -->
        <div class="main-content">
            @yield('content')
        </div>
    </div>

    <!-- Scripts -->
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('active');
        }

        function confirmLogout() {
            if (confirm('Apakah Anda yakin ingin logout?')) {
                // Add logout logic here
                window.location.href = '/logout';
            }
        }

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('sidebar');
            const menuBtn = document.querySelector('.mobile-menu-btn');
            
            if (window.innerWidth <= 768 && 
                !sidebar.contains(event.target) && 
                !menuBtn.contains(event.target)) {
                sidebar.classList.remove('active');
            }
        });
    </script>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Page Specific Scripts -->
    @yield('scripts')
</body>
</html>