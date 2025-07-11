<!-- resources/views/layouts/guest.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MIN Toba Samosir</title>
    <link rel="stylesheet" href="{{ asset('css/layoutguest.css') }}">
</head>

<body>
    <!-- Include the Navbar Component -->
    @include('components.guest')

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <footer>
        <p>&copy; 2025 MIN Toba Samosir</p>
    </footer>
</body>

</html>
