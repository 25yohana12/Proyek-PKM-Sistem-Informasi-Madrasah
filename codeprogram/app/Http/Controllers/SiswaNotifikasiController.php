<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notifikasi;

class SiswaNotifikasiController extends Controller
{
    public function index()
    {
        $pendaftar = auth()->guard('pendaftar')->user();

        if (!$pendaftar || empty($pendaftar->tanggal_lahir)) {
            $notifikasi = collect();
        } else {
            $notifikasi = Notifikasi::where('data_id', $pendaftar->pendaftar_id)
                                     ->orderBy('created_at', 'desc')
                                     ->get();
        }

        return view('siswa.notifikasi.index', compact('notifikasi'));
    }

    public function show($id)
    {
        $pendaftar = auth()->guard('pendaftar')->user();

        $notif = Notifikasi::where('id', $id)
                    ->where('data_id', $pendaftar->pendaftar_id)
                    ->firstOrFail();

        if (!$notif->read) {
            $notif->read = true;
            $notif->save();
        }

        return view('siswa.notifikasi.show', compact('notif', 'pendaftar'));
    }

    public function read($id)
    {
        $pendaftar = auth()->guard('pendaftar')->user();

        $notif = Notifikasi::where('id', $id)
                    ->where('data_id', $pendaftar->pendaftar_id)
                    ->firstOrFail();

        $notif->read = true;
        $notif->save();

        return response()->json(['success' => true]);
    }
}
