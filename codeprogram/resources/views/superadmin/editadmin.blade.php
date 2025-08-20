@extends('layouts.superadmin')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-2xl font-semibold mb-4">Edit Admin</h1>

        <form action="{{ route('superadmin.admin.update', $admin->admin_id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="namaAdmin" class="block text-sm font-medium text-gray-700">Nama Admin</label>
                <input type="text" id="namaAdmin" name="namaAdmin" value="{{ old('namaAdmin', $admin->namaAdmin) }}" class="mt-1 block w-full p-2 border border-gray-300 rounded" required>
            </div>

            <div class="mb-4">
                <label for="nip" class="block text-sm font-medium text-gray-700">NIP</label>
                <input type="text" id="nip" name="nip" value="{{ old('nip', $admin->nip) }}" class="mt-1 block w-full p-2 border border-gray-300 rounded" required>
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email', $admin->email) }}" class="mt-1 block w-full p-2 border border-gray-300 rounded" required>
            </div>

            <div class="mb-4">
                <label for="profil" class="block text-sm font-medium text-gray-700">Profil Admin</label>
                <input type="file" id="profil" name="profil" class="mt-1 block w-full p-2 border border-gray-300 rounded">
                @if ($admin->profil)
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $admin->profil) }}" alt="Profil Admin" class="w-32 h-32 object-cover rounded">
                    </div>
                @endif
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Update</button>
        </form>
    </div>

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
