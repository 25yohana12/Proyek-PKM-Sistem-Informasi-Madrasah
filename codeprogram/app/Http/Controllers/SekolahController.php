<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sekolah;

class SekolahController extends Controller
{
    /**
     * Tampilkan halaman profil sekolah.
     */
    public function index()
    {
        $sekolah = Sekolah::all(); // Hanya ambil satu data
        return view('superadmin.sekolah', compact('sekolah'));
    }

    /**
     * Tampilkan form edit data sekolah.
     */
    public function edit($id)
    {
        $sekolah = Sekolah::findOrFail($id);
        return view('superadmin.editsekolah', compact('sekolah'));
    }

    /**
     * Update data sekolah.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'namaSekolah' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'telepon' => 'required|string|max:50',
            'email' => 'required|email|max:255',
            'instagram' => 'nullable|string|max:255',
            'facebook' => 'nullable|string|max:255',
        ]);

        $sekolah = Sekolah::findOrFail($id);
        $sekolah->update($request->all());

        return redirect()->route('superadmin.sekolah.index')->with('success', 'Profil sekolah berhasil diperbarui.');
    }

        public function guest()
    {
        // ambil semua data sekolah (atau pakai ->first() jika cuma satu)
        $sekolah = Sekolah::all();

        // kirim ke view
        return view('guest.home', compact('sekolah'));
    }
}
