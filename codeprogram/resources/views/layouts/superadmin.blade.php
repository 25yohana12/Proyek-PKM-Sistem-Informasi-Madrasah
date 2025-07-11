<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.3/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        /* Styling untuk Header */
        .header {
            background-color: #38A169;
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

        .btn {
            background-color: #38A169;
            color: white;
            padding: 8px 16px;
            border-radius: 8px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #2F855A;
        }

        /* Sidebar */
        .sidebar {
            background-color: #2D3748;
            color: white;
            min-height: 100vh;
            padding-top: 30px;
        }

        .sidebar h2 {
            color: #ffffff;
            font-size: 22px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }

        .sidebar nav ul {
            list-style: none;
            padding: 0;
        }

        .sidebar nav ul li {
            padding: 12px 0;
        }

        .sidebar nav ul li a {
            display: flex;
            align-items: center;
            color: white;
            font-size: 16px;
            padding: 12px 20px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .sidebar nav ul li a:hover {
            background-color: #4A5568;
        }

        .sidebar nav ul li a.active {
            background-color: #38A169;
        }

        .sidebar nav ul li a svg {
            margin-right: 10px;
        }

        .main-content {
            flex: 1;
            padding: 20px;
        }
    </style>
</head>
<body class="bg-gray-100">

    <div class="flex h-screen">
        <!-- Sidebar -->
        @include('components.superadmin')

        <!-- Main Content -->
        <div class="main-content flex-1 p-6">
            @yield('content')
        </div>
    </div>

</body>
</html>
