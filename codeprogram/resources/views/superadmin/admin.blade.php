@extends('layouts.superadmin')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-semibold">Admin Pendaftaran Calon Siswa/i</h1>
            <a href="{{ route('superadmin.admin.create') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition duration-300">Tambah Admin</a>
        </div>

        <table class="min-w-full bg-white table-auto rounded-lg overflow-hidden shadow-md">
            <thead>
                <tr class="bg-gray-100">
                    <th class="py-2 px-4 border-b text-left">No.</th>
                    <th class="py-2 px-4 border-b text-left">Nama</th>
                    <th class="py-2 px-4 border-b text-left">NIP</th>
                    <th class="py-2 px-4 border-b text-left">Email</th>
                    <th class="py-2 px-4 border-b text-left">Kata Sandi</th>
                    <th class="py-2 px-4 border-b text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($admins as $admin)
                    <tr class="hover:bg-gray-50">
                        <td class="py-2 px-4 border-b">{{ $loop->iteration }}</td>
                        <td class="py-2 px-4 border-b">{{ $admin->namaAdmin }}</td>
                        <td class="py-2 px-4 border-b">{{ $admin->nip }}</td>
                        <td class="py-2 px-4 border-b">{{ $admin->email }}</td>
                        <td class="py-2 px-4 border-b">{{ $admin->sandi }}</td>
                        <td class="py-2 px-4 border-b">
                            <a href="{{ route('superadmin.admin.edit', $admin->admin_id) }}" class="text-blue-500 hover:text-blue-700 transition duration-300">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Tambahkan CSS di bawah -->
    <style>
        /* Styling untuk tabel */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f7fafc;
            font-weight: 600;
        }

        tr:hover {
            background-color: #f9f9f9;
        }

        .bg-green-500 {
            background-color: #38a169;
        }

        .bg-green-500:hover {
            background-color: #2f855a;
        }

        .text-blue-500:hover {
            color: #3182ce;
        }

        .bg-gray-100 {
            background-color: #f7fafc;
        }

        .text-left {
            text-align: left;
        }
        
        .rounded-lg {
            border-radius: 8px;
        }

        .shadow-md {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .hover\:bg-gray-50:hover {
            background-color: #f9fafb;
        }
    </style>
@endsection
