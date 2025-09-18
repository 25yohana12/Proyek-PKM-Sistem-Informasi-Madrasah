<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use \App\Models\Role;
use \App\Models\SuperAdmin;
use \App\Models\InformasiPendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    // Menampilkan semua data admin
    public function index()
    {
        $admins = Admin::with('role')->get(); // Mengambil semua admin beserta relasi role
        return view('superadmin.admin', compact('admins')); // Menyesuaikan dengan folder struktur
    }

    // Menampilkan detail admin berdasarkan ID
    public function show($id)
    {
        $admin = Admin::with('role')->findOrFail($id); // Mencari admin berdasarkan ID
        return view('superadmin.admin', compact('admin')); // Menyesuaikan dengan folder struktur
    }

public function create()
{
    // Mengambil semua data role dari tabel 'role'
    $roles = \App\Models\Role::all(); // Mengambil semua role

    // Role default (misalnya role dengan id = 2)
    $defaultRoleId = 2;

    // Mengirim data roles dan role default ke view
    return view('superadmin.createadmin', compact('roles', 'defaultRoleId'));
}

public function edit($id)
{
    // Mengambil data admin berdasarkan ID
    $admin = Admin::findOrFail($id);

    // Mengambil semua data role untuk dropdown
    $roles = Role::all();

    // Menampilkan halaman edit admin dengan data admin dan roles
    return view('superadmin.editadmin', compact('admin', 'roles'));
}

public function store(Request $request)
{
    $request->validate([
        'role_id' => 'required|exists:role,role_id',
        'namaAdmin' => 'required|string|max:255',
        'nip' => 'required|string|unique:admin,nip',
        'email' => 'required|string|email|unique:admin,email',
        'sandi' => 'required|string|min:6',
        'profil' => 'nullable|file|mimes:jpg,jpeg,png|max:2048', // validasi file
        'superAdmin_id' => 'nullable|exists:super_admins,id'
    ]);

    // Handle upload file jika ada
    $profilPath = null;
    if ($request->hasFile('profil')) {
        $profilPath = $request->file('profil')->store('admin_profiles', 'public');
    }

    // Buat admin baru
    $admin = Admin::create([
        'role_id' => $request->role_id,
        'namaAdmin' => $request->namaAdmin,
        'nip' => $request->nip,
        'email' => $request->email,
        'sandi' => $request->sandi, // otomatis di-hash oleh model
        'profil' => $profilPath,
        'superAdmin_id' => $request->superAdmin_id ?? null,
    ]);

    return redirect()->route('superadmin.admin.index')->with('success', 'Admin berhasil dibuat');
}

    // Menghapus data admin
    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);

        // Hapus gambar jika ada
        if ($admin->profil) {
            Storage::delete('public/' . $admin->profil);
        }

        $admin->delete();

        return redirect()->route('superadmin.admin.index'); // Redirect ke halaman admin setelah berhasil
    }
}

