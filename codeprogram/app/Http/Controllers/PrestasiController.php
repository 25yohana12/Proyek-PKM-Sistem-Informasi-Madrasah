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
        $prestasis = Prestasi::orderBy('created_at', 'desc')->get(); // Menampilkan semua prestasi, terbaru dulu
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
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'penghargaan' => 'required|string|max:255',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validasi gambar
        ]);

        // Simpan gambar
        $gambarPaths = [];
        if ($request->hasFile('gambar')) {
            foreach ($request->file('gambar') as $gambar) {
                $path = $gambar->store('prestasi_images', 'public');
                $gambarPaths[] = $path;
            }
        }

        // Menyimpan prestasi
        Prestasi::create([
            'superAdmin_id' => auth()->user()->id ?? 1, // Gunakan ID user yang login atau default 1
            'nama' => $validated['nama'],
            'penghargaan' => $validated['penghargaan'],
            'judul' => $validated['judul'],
            'deskripsi' => $validated['deskripsi'],
            'gambar' => json_encode($gambarPaths), // Menyimpan path gambar sebagai JSON
        ]);

        return redirect()->route('superadmin.prestasi.index')->with('success', 'Prestasi berhasil ditambahkan!');
    }

    /**
     * Menampilkan detail prestasi.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $prestasi = Prestasi::findOrFail($id);
        return view('superadmin.showprestasi', compact('prestasi'));
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
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'penghargaan' => 'required|string|max:255',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'deleted_images' => 'nullable|string' // Input untuk gambar yang akan dihapus
        ]);

        $prestasi = Prestasi::findOrFail($id);

        // Update data prestasi
        $prestasi->update([
            'nama' => $validated['nama'],
            'penghargaan' => $validated['penghargaan'],
            'judul' => $validated['judul'],
            'deskripsi' => $validated['deskripsi']
        ]);

        // Handle penghapusan gambar lama
        $currentImages = json_decode($prestasi->gambar, true) ?? [];
        
        if ($request->has('deleted_images') && !empty($request->deleted_images)) {
            $deletedImages = json_decode($request->deleted_images, true);
            
            if (is_array($deletedImages)) {
                foreach ($deletedImages as $deletedImage) {
                    // Hapus file dari storage
                    if (Storage::disk('public')->exists($deletedImage)) {
                        Storage::disk('public')->delete($deletedImage);
                    }
                    
                    // Hapus dari array gambar current
                    $currentImages = array_filter($currentImages, function($image) use ($deletedImage) {
                        return $image !== $deletedImage;
                    });
                }
            }
        }

        // Handle upload gambar baru
        if ($request->hasFile('gambar')) {
            foreach ($request->file('gambar') as $gambar) {
                $path = $gambar->store('prestasi_images', 'public');
                $currentImages[] = $path;
            }
        }

        // Update gambar di database
        $prestasi->update([
            'gambar' => json_encode(array_values($currentImages)) // Re-index array
        ]);

        return redirect()->route('superadmin.prestasi.index')->with('success', 'Prestasi berhasil diperbarui!');
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

        // Hapus semua gambar terkait
        $gambarPaths = json_decode($prestasi->gambar, true);
        if (is_array($gambarPaths)) {
            foreach ($gambarPaths as $image) {
                if (Storage::disk('public')->exists($image)) {
                    Storage::disk('public')->delete($image);
                }
            }
        }

        // Hapus data prestasi
        $prestasi->delete();

        return redirect()->route('superadmin.prestasi.index')->with('success', 'Prestasi berhasil dihapus!');
    }

    /**
     * Method untuk hapus gambar individual via AJAX (opsional)
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteImage(Request $request, $id)
    {
        $prestasi = Prestasi::findOrFail($id);
        $imagePath = $request->input('image_path');

        $currentImages = json_decode($prestasi->gambar, true) ?? [];
        
        // Hapus gambar dari storage
        if (Storage::disk('public')->exists($imagePath)) {
            Storage::disk('public')->delete($imagePath);
        }

        // Hapus dari array
        $currentImages = array_filter($currentImages, function($image) use ($imagePath) {
            return $image !== $imagePath;
        });

        // Update database
        $prestasi->update([
            'gambar' => json_encode(array_values($currentImages))
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Gambar berhasil dihapus'
        ]);
    }

    /**
     * Method untuk search prestasi (opsional)
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $query = $request->get('q');
        
        $prestasis = Prestasi::where('judul', 'LIKE', "%{$query}%")
                            ->orWhere('nama', 'LIKE', "%{$query}%")
                            ->orWhere('penghargaan', 'LIKE', "%{$query}%")
                            ->orderBy('created_at', 'desc')
                            ->get();

        return view('superadmin.prestasi', compact('prestasis', 'query'));
    }

        public function guest()
    {
        // Ambil semua prestasi (urut terbaru). Ganti →paginate(6) jika mau paging
        $prestasi = Prestasi::latest()->get();

        // Kirim ke Blade: resources/views/prestasi/index.blade.php
        return view('guest.prestasi', compact('prestasi'));
    }

            public function siswa()
    {
        // Ambil semua prestasi (urut terbaru). Ganti →paginate(6) jika mau paging
        $prestasi = Prestasi::latest()->get();

        // Kirim ke Blade: resources/views/prestasi/index.blade.php
        return view('siswa.prestasi', compact('prestasi'));
    }
}