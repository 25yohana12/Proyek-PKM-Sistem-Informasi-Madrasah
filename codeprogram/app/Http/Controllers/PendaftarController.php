<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftar;

class PendaftarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Untuk sementara, kirim data kosong
        $pendaftars = collect(); // Empty collection
        return view('superadmin.daftarpendaftar', compact('pendaftars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('superadmin.creatependaftar');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Logic untuk menyimpan data pendaftar
        return redirect()->route('daftar-pendaftar.index')->with('success', 'Data pendaftar berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Logic untuk menampilkan detail pendaftar
        return view('superadmin.showpendaftar');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Logic untuk form edit pendaftar
        return view('superadmin.editpendaftar');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Logic untuk update data pendaftar
        return redirect()->route('daftar-pendaftar.index')->with('success', 'Data pendaftar berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Logic untuk hapus data pendaftar
        return redirect()->route('daftar-pendaftar.index')->with('success', 'Data pendaftar berhasil dihapus.');
    }
}