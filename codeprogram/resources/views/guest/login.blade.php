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

        <div class="characters">
            <img src="/images/boy.png" alt="Boy">
            <img src="/images/girl.png" alt="Girl">
        </div>
    </div>
</body>
</html>
