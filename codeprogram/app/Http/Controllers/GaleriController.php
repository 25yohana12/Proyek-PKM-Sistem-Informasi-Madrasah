<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

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

    /**
     * Menampilkan form untuk membuat galeri baru.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('superadmin.creategaleri');
    }

    /**
     * Menyimpan galeri baru (termasuk banyak gambar).
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Debug: log semua data yang masuk
        \Log::info('=== GALERI STORE DEBUG ===');
        \Log::info('Request data: ' . json_encode($request->all()));
        \Log::info('Has files: ' . ($request->hasFile('gambar') ? 'YES' : 'NO'));
        \Log::info('Files: ' . json_encode($request->file()));

        // Validasi input
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'required|array',
            'gambar.*' => 'mimes:jpeg,jpg,png,gif|max:2048',
        ]);

        \Log::info('Validation passed');

        try {
            // Cek apakah superAdmin_id = 1 ada di database
            $superAdminExists = DB::table('superadmin')->where('superAdmin_id', 1)->exists();
            
            if (!$superAdminExists) {
                \Log::error('SuperAdmin not found');
                return redirect()->back()->with('error', 'Super Admin tidak ditemukan.');
            }

            \Log::info('SuperAdmin exists');

            // Menyimpan data galeri baru
            $galeri = new Galeri();
            $galeri->superAdmin_id = 1;
            $galeri->judul = $request->judul;
            $galeri->deskripsi = $request->deskripsi;

            // Menyimpan banyak gambar
            $images = [];
            if ($request->hasFile('gambar')) {
                \Log::info('Processing files...');
                foreach ($request->file('gambar') as $index => $image) {
                    $path = $image->store('galeri_images', 'public');
                    $images[] = $path;
                    \Log::info("File $index saved: $path");
                }
            } else {
                \Log::warning('No files in request');
            }

            // Menyimpan path gambar dalam format JSON
            $galeri->gambar = json_encode($images);
            
            \Log::info('Data to save: ' . json_encode([
                'superAdmin_id' => $galeri->superAdmin_id,
                'judul' => $galeri->judul,
                'deskripsi' => $galeri->deskripsi,
                'gambar' => $galeri->gambar,
            ]));

            $result = $galeri->save();
            \Log::info('Save result: ' . ($result ? 'SUCCESS' : 'FAILED') . ', ID: ' . ($galeri->galeri_id ?? 'null'));

            return redirect()->route('galeri.index')->with('success', 'Galeri berhasil disimpan!');
            
        } catch (\Exception $e) {
            \Log::error('Error saving galeri: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine());
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
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
            'gambar' => 'nullable|array',
            'gambar.*' => 'mimes:jpeg,jpg,png,gif|max:2048',
        ]);

        try {
            // Memperbarui galeri
            $galeri->judul = $request->judul;
            $galeri->deskripsi = $request->deskripsi;

            // Handle existing images removal
            $existingImages = json_decode($galeri->gambar, true) ?? [];
            
            if ($request->has('existing_images')) {
                $existingImages = $request->existing_images;
            }

            // Handle removed images
            if ($request->has('removed_images')) {
                foreach ($request->removed_images as $removedImage) {
                    // Remove from storage
                    Storage::disk('public')->delete($removedImage);
                    // Remove from existing images array
                    $existingImages = array_diff($existingImages, [$removedImage]);
                }
            }

            // Menambahkan gambar baru jika ada
            if ($request->hasFile('gambar')) {
                // Menyimpan gambar baru
                foreach ($request->file('gambar') as $image) {
                    // Menyimpan gambar baru ke storage dan mendapatkan path-nya
                    $path = $image->store('galeri_images', 'public');
                    $existingImages[] = $path;
                }
            }

            // Menyimpan gambar yang sudah diperbarui dalam format JSON
            $galeri->gambar = json_encode(array_values($existingImages));

            $galeri->save();

            return redirect()->route('superadmin.galeri.index')->with('success', 'Galeri berhasil diperbarui!');
            
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Menghapus galeri tertentu.
     *
     * @param \App\Models\Galeri $galeri
     * @return \Illuminate\Http\Response
     */
    public function destroy(Galeri $galeri)
    {
        try {
            // Hapus gambar-gambar terkait dari storage
            $images = json_decode($galeri->gambar, true);
            if ($images) {
                foreach ($images as $image) {
                    Storage::disk('public')->delete($image);
                }
            }

            // Menghapus data galeri dari database
            $galeri->delete();

            return redirect()->route('superadmin.galeri.index')->with('success', 'Galeri berhasil dihapus!');
            
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

        public function guest()
    {
        // Ambil semua foto, urut terbaru (ganti ->paginate() jika mau paging)
        $galeri = Galeri::latest()->get();

        // Kirim ke view resources/views/galeri/index.blade.php
        return view('guest.galeri', compact('galeri'));
    }

            public function siswa()
    {
        // Ambil semua foto, urut terbaru (ganti ->paginate() jika mau paging)
        $galeri = Galeri::latest()->get();

        // Kirim ke view resources/views/galeri/index.blade.php
        return view('siswa.galeri', compact('galeri'));
    }
}