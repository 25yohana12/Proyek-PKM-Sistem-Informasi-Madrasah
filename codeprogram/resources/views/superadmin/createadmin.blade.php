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
    </div>
@endsection
