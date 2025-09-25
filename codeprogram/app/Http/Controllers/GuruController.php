<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\SuperAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GuruController extends Controller
{
    // Menampilkan semua data guru
public function index()
{
    $gurus = Guru::whereNotNull('nip')   // hanya yang nip tidak NULL
                 ->where('nip', '!=', '') // dan bukan string kosong
                 ->paginate(10);

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
    $request->validate([
        'namaGuru' => 'required|string|max:255',
        'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'nip' => 'required|string|max:255|unique:guru',
        'posisi' => 'required|string|max:255',
        'deskripsi' => 'required|string',
    ]);

    // Simpan gambar ke storage/app/public/guru
    if ($request->hasFile('gambar')) {
        $imageName = $request->file('gambar')->store('guru', 'public');
    } else {
        $imageName = null;
    }

    Guru::create([
        'namaGuru' => $request->namaGuru,
        'gambar' => $imageName,
        'nip' => $request->nip,
        'posisi' => $request->posisi,
        'deskripsi' => $request->deskripsi,
    ]);

    return redirect()->route('superadmin.guru.index')->with('success', 'Data guru berhasil ditambahkan!');
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
    $request->validate([
        'namaGuru' => 'required|string|max:255',
        'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'nip' => 'required|string|max:255|unique:guru,nip,' . $guru_id . ',guru_id',
        'posisi' => 'required|string|max:255',
        'deskripsi' => 'required|string',
    ]);

    $guru = Guru::findOrFail($guru_id);

    if ($request->hasFile('gambar')) {
        // Hapus gambar lama jika ada
        if ($guru->gambar && Storage::disk('public')->exists($guru->gambar)) {
            Storage::disk('public')->delete($guru->gambar);
        }
        $imageName = $request->file('gambar')->store('guru', 'public');
    } else {
        $imageName = $guru->gambar;
    }

    $guru->update([
        'namaGuru' => $request->namaGuru,
        'gambar' => $imageName,
        'nip' => $request->nip,
        'posisi' => $request->posisi,
        'deskripsi' => $request->deskripsi,
    ]);

    return redirect()->route('superadmin.guru.index')->with('success', 'Data guru berhasil diperbarui!');
}

    // Menghapus data guru berdasarkan ID
    public function destroy($id)
    {
        $guru = Guru::findOrFail($id);
        $guru->delete();
        return redirect()->route('superadmin.guru.index')->with('success', 'Data guru berhasil dihapus!');
    }

        public function guest()
    {
        // Ambil data guru dari database
        $gurus = Guru::all();

        // Return view dengan data guru
        return view('guest.guru', compact('gurus'));
    }

            public function siswa()
    {
        // Ambil data guru dari database
        $gurus = Guru::all();

        // Return view dengan data guru
        return view('siswa.guru', compact('gurus'));
    }
}
