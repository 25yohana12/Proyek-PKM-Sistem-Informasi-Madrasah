<?php

namespace App\Http\Controllers;

use App\Models\DataPendaftar;
use Illuminate\Http\Request;

class DataPendaftarController extends Controller
{
    public function index(Request $request)
    {
        // kalau belum ada di session, simpan semua data
        if (!session()->has('data_pendaftar')) {
            $data = DataPendaftar::paginate(1); // tampilkan 25 per halaman
            session(['data_pendaftar' => $data]);
        } else {
            // ambil dari session
            $data = session('data_pendaftar');
        }

        return view('admin.datapendaftar', compact('data'));
    }

    public function store(Request $request)
    {
        DataPendaftar::create($request->all());
        session()->forget('data_pendaftar'); // reset cache
        return redirect()->route('admin.pendaftaran')->with('success', 'Data berhasil ditambah!');
    }

    public function update(Request $request, $id)
    {
        $pendaftar = DataPendaftar::findOrFail($id);
        $pendaftar->update($request->all());
        session()->forget('data_pendaftar'); // reset cache
        return redirect()->route('admin.pendaftaran')->with('success', 'Data berhasil diupdate!');
    }

    public function destroy($id)
    {
        $pendaftar = DataPendaftar::findOrFail($id);
        $pendaftar->delete();
        session()->forget('data_pendaftar'); // reset cache
        return redirect()->route('admin.pendaftaran')->with('success', 'Data berhasil dihapus!');
    }
}
