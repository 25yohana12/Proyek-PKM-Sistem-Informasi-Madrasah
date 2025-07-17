<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
        /**
     * Tampilkan daftar seluruh data siswa (kelas).
     */
    public function index()
    {
        $siswa = Siswa::all();

        return view('superadmin.siswa', compact('siswa'));
    }

    /**
     * Tampilkan form untuk menambahkan data baru.
     */
    public function create()
    {
        return view('superadmin.createsiswa');
    }

    /**
     * Tampilkan form untuk mengedit data berdasarkan ID.
     */
    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        return view('superadmin.editsiswa', compact('siswa'));
    }

    /**
     * Hapus data siswa dari database.
     */
    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);

        // Hapus gambar dari storage jika ada
        if ($siswa->gambar && Storage::disk('public')->exists($siswa->gambar)) {
            Storage::disk('public')->delete($siswa->gambar);
        }

        $siswa->delete();

        return redirect()->route('siswa.index')->with('success', 'Data kelas berhasil dihapus.');
    }

    /**
     * Store a newly created Siswa in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'superAdmin_id' => 'nullable|exists:superAdmin,superAdmin_id',
        'jumlahMurid' => 'nullable|integer',
        'jumlahSiswa' => 'nullable|integer',
        'jumlahSiswi' => 'nullable|integer',
        'kelas' => 'nullable|string|max:255',
        'namaWali' => 'nullable|string|max:255',
        'murid' => 'nullable|integer',
        'siswa' => 'nullable|integer',
        'siswi' => 'nullable|integer',
        'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
    ]);

    $data = $request->all();

    if ($request->hasFile('gambar')) {
        $path = $request->file('gambar')->store('gambar_siswa', 'public');
        $data['gambar'] = $path;
    }

    Siswa::create($data);

    return redirect()->route('siswa.index')->with('success', 'Data kelas berhasil ditambahkan.');
}

    /**
     * Update the specified Siswa in storage.
     */
    public function update(Request $request, $id)
{
    $siswa = Siswa::findOrFail($id);

    $request->validate([
        'superAdmin_id' => 'nullable|exists:superAdmin,superAdmin_id',
        'jumlahMurid' => 'nullable|integer',
        'jumlahSiswa' => 'nullable|integer',
        'jumlahSiswi' => 'nullable|integer',
        'kelas' => 'nullable|string|max:255',
        'namaWali' => 'nullable|string|max:255',
        'murid' => 'nullable|integer',
        'siswa' => 'nullable|integer',
        'siswi' => 'nullable|integer',
        'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
    ]);

    $data = $request->all();

    if ($request->hasFile('gambar')) {
        if ($siswa->gambar && Storage::disk('public')->exists($siswa->gambar)) {
            Storage::disk('public')->delete($siswa->gambar);
        }

        $path = $request->file('gambar')->store('gambar_siswa', 'public');
        $data['gambar'] = $path;
    }

    $siswa->update($data);

    return redirect()->route('siswa.index')->with('success', 'Data kelas berhasil diperbarui.');
}
}
