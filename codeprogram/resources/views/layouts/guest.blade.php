<!-- resources/views/layouts/guest.blade.php -->
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MIN Toba Samosir</title>

    <!-- Link to Bootstrap 5 CSS (for responsive design) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Link to Custom CSS File -->
    <link rel="stylesheet" href="{{ asset('css/layoutguest.css') }}">

    @yield('styles')
</head>

<body>
    <!-- Include the Navbar Component -->
    @include('components.guest')

    <!-- Hero Section -->
    <div class="position-relative"> <!-- offset for fixed navbar -->
        <img src="{{ asset('images/bg-school.jpg') }}" class="img-fluid w-100" style="height: 600px; margin-bottom: 30px;  object-fit: cover; filter: brightness(70%);" alt="Background Sekolah">
        <div class="position-absolute top-0 start-0 w-100 h-100 d-flex flex-column justify-content-center align-items-start px-4">
            <div class="d-flex align-items-center">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" width="100" class="me-3">
                <div>
                    <h1 class="text-white fw-bold mb-0" style="font-size: 3rem;">MIN TOBA SAMOSIR</h1>
                    <p class="text-white fst-italic mb-0">Madrasah, Tempat Belajar, Tempat Beramal</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content Section -->
    <main>
        @yield('content') <!-- This is where your page content will be injected -->
    </main>

    <!-- Footer Section -->
    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; 2025 MIN Toba Samosir. All rights reserved.</p>
    </footer>

    <!-- Bootstrap JS and Popper (for interactive components like dropdowns) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
