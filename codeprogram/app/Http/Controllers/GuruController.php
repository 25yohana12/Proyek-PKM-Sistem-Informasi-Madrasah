<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\SuperAdmin;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    // Menampilkan semua data guru
public function index()
{
    $gurus = Guru::paginate(10);  // Ambil 10 data per halaman
    return view('superadmin.guru', compact('gurus'));
}

    // Menampilkan data guru berdasarkan ID
    public function show($id)
    {
        $guru = Guru::findOrFail($id);
        return response()->json($guru);
    }

    // Menampilkan form untuk menambah data guru
    public function create()
    {
        $superAdmins = SuperAdmin::all(); // Ambil semua data super admin
        return view('superadmin.createguru', compact('superAdmins'));
    }

    // Menyimpan data guru
public function store(Request $request)
{
    // Validasi input dari form
    $request->validate([
        'namaGuru' => 'required|string|max:255',
        'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'nip' => 'required|string|max:255|unique:guru',
        'posisi' => 'required|string|max:255',
        'deskripsi' => 'required|string',
    ]);

    // Menyimpan file gambar jika ada
    if ($request->hasFile('gambar')) {
        $imageName = time() . '.' . $request->gambar->extension();
        $request->gambar->move(public_path('storage'), $imageName);
    } else {
        $imageName = null;
    }

    // Menyimpan data guru ke database dengan superAdmin_id yang ditentukan (secara default sudah 1)
    Guru::create([
        'namaGuru' => $request->namaGuru,
        'gambar' => $imageName,
        'nip' => $request->nip,
        'posisi' => $request->posisi,
        'deskripsi' => $request->deskripsi,
    ]);

    return redirect()->route('data.guru')->with('success', 'Data guru berhasil ditambahkan!');
}

    // Menampilkan form untuk mengedit data guru
    public function edit($id)
    {
        $guru = Guru::findOrFail($id);
        return view('superadmin.editguru', compact('guru'));
    }

    // Mengupdate data guru
public function update(Request $request, $guru_id)
{
    // Validasi input dari form
    $request->validate([
        'namaGuru' => 'required|string|max:255',
        'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'nip' => 'required|string|max:255|unique:guru,nip,' . $guru_id . ',guru_id', // Pastikan memakai guru_id dan bukan id
        'posisi' => 'required|string|max:255',
        'deskripsi' => 'required|string',
    ]);

    // Menemukan data guru berdasarkan guru_id
    $guru = Guru::findOrFail($guru_id);

    // Menyimpan gambar baru jika ada perubahan gambar
    if ($request->hasFile('gambar')) {
        // Hapus gambar lama jika ada
        if ($guru->gambar && file_exists(public_path('storage/' . $guru->gambar))) {
            unlink(public_path('storage/' . $guru->gambar));
        }

        // Menyimpan gambar baru
        $imageName = time() . '.' . $request->gambar->extension();
        $request->gambar->move(public_path('storage'), $imageName);
    } else {
        // Jika tidak ada perubahan gambar, gunakan gambar lama
        $imageName = $guru->gambar;
    }

    // Update data guru di database
    $guru->update([
        'namaGuru' => $request->namaGuru,
        'gambar' => $imageName,
        'nip' => $request->nip,
        'posisi' => $request->posisi,
        'deskripsi' => $request->deskripsi,
    ]);

    return redirect()->route('data.guru')->with('success', 'Data guru berhasil diperbarui!');
}

    // Menghapus data guru berdasarkan ID
    public function destroy($id)
    {
        $guru = Guru::findOrFail($id);
        $guru->delete();
        return redirect()->route('data.guru')->with('success', 'Data guru berhasil dihapus!');
    }

        public function guest()
    {
        // Ambil data guru dari database
        $gurus = Guru::all();

        // Return view dengan data guru
        return view('guest.guru', compact('gurus'));
    }
}
