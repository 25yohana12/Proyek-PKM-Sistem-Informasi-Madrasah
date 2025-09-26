<?php

namespace App\Http\Controllers;

use App\Models\DataPendaftar;
use Illuminate\Http\Request;

class DataPendaftarController extends Controller
{
    public function index(Request $request)
    {
        // Ambil data langsung dari database, tidak perlu session
        $pendaftars = DataPendaftar::paginate(25); // tampilkan 25 per halaman
        return view('admin.daftarpendaftar', compact('pendaftars'));
    }

    public function store(Request $request)
    {
        DataPendaftar::create($request->all());
        return redirect()->route('admin.pendaftaran')->with('success', 'Data berhasil ditambah!');
    }

    public function update(Request $request, $id)
    {
        $pendaftar = DataPendaftar::findOrFail($id);
        $pendaftar->update($request->all());
        return redirect()->route('admin.pendaftaran')->with('success', 'Data berhasil diupdate!');
    }

    public function destroy($id)
    {
        $pendaftar = DataPendaftar::findOrFail($id);
        $pendaftar->delete();
        return redirect()->route('admin.pendaftaran')->with('success', 'Data berhasil dihapus!');
    }

    public function datapendaftar()
    {
        $data = \App\Models\DataPendaftar::paginate(25);
        return view('admin.datapendaftar', compact('data'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pendaftar = DataPendaftar::findOrFail($id);
        return view('superadmin.showdetail', compact('pendaftar'));
    }
}