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
    @include('components.siswa')

    <!-- Main Content Section -->
    <main>
        @yield('content') <!-- This is where your page content will be injected -->
    </main>

  {{-- FOOTER HIJAU SESUAI DESAIN --}}
  <footer style="background-color:#a8dfb0; font-family:'Arial',sans-serif;">
    <div class="container py-4 text-start">
        <div class="row align-items-center" style="color: #000">
            <!-- Logo + Tagline -->
            <div class="col-md-6 d-flex align-items-center mb-3 mb-md-0">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" width="150" class="me-3">
            <div>
                <h5 class="fw-bold mb-1" style="color:#194d2b;">MIN TOBA SAMOSIR</h5>
                <p class="mb-0">Madrasah, Tempat Belajar,<br>Tempat Beramal</p>
            </div>
            </div>

            <!-- Kontak -->
            <div class="col-md-6 text-start">
            <p class="mb-1"><i class="bi bi-geo-alt-fill me-2"></i>Jl. siswa narumonda IV, Parparean II, Kec. Porsea, Toba, Sumatera Utara</p>
            <p class="mb-1"><i class="bi bi-telephone-fill me-2"></i>0812345678</p>
            <p class="mb-0"><i class="bi bi-instagram me-2"></i>@mintobasamosir</p>
            </div>
        </div>
    </div>
  </footer>
  <footer style="background-color:#000; widht:1000px; font-family:'Arial',sans-serif;">
    <div class="text-center py-2" style="background:#000; color:#fff; font-size:14px;">
      © 2025 Madrasah. All Rights Reserved. | Website by Institut Teknologi Del
    </div>
  </footer>

    <!-- Bootstrap JS and Popper (for interactive components like dropdowns) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
