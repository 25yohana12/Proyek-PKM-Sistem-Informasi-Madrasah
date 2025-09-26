{{-- resources/views/siswa/registrasi_awal.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Registrasi Awal - MIN TOBA SAMOSIR</title>
    <style>
        body {
            margin: 0;
            background: url('/images/bg-school.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: Arial, sans-serif;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.9);
            max-width: 400px;
            margin: 50px auto;
            padding: 30px;
            border-radius: 10px;
            position: relative;
        }

        .logo {
            display: block;
            margin: 0 auto 15px;
            width: 80px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            width: 100%;
            background-color: black;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .login-link {
            text-align: center;
            margin-top: 15px;
        }

        .characters {
            position: absolute;
            bottom: -150px;
            right: -350px;
            display: flex;
            gap: 10px;
        }

        .characters img {
            width: 180px;
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="/images/logo.png" alt="Logo" class="logo">
        <h2>MIN TOBA SAMOSIR</h2>

        @if ($errors->any())
            <div style="color: red; margin-bottom: 10px;">
                <ul style="padding-left: 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('siswa.store_awal') }}" method="POST">
            @csrf
            <input type="text" name="namaPendaftar" placeholder="Nama" value="{{ old('namaPendaftar') }}" required>
            <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
            <input type="password" name="sandi" placeholder="Password" required>
            <input type="password" name="sandi_confirmation" placeholder="Konfirmasi Password" required>

            <button type="submit">REGISTER</button>

            <button type="button" onclick="window.location.href='{{ url('/login') }}'" style="background:#28a745; color:white; margin-top:10px; width:100%; border:none; border-radius:5px; padding:12px; cursor:pointer;">
                Kembali
            </button>

            <div class="login-link">
                Sudah Punya Akun? <a href="/login">Login</a>
            </div>
        </form>

        <div class="characters">
            <img src="/images/boy.png" alt="Boy">
            <img src="/images/girl.png" alt="Girl">
        </div>
    </div>
</body>
</html>
