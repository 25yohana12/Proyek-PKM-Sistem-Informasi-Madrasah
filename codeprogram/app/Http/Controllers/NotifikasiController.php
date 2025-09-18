<?php

namespace App\Http\Controllers;

use App\Models\DataPendaftar;
use Illuminate\Http\Request;
use App\Models\Notifikasi;

class NotifikasiController extends Controller
{
    public function adminIndex()
    {
        $admin = auth()->user();

        // Ambil notifikasi pendaftar baru atau notifikasi khusus admin
        $notifikasi = Notifikasi::where('user_id', $admin->id)
                                 ->orWhereNotNull('data_id')
                                 ->orderBy('created_at', 'desc')
                                 ->get();

        return view('admin.notifikasi.index', compact('notifikasi'));
    }

    public function show($id)
    {
        $notif = Notifikasi::findOrFail($id);

        // Tandai notifikasi sudah dibaca (opsional, admin bisa lihat tapi status read tidak penting)
        if (!$notif->read) {
            $notif->read = true;
            $notif->save();
        }

        // Ambil pendaftar jika ada
        $pendaftar = \App\Models\DataPendaftar::where('pendaftar_id', $notif->data_id)->first();

        return view('admin.notifikasi.show', compact('notif', 'pendaftar'));
    }
    
}
