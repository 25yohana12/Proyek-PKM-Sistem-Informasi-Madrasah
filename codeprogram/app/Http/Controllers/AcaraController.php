<?php

namespace App\Http\Controllers;

use App\Models\Acara;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

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
            'gambar' => 'nullable|array', // Gambar opsional, bisa array kosong
            'gambar.*' => 'mimes:jpeg,jpg,png,gif|max:2048', // Validasi format gambar dan ukuran
        ]);

        try {
            // Cek apakah superAdmin_id = 1 ada di database
            $superAdminExists = DB::table('superadmin')->where('superAdmin_id', 1)->exists();
            
            if (!$superAdminExists) {
                return redirect()->back()->with('error', 'Super Admin tidak ditemukan.');
            }

            // Menyimpan data acara baru
            $acara = new Acara();
            $acara->superAdmin_id = 1;
            $acara->judul = $request->judul;
            $acara->deskripsi = $request->deskripsi;
            $acara->tanggalAcara = $request->tanggalAcara;

            // Menyimpan gambar jika ada
            $images = [];
            if ($request->hasFile('gambar')) {
                foreach ($request->file('gambar') as $image) {
                    $path = $image->store('acara_images', 'public');
                    $images[] = $path;
                }
            }

            // Menyimpan path gambar dalam format JSON (bisa array kosong)
            $acara->gambar = json_encode($images);

            $acara->save();

            return redirect()->route('superadmin.acara.index')->with('success', 'Acara berhasil disimpan!');
            
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
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
            'deskripsi'    => [
                'required',
                'string',
                function ($attribute, $value, $fail) {
                    // Hitung kata (abaikan HTML)
                    $clean  = trim(preg_replace('/\s+/u', ' ', strip_tags($value) ?? ''));
                    $words  = $clean === '' ? 0 : count(preg_split('/\s+/u', $clean, -1, PREG_SPLIT_NO_EMPTY));
                    if ($words >= 250) { // < 250 kata
                        $fail("Deskripsi maksimal 249 kata. Saat ini: {$words} kata.");
                    }
                },
            ],
            'tanggalAcara' => 'required|date',
            'gambar' => 'nullable|array', // Gambar opsional
            'gambar.*' => 'mimes:jpeg,jpg,png,gif|max:2048', // Validasi format gambar dan ukuran
        ]);

        try {
            // Memperbarui acara
            $acara->judul = $request->judul;
            $acara->deskripsi = $request->deskripsi;
            $acara->tanggalAcara = $request->tanggalAcara;

            // Menyimpan gambar baru jika ada
            if ($request->hasFile('gambar')) {
                $images = json_decode($acara->gambar, true) ?? []; // Mengambil gambar lama atau array kosong

                // Menyimpan gambar baru
                foreach ($request->file('gambar') as $image) {
                    $path = $image->store('acara_images', 'public');
                    $images[] = $path;
                }

                // Menyimpan gambar yang sudah diperbarui dalam format JSON
                $acara->gambar = json_encode($images);
            }

            $acara->save();

            return redirect()->route('superadmin.acara.index')->with('success', 'Acara berhasil diperbarui!');
            
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Menampilkan detail acara.
     *
     * @param \App\Models\Acara $acara
     * @return \Illuminate\Http\Response
     */
    public function show(Acara $acara)
    {
        return view('superadmin.showacara', compact('acara'));
    }

    /**
     * Menghapus acara yang sudah ada.
     *
     * @param \App\Models\Acara $acara
     * @return \Illuminate\Http\Response
     */
    public function destroy(Acara $acara)
    {
        try {
            // Menghapus gambar-gambar terkait dari storage
            $images = json_decode($acara->gambar, true) ?? [];
            if (!empty($images)) {
                foreach ($images as $image) {
                    Storage::disk('public')->delete($image);
                }
            }

            // Menghapus data acara dari database
            $acara->delete();

            return redirect()->route('superadmin.acara.index')->with('success', 'Acara berhasil dihapus!');
            
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

        public function guest()
    {
        // Ambil semua data acara, terbaru di atas
        $acaras = Acara::orderByDesc('tanggalAcara')->get();

        return view('guest.acara', compact('acaras'));
    }

            public function siswa()
    {
        // Ambil semua data acara, terbaru di atas
        $acaras = Acara::orderByDesc('tanggalAcara')->get();

        return view('siswa.acara', compact('acaras'));
    }
}