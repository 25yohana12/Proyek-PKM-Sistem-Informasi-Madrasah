<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Guru;
use Illuminate\Support\Facades\Storage;

class PegawaiController extends Controller
{
    /**
     * Menampilkan daftar guru
     */
public function index()
{
    $gurus = Guru::whereNull('nip')
                 ->orWhere('nip', '')
                 ->latest()
                 ->paginate(10);

    return view('superadmin.pegawai', compact('gurus'));
}

    /**
     * Form tambah guru
     */
    public function create()
    {
        return view('superadmin.createpegawai');
    }

    /**
     * Simpan data guru baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'namaGuru'  => 'required|string|max:255',
            'gambar'    => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'posisi'    => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        $fotoPath = null;
        if ($request->hasFile('gambar')) {
            $fotoPath = $request->file('gambar')->store('guru', 'public');
        }

        Guru::create([
            'namaGuru'  => $request->namaGuru,
            'gambar'      => $fotoPath,
            'posisi'    => $request->posisi,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('superadmin.pegawai.index')
                         ->with('success', 'Data guru berhasil ditambahkan!');
    }

    /**
     * Form edit guru
     */
    public function edit($id)
    {
        $guru = Guru::findOrFail($id);
        return view('superadmin.editpegawai', compact('guru'));
    }

    /**
     * Update data guru
     */
    public function update(Request $request, $id)
    {
        $guru = Guru::findOrFail($id);

        $request->validate([
            'namaGuru'  => 'required|string|max:255',
            'gambar'    => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'posisi'    => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        $fotoPath = $guru->foto;
        if ($request->hasFile('gambar')) {
            // hapus foto lama
            if ($fotoPath && Storage::disk('public')->exists($fotoPath)) {
                Storage::disk('public')->delete($fotoPath);
            }
            $fotoPath = $request->file('gambar')->store('guru', 'public');
        }

        $guru->update([
            'namaGuru'  => $request->namaGuru,
            'foto'      => $fotoPath,
            'posisi'    => $request->posisi,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('superadmin.pegawai.index')
                         ->with('success', 'Data guru berhasil diperbarui!');
    }

    /**
     * Hapus data guru
     */
    public function destroy($id)
    {
        $guru = Guru::findOrFail($id);

        if ($guru->foto && Storage::disk('public')->exists($guru->foto)) {
            Storage::disk('public')->delete($guru->foto);
        }

        $guru->delete();

        return redirect()->route('superadmin.pegawai.index')
                         ->with('success', 'Data guru berhasil dihapus!');
    }
}
