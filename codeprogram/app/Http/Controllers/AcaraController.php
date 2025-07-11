<?php

namespace App\Http\Controllers;

use App\Models\Acara;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AcaraController extends Controller
{
    /**
     * Menampilkan semua acara.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $acaras = Acara::all();
        return view('superadmin.acara', compact('acaras'));
    }

    /**
     * Menampilkan form untuk menambah acara baru.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('superadmin.createacara');
    }

    /**
     * Menyimpan acara baru.
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
            'tanggalAcara' => 'required|date',
            'gambar' => 'required|array|size:3',  // Validasi gambar harus ada 3 gambar
            'gambar.*' => 'mimes:jpeg,jpg,png,gif|max:2048', // Validasi format gambar dan ukuran
        ]);

        // Menyimpan data acara baru
        $acara = new Acara();
        $acara->superAdmin_id = 1; // Set default superAdmin_id ke 1
        $acara->judul = $request->judul;
        $acara->deskripsi = $request->deskripsi;
        $acara->tanggalAcara = $request->tanggalAcara;

        // Menyimpan gambar
        $images = [];
        foreach ($request->file('gambar') as $image) {
            $path = $image->store('acara_images', 'public');
            $images[] = $path;
        }

        // Menyimpan path gambar dalam format JSON
        $acara->gambar = json_encode($images);

        $acara->save();

        return redirect()->route('acara.index')->with('success', 'Acara berhasil disimpan!');
    }

    /**
     * Menampilkan form untuk mengedit acara yang sudah ada.
     *
     * @param \App\Models\Acara $acara
     * @return \Illuminate\Http\Response
     */
    public function edit(Acara $acara)
    {
        return view('superadmin.editacara', compact('acara'));
    }

    /**
     * Memperbarui acara yang sudah ada.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Acara $acara
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Acara $acara)
    {
        // Validasi input
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tanggalAcara' => 'required|date',
            'gambar' => 'nullable|array|size:3',  // Validasi gambar harus ada 3 gambar jika ada
            'gambar.*' => 'mimes:jpeg,jpg,png,gif|max:2048', // Validasi format gambar dan ukuran
        ]);

        // Memperbarui acara
        $acara->judul = $request->judul;
        $acara->deskripsi = $request->deskripsi;
        $acara->tanggalAcara = $request->tanggalAcara;

        // Menyimpan gambar baru jika ada
        if ($request->hasFile('gambar')) {
            $images = json_decode($acara->gambar, true); // Mengambil gambar lama

            // Menyimpan gambar baru
            foreach ($request->file('gambar') as $image) {
                $path = $image->store('acara_images', 'public');
                $images[] = $path;
            }

            // Menyimpan gambar yang sudah diperbarui dalam format JSON
            $acara->gambar = json_encode($images);
        }

        $acara->save();

        return redirect()->route('acara.index')->with('success', 'Acara berhasil diperbarui!');
    }

    /**
     * Menampilkan detail acara.
     *
     * @param \App\Models\Acara $acara
     * @return \Illuminate\Http\Response
     */
    public function show(Acara $acara)
    {
        return view('superadmin.acara.show', compact('acara'));
    }

    /**
     * Menghapus acara yang sudah ada.
     *
     * @param \App\Models\Acara $acara
     * @return \Illuminate\Http\Response
     */
    public function destroy(Acara $acara)
    {
        // Menghapus gambar-gambar terkait dari storage
        $images = json_decode($acara->gambar, true);
        foreach ($images as $image) {
            Storage::disk('public')->delete($image); // Menghapus gambar dari storage
        }

        // Menghapus data acara dari database
        $acara->delete();

        return redirect()->route('acara.index')->with('success', 'Acara berhasil dihapus!');
    }
}
