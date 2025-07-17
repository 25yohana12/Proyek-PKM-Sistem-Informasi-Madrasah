<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InformasiPendaftaran;

class InformasiPendaftaranController extends Controller
{
    /**
     * Tampilkan data informasi pendaftaran (hanya satu).
     */
    public function index()
    {
        $informasi = InformasiPendaftaran::first();
        return view('superadmin.informasipendaftaran', compact('informasi'));
    }

    /**
     * Tampilkan form edit informasi pendaftaran.
     */
    public function edit($id)
    {
        $informasi = InformasiPendaftaran::findOrFail($id);
        return view('superadmin.editinformasipendaftaran', compact('informasi'));
    }

    /**
     * Perbarui data informasi pendaftaran.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'tahunAjaran'         => 'required|string|max:50',
            'tanggalPendaftaran' => 'required|date',
            'tanggalPengumuman'  => 'required|date',
            'tanggalPenutupan'   => 'required|date',
            'jumlahSiswa'        => 'required|integer|min:0',
            'pengumuman'         => 'nullable|string',
        ]);

        $informasi = InformasiPendaftaran::findOrFail($id);
        $informasi->update($request->all());

        return redirect()->route('informasi.index')->with('success', 'Informasi pendaftaran berhasil diperbarui.');
    }
}
