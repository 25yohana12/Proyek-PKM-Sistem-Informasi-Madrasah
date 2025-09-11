<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PrestasiController extends Controller
{
    /**
     * Menampilkan daftar prestasi.
     */
    public function index()
    {
        $prestasis = Prestasi::orderBy('created_at', 'desc')->get();
        return view('superadmin.prestasi', compact('prestasis'));
    }

    /**
     * Menampilkan form tambah prestasi.
     */
    public function create()
    {
        return view('superadmin.createprestasi');
    }

    /**
     * Simpan prestasi baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'penghargaan' => 'required|string|max:255',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'jenis_prestasi' => 'required|in:akademik,non-akademik',
            'gambar.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Simpan gambar
        $gambarPaths = [];
        if ($request->hasFile('gambar')) {
            foreach ($request->file('gambar') as $gambar) {
                $path = $gambar->store('prestasi_images', 'public');
                $gambarPaths[] = $path;
            }
        }

        // Simpan prestasi
        Prestasi::create([
            'superAdmin_id' => auth()->user()->id ?? 1,
            'nama' => $validated['nama'],
            'penghargaan' => $validated['penghargaan'],
            'judul' => $validated['judul'],
            'deskripsi' => $validated['deskripsi'],
            'jenis_prestasi' => $validated['jenis_prestasi'],
            'gambar' => json_encode($gambarPaths),
        ]);

        return redirect()->route('superadmin.prestasi.index')
                         ->with('success', 'Prestasi berhasil ditambahkan!');
    }

    /**
     * Tampilkan detail prestasi.
     */
    public function show($id)
    {
        $prestasi = Prestasi::findOrFail($id);
        return view('superadmin.showprestasi', compact('prestasi'));
    }

    /**
     * Form edit prestasi.
     */
    public function edit($id)
    {
        $prestasi = Prestasi::findOrFail($id);
        return view('superadmin.editprestasi', compact('prestasi'));
    }

    /**
     * Update prestasi.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'penghargaan' => 'required|string|max:255',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'jenis_prestasi' => 'required|in:akademik,non-akademik',
            'gambar.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'deleted_images' => 'nullable|string',
        ]);

        $prestasi = Prestasi::findOrFail($id);

        // Update data inti
        $prestasi->update([
            'nama' => $validated['nama'],
            'penghargaan' => $validated['penghargaan'],
            'judul' => $validated['judul'],
            'deskripsi' => $validated['deskripsi'],
            'jenis_prestasi' => $validated['jenis_prestasi'],
        ]);

        // Kelola gambar
        $currentImages = json_decode($prestasi->gambar, true) ?? [];

        // Hapus gambar lama jika diminta
        if ($request->has('deleted_images') && !empty($request->deleted_images)) {
            $deletedImages = json_decode($request->deleted_images, true);
            if (is_array($deletedImages)) {
                foreach ($deletedImages as $deletedImage) {
                    if (Storage::disk('public')->exists($deletedImage)) {
                        Storage::disk('public')->delete($deletedImage);
                    }
                    $currentImages = array_filter($currentImages, fn($img) => $img !== $deletedImage);
                }
            }
        }

        // Tambah gambar baru
        if ($request->hasFile('gambar')) {
            foreach ($request->file('gambar') as $gambar) {
                $path = $gambar->store('prestasi_images', 'public');
                $currentImages[] = $path;
            }
        }

        // Simpan update gambar
        $prestasi->update([
            'gambar' => json_encode(array_values($currentImages))
        ]);

        return redirect()->route('superadmin.prestasi.index')
                         ->with('success', 'Prestasi berhasil diperbarui!');
    }

    /**
     * Hapus prestasi.
     */
    public function destroy($id)
    {
        $prestasi = Prestasi::findOrFail($id);

        $gambarPaths = json_decode($prestasi->gambar, true);
        if (is_array($gambarPaths)) {
            foreach ($gambarPaths as $image) {
                if (Storage::disk('public')->exists($image)) {
                    Storage::disk('public')->delete($image);
                }
            }
        }

        $prestasi->delete();
        return redirect()->route('superadmin.prestasi.index')
                         ->with('success', 'Prestasi berhasil dihapus!');
    }

    /**
     * Hapus gambar individual via AJAX.
     */
    public function deleteImage(Request $request, $id)
    {
        $prestasi = Prestasi::findOrFail($id);
        $imagePath = $request->input('image_path');

        $currentImages = json_decode($prestasi->gambar, true) ?? [];

        if (Storage::disk('public')->exists($imagePath)) {
            Storage::disk('public')->delete($imagePath);
        }

        $currentImages = array_filter($currentImages, fn($img) => $img !== $imagePath);

        $prestasi->update([
            'gambar' => json_encode(array_values($currentImages))
        ]);

        return response()->json(['success' => true, 'message' => 'Gambar berhasil dihapus']);
    }

    /**
     * Cari prestasi.
     */
    public function search(Request $request)
    {
        $query = $request->get('q');
        $prestasis = Prestasi::where('judul', 'LIKE', "%{$query}%")
                            ->orWhere('nama', 'LIKE', "%{$query}%")
                            ->orWhere('penghargaan', 'LIKE', "%{$query}%")
                            ->orWhere('jenis_prestasi', 'LIKE', "%{$query}%")
                            ->orderBy('created_at', 'desc')
                            ->get();

        return view('superadmin.prestasi', compact('prestasis', 'query'));
    }

    /**
     * Guest view prestasi.
     */
    public function guest()
    {
        $prestasi = Prestasi::latest()->get();
        return view('guest.prestasi', compact('prestasi'));
    }

    /**
     * Siswa view prestasi.
     */
    public function siswa()
    {
        $prestasi = Prestasi::latest()->get();
        return view('siswa.prestasi', compact('prestasi'));
    }
}
