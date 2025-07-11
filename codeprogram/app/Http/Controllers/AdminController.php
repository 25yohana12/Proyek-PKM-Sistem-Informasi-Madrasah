<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use \App\Models\Role;
use \App\Models\SuperAdmin;
use Illuminate\Http\Request;
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

    // Menyimpan data admin baru
public function store(Request $request)
{
    // Validasi data lainnya
    $request->validate([
        'namaAdmin' => 'required|string|max:255',
        'nip' => 'required|string|max:50',
        'profil' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
        'email' => 'required|email|unique:admin,email',
        'sandi' => 'required|string|min:8',
    ]);

    // Menyimpan gambar di folder public/images dan mendapatkan path
    $profilPath = $request->file('profil')->store('images', 'public'); // Menyimpan gambar di public/images

    // Menyimpan data admin tanpa perlu menyebutkan superAdmin_id karena sudah ada nilai default 1
    Admin::create([
        'role_id' => 2,  // Default role_id = 2
        'namaAdmin' => $request->namaAdmin,
        'nip' => $request->nip,
        'profil' => $profilPath, // Menyimpan path gambar
        'email' => $request->email,
        'sandi' => bcrypt($request->sandi), // Enkripsi password
    ]);

    return redirect()->route('admin.index'); // Redirect setelah berhasil
}

    // Mengupdate data admin
public function update(Request $request, $id)
{
    $request->validate([
        'namaAdmin' => 'required|string|max:255',
        'nip' => 'required|string|max:50',
        'profil' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'email' => 'required|email|unique:admin,email,' . $id . ',admin_id', // Validasi email, kecuali untuk admin yang sedang diupdate
    ]);

    // Cari admin berdasarkan ID
    $admin = Admin::findOrFail($id);

    // Jika ada gambar profil yang diunggah
    if ($request->hasFile('profil')) {
        // Hapus gambar lama jika ada
        if ($admin->profil) {
            Storage::delete('public/' . $admin->profil);
        }

        // Simpan gambar baru dan dapatkan path
        $profilPath = $request->file('profil')->store('images', 'public');
        $admin->profil = $profilPath;
    }

    // Update data admin tanpa mengubah role_id dan kata sandi
    $admin->update([
        'namaAdmin' => $request->namaAdmin,
        'nip' => $request->nip,
        'email' => $request->email,
    ]);

    return redirect()->route('admin.index');
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

        return redirect()->route('admin.index'); // Redirect ke halaman admin setelah berhasil
    }
}

