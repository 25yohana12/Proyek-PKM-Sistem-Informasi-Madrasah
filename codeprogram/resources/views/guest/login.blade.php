<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login - MIN TOBA SAMOSIR</title>
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
            bottom: -100px;
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
            margin-top: 10px;
        }

        .google-btn {
            width: 100%;
            background-color: #090909ff;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }

        .links {
            text-align: center;
            margin-top: 15px;
            font-size: 14px;
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

        .error {
            color: red;
            font-size: 13px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="/images/logo.png" alt="Logo" class="logo">
        <h2>MIN TOBA SAMOSIR</h2>

        @if(session('success'))
            <div style="color: green">{{ session('success') }}</div>
        @endif

        @if($errors->any())
            <div class="error">
                <ul style="padding-left: 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <input type="email" name="email" placeholder="Email" required value="{{ old('email') }}">
            <input type="password" name="sandi" placeholder="Password" required>

            <div class="links">
                Belum punya Akun? <a href="/registrasi">Registrasi</a> |
                <a href="/">Beranda</a>
            </div>

            <button type="submit">MASUK</button>
            <button type="button" onclick="window.location.href='{{ url('/') }}'" style="background:#28a745; margin-top:10px;">
                Kembali
            </button>
        </form>

        <!-- Tombol Login dengan Google -->
<button type="button" onclick="window.location='{{ route('google.login') }}'" class="google-btn">
    <span style="display:flex; align-items:center; justify-content:center; gap:8px;">
        <!-- Logo Google -->
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 150 150" width="20" height="20">
            <path fill="#4280EF" d="M120,76.1c0-3.1-0.3-6.3-0.8-9.3H75.9v17.7h24.8c-1,5.7-4.3,10.7-9.2,13.9l14.8,11.5
                C115,101.8,120,90,120,76.1L120,76.1z"/>
            <path fill="#34A353" d="M75.9,120.9c12.4,0,22.8-4.1,30.4-11.1L91.5,98.4c-4.1,2.8-9.4,4.4-15.6,4.4c-12,0-22.1-8.1-25.8-18.9
                L34.9,95.6C42.7,111.1,58.5,120.9,75.9,120.9z"/>
            <path fill="#FBBC05" d="M50.1,83.8c-1.9-5.7-1.9-11.9,0-17.6L34.9,54.4c-6.5,13-6.5,28.3,0,41.2L50.1,83.8z"/>
            <path fill="#EA4335" d="M75.9,47.3c6.5-0.1,12.9,2.4,17.6,6.9L106.6,41C98.3,33.2,87.3,29,75.9,29.1c-17.4,0-33.2,9.8-41,25.3
                l15.2,11.8C53.8,55.3,63.9,47.3,75.9,47.3z"/>
        </svg>
        Login dengan Google
    </span>
</button>


        <div class="characters">
            <img src="/images/boy.png" alt="Boy">
            <img src="/images/girl.png" alt="Girl">
        </div>
    </div>
</body>
</html>
