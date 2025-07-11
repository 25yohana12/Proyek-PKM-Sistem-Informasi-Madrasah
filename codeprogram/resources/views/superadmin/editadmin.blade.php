@extends('layouts.superadmin')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-2xl font-semibold mb-4">Edit Admin</h1>

        <form action="{{ route('admin.update', $admin->admin_id) }}" method="POST" enctype="multipart/form-data">
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
@endsection
