@extends('layouts.superadmin')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-semibold">Admin Pendaftaran Calon Siswa/i</h1>
            <a href="{{ route('admin.create') }}" class="btn">Tambah Admin</a>
        </div>

        <table class="min-w-full bg-white table-auto">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">No.</th>
                    <th class="py-2 px-4 border-b">Nama</th>
                    <th class="py-2 px-4 border-b">NIP</th>
                    <th class="py-2 px-4 border-b">Email</th>
                    <th class="py-2 px-4 border-b">Kata Sandi</th>
                    <th class="py-2 px-4 border-b">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($admins as $admin)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $loop->iteration }}</td>
                        <td class="py-2 px-4 border-b">{{ $admin->namaAdmin }}</td>
                        <td class="py-2 px-4 border-b">{{ $admin->nip }}</td>
                        <td class="py-2 px-4 border-b">{{ $admin->email }}</td>
                        <td class="py-2 px-4 border-b">{{ $admin->sandi }}</td>
                        <td class="py-2 px-4 border-b">
                            <a href="{{ route('admin.edit', $admin->admin_id) }}" class="text-blue-500">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
