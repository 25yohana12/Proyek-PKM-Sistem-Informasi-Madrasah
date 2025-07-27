<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FasilitasController extends Controller
{
    // Menampilkan daftar fasilitas
    public function index()
    {
        $fasilitas = Fasilitas::all();
        return view('superadmin.fasilitas', compact('fasilitas'));
    }

    // Menampilkan form untuk membuat fasilitas baru
    public function create()
    {
        return view('superadmin.createfasilitas');
    }

    // Menyimpan fasilitas baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'namaFasilitas' => 'required|string|max:255',
            'prasarana' => 'required|string',
            'sarana' => 'required|string',
            'jumlah' => 'required|integer',
            'gambar' => 'nullable',
            'gambar.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePaths = [];
        if ($request->hasFile('gambar')) {
            foreach ($request->file('gambar') as $image) {
                $imagePaths[] = $image->store('fasilitas_images', 'public');
            }
        }

        Fasilitas::create([
            'superAdmin_id' => 1, // atau sesuai kebutuhan
            'namaFasilitas' => $validatedData['namaFasilitas'],
            'prasarana' => $validatedData['prasarana'],
            'sarana' => $validatedData['sarana'],
            'jumlah' => $validatedData['jumlah'],
            'gambar' => json_encode($imagePaths),
        ]);

        return redirect()->route('fasilitas.index')->with('success', 'Fasilitas berhasil ditambahkan!');
    }

    // Menampilkan detail fasilitas tertentu
    public function show(Fasilitas $fasilitas)
    {
        return view('superadmin.showfasilitas', compact('fasilitas'));
    }

    // Menampilkan form untuk mengedit fasilitas
    public function edit(Fasilitas $fasilitas)
    {
        return view('superadmin.editfasilitas', compact('fasilitas'));
    }

    // Memperbarui data fasilitas
    public function update(Request $request, Fasilitas $fasilitas)
    {
        $validated = $request->validate([
            'namaFasilitas' => 'required|string|max:255',
            'prasarana' => 'required|string',
            'sarana' => 'required|string',
            'jumlah' => 'required|integer',
            'gambar' => 'nullable',
            'gambar.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'removed_images' => 'array',
            'removed_images.*' => 'integer',
        ]);

        $oldImages = json_decode($fasilitas->gambar, true) ?: [];

        // Hapus gambar yang dihapus user
        $removedIdx = $request->input('removed_images', []);
        foreach ($removedIdx as $idx) {
            if (isset($oldImages[$idx])) {
                Storage::disk('public')->delete($oldImages[$idx]);
                unset($oldImages[$idx]);
            }
        }
        $oldImages = array_values($oldImages);

        // Tambah gambar baru
        if ($request->hasFile('gambar')) {
            foreach ($request->file('gambar') as $image) {
                $oldImages[] = $image->store('fasilitas_images', 'public');
            }
        }

        $fasilitas->update([
            'namaFasilitas' => $validated['namaFasilitas'],
            'prasarana' => $validated['prasarana'],
            'sarana' => $validated['sarana'],
            'jumlah' => $validated['jumlah'],
            'gambar' => json_encode($oldImages),
        ]);

        return redirect()->route('fasilitas.index')->with('success', 'Fasilitas berhasil diperbarui!');
    }

    // Menghapus fasilitas tertentu
    public function destroy(Fasilitas $fasilitas)
    {
        // Hapus semua gambar dari storage
        $images = json_decode($fasilitas->gambar, true) ?: [];
        foreach ($images as $img) {
            Storage::disk('public')->delete($img);
        }
        $fasilitas->delete();
        return redirect()->route('fasilitas.index')->with('success', 'Fasilitas berhasil dihapus!');
    }

            public function guest()
    {
        // Ambil data (ganti ->paginate(6) jika butuh pagination)
        $fasilitas = Fasilitas::latest()->get();

        // Kirim ke Blade resources/views/fasilitas/index.blade.php
        return view('guest.fasilitas', compact('fasilitas'));
    }
}