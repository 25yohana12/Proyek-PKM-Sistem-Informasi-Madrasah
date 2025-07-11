<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    /**
     * Menampilkan semua galeri.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galeris = Galeri::all();
        return view('superadmin.galeri', compact('galeris'));
    }

    public function create()
    {
        return view('superadmin.creategaleri');  // Mengembalikan tampilan form create
    }

    /**
     * Menyimpan galeri baru (termasuk banyak gambar).
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'required|array',  // Pastikan gambar yang diterima adalah array
            'gambar.*' => 'mimes:jpeg,jpg,png,gif|max:2048', // Validasi format gambar dan ukuran
        ]);

        // Menyimpan data galeri baru
        $galeri = new Galeri();
        $galeri->superAdmin_id = 1; // Set default superAdmin_id ke 1
        $galeri->judul = $request->judul;
        $galeri->deskripsi = $request->deskripsi;

        // Menyimpan banyak gambar
        $images = [];
        foreach ($request->file('gambar') as $image) {
            // Menyimpan gambar ke storage dan mendapatkan path-nya
            $path = $image->store('galeri_images', 'public');
            $images[] = $path;
        }

        // Menyimpan path gambar dalam format JSON
        $galeri->gambar = json_encode($images);

        $galeri->save();

        return redirect()->route('galeri.index')->with('success', 'Galeri berhasil disimpan!');
    }

    /**
     * Menampilkan form untuk mengedit galeri yang sudah ada.
     *
     * @param \App\Models\Galeri $galeri
     * @return \Illuminate\Http\Response
     */
    public function edit(Galeri $galeri)
    {
        return view('superadmin.editgaleri', compact('galeri'));
    }

    /**
     * Memperbarui galeri yang sudah ada.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Galeri $galeri
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Galeri $galeri)
    {
        // Validasi input
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|array',  // Gambar bersifat opsional saat update
            'gambar.*' => 'mimes:jpeg,jpg,png,gif|max:2048', // Validasi format gambar dan ukuran
        ]);

        // Memperbarui galeri
        $galeri->judul = $request->judul;
        $galeri->deskripsi = $request->deskripsi;

        // Menambahkan gambar baru jika ada
        if ($request->hasFile('gambar')) {
            $images = json_decode($galeri->gambar, true); // Mengambil gambar lama

            // Menyimpan gambar baru
            foreach ($request->file('gambar') as $image) {
                // Menyimpan gambar baru ke storage dan mendapatkan path-nya
                $path = $image->store('galeri_images', 'public');
                $images[] = $path; // Menambahkan gambar baru ke array gambar
            }

            // Menyimpan gambar yang sudah diperbarui dalam format JSON
            $galeri->gambar = json_encode($images);
        }

        $galeri->save();

        return redirect()->route('galeri.index')->with('success', 'Galeri berhasil diperbarui!');
    }

    /**
     * Menampilkan detail galeri tertentu.
     *
     * @param \App\Models\Galeri $galeri
     * @return \Illuminate\Http\Response
     */
    public function show(Galeri $galeri)
    {
        return view('superadmin.showgaleri', compact('galeri'));
    }

    /**
     * Menghapus galeri tertentu.
     *
     * @param \App\Models\Galeri $galeri
     * @return \Illuminate\Http\Response
     */
    public function destroy(Galeri $galeri)
    {
        // Hapus gambar-gambar terkait dari storage
        $images = json_decode($galeri->gambar, true);
        foreach ($images as $image) {
            Storage::disk('public')->delete($image); // Menghapus gambar dari storage
        }

        // Menghapus data galeri dari database
        $galeri->delete();

        return redirect()->route('superadmingaleri')->with('success', 'Galeri berhasil dihapus!');
    }
}
