<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PrestasiController extends Controller
{
    /**
     * Menampilkan daftar prestasi.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prestasis = Prestasi::all(); // Menampilkan semua prestasi
        return view('superadmin.prestasi', compact('prestasis'));
    }

    /**
     * Menampilkan form untuk menambah prestasi.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('superadmin.createprestasi');
    }

    /**
     * Menyimpan prestasi baru ke database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'penghargaan' => 'required|string|max:255',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validasi gambar
        ]);

        // Simpan gambar
        $gambarPaths = [];
        if ($request->hasFile('gambar')) {
            foreach ($request->file('gambar') as $gambar) {
                $gambarPaths[] = $gambar->store('prestasi_images', 'public');
            }
        }

        // Menyimpan prestasi
        Prestasi::create([
            'superAdmin_id' => 1, // default superAdmin_id
            'nama' => $request->nama,
            'penghargaan' => $request->penghargaan,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'gambar' => json_encode($gambarPaths), // Menyimpan path gambar sebagai JSON
        ]);

        return redirect()->route('prestasi.index')->with('success', 'Prestasi berhasil disimpan!');
    }

    /**
     * Menampilkan form untuk mengedit prestasi.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $prestasi = Prestasi::findOrFail($id);
        return view('superadmin.editprestasi', compact('prestasi'));
    }

    /**
     * Memperbarui data prestasi.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'penghargaan' => 'required|string|max:255',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validasi gambar
        ]);

        $prestasi = Prestasi::findOrFail($id);

        // Simpan gambar baru
        $gambarPaths = json_decode($prestasi->gambar, true) ?? [];
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama
            foreach ($gambarPaths as $oldImage) {
                Storage::disk('public')->delete($oldImage);
            }
            // Simpan gambar baru
            foreach ($request->file('gambar') as $gambar) {
                $gambarPaths[] = $gambar->store('prestasi_images', 'public');
            }
        }

        // Update prestasi
        $prestasi->update([
            'nama' => $request->nama,
            'penghargaan' => $request->penghargaan,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'gambar' => json_encode($gambarPaths), // Update gambar
        ]);

        return redirect()->route('prestasi.index')->with('success', 'Prestasi berhasil diperbarui!');
    }

    /**
     * Menghapus prestasi dari database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prestasi = Prestasi::findOrFail($id);

        // Hapus gambar terkait
        $gambarPaths = json_decode($prestasi->gambar, true);
        foreach ($gambarPaths as $image) {
            Storage::disk('public')->delete($image);
        }

        $prestasi->delete();

        return redirect()->route('prestasi.index')->with('success', 'Prestasi berhasil dihapus!');
    }

    public function show($id)
{
    // Mengambil data prestasi berdasarkan ID
    $prestasi = Prestasi::findOrFail($id);
    
    // Mengirim data ke view
    return view('superadmin.showprestasi', compact('prestasi'));
}

}
