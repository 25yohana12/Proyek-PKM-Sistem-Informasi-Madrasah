<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notifikasi;

class SiswaNotifikasiController extends Controller
{
    // Menampilkan semua notifikasi milik siswa yang login
    public function index()
    {
        $userId = auth()->user()->id;
        $notifikasis = Notifikasi::where('user_id', $userId)->orderBy('created_at', 'desc')->get();
        return view('siswa.notifikasi.index', compact('notifikasis'));
    }

    // Tandai notifikasi sebagai sudah dibaca
    public function read($id)
    {
        $userId = auth()->user()->id;
        $notif = \App\Models\Notifikasi::where('user_id', $userId)->findOrFail($id);
        $notif->read = true;
        $notif->save();
        return response()->json(['success' => true]);
    }
}