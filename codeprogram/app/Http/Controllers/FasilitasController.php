<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use Illuminate\Http\Request;

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
            'gambar.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePaths = [];
        if ($request->hasFile('gambar')) {
            foreach ($request->file('gambar') as $image) {
                $imagePaths[] = $image->store('public/fasilitas_images');
            }
        }

        Fasilitas::create([
            'superAdmin_id' => 1,
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
            'gambar.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePaths = json_decode($fasilitas->gambar, true);
        if ($request->hasFile('gambar')) {
            foreach ($request->file('gambar') as $image) {
                $imagePaths[] = $image->store('public/fasilitas_images');
            }
        }

        $fasilitas->update([
            'namaFasilitas' => $validated['namaFasilitas'],
            'prasarana' => $validated['prasarana'],
            'sarana' => $validated['sarana'],
            'jumlah' => $validated['jumlah'],
            'gambar' => json_encode($imagePaths),
        ]);

        return redirect()->route('fasilitas.index')->with('success', 'Fasilitas berhasil diperbarui!');
    }

    // Menghapus fasilitas tertentu
    public function destroy(Fasilitas $fasilitas)
    {
        $fasilitas->delete();
        return response()->json(null, 204);
    }
}
