@extends('layouts.superadmin')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-2xl font-semibold mb-4">Tambah Admin</h1>

        <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="namaAdmin" class="block text-sm font-medium text-gray-700">Nama Admin</label>
                <input type="text" id="namaAdmin" name="namaAdmin" class="mt-1 block w-full p-2 border border-gray-300 rounded" required>
            </div>

            <div class="mb-4">
                <label for="nip" class="block text-sm font-medium text-gray-700">NIP</label>
                <input type="text" id="nip" name="nip" class="mt-1 block w-full p-2 border border-gray-300 rounded" required>
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" class="mt-1 block w-full p-2 border border-gray-300 rounded" required>
            </div>

            <div class="mb-4">
                <label for="sandi" class="block text-sm font-medium text-gray-700">Kata Sandi</label>
                <input type="password" id="sandi" name="sandi" class="mt-1 block w-full p-2 border border-gray-300 rounded" required>
            </div>

            <div class="mb-4">
                <label for="profil" class="block text-sm font-medium text-gray-700">Profil Admin</label>
                <input type="file" id="profil" name="profil" class="mt-1 block w-full p-2 border border-gray-300 rounded" required>
            </div>

            <!-- Hidden input untuk role_id, default ke 2 -->
            <input type="hidden" name="role_id" value="2"> <!-- Set role_id secara default ke 2 -->

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Simpan</button>
        </form>

        @if($errors->any())
            <div class="bg-red-500 text-white p-2 mb-4 rounded">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    </div>

    <!-- Tambahkan CSS di bawah kode Blade -->
    <style>
        /* Style untuk seluruh form */
        form {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 800px;
            margin: 20px auto;
        }

        /* Styling untuk judul */
        h1 {
            font-size: 24px;
            font-weight: 600;
            color: #333;
            margin-bottom: 20px;
        }

        /* Styling untuk setiap input field */
        .input-field {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
        }

        /* Styling untuk label input field */
        label {
            font-size: 14px;
            color: #555;
            margin-bottom: 8px;
            display: block;
        }

        /* Button submit */
        button {
            background-color: #38a169; /* green */
            color: #fff;
            padding: 10px 20px;
            border-radius: 6px;
            border: none;
            cursor: pointer;
            font-size: 14px;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #2f855a;
        }

        /* Styling untuk input file */
        input[type="file"] {
            padding: 6px;
            margin-top: 5px;
        }

        /* Tambahan untuk input hidden */
        input[type="hidden"] {
            display: none;
        }

        /* Styling untuk row button tambah admin */
        .tambah-admin-btn {
            background-color: #48bb78;
            color: #fff;
            padding: 8px 16px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 14px;
            display: inline-block;
            margin-bottom: 20px;
        }

        .tambah-admin-btn:hover {
            background-color: #38a169;
        }

        /* Styling untuk pesan error */
        .bg-red-500 {
            background-color: #f56565;
            color: white;
            padding: 15px;
            border-radius: 5px;
            margin-top: 10px;
        }

        ul {
            list-style: none;
            padding-left: 0;
        }

        li {
            font-size: 14px;
            margin-bottom: 5px;
        }
    </style>
@endsection
