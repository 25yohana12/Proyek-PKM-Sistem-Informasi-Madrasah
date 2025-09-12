<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notifikasi;

class NotifikasiController extends Controller
{
    public function adminIndex()
    {
        $notifikasis = Notifikasi::orderBy('created_at', 'desc')->get();
        return view('admin.notifikasi.index', compact('notifikasis'));
    }

    public function show($id)
    {
        $notif = Notifikasi::findOrFail($id);
        // Tandai notifikasi sudah dibaca
        if (!$notif->read) {
            $notif->read = true;
            $notif->save();
        }
        $pendaftar = \App\Models\DataPendaftar::where('pendaftar_id', $notif->data_id)->first();
        return view('admin.notifikasi.show', compact('notif', 'pendaftar'));
    }
}
