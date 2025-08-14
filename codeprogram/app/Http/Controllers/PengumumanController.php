<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    public function index()
{
    // Ambil data dari model InformasiPendaftaran (atau model lain sesuai kebutuhan)
    $informasi = \App\Models\InformasiPendaftaran::latest()->first();
    // Jika pakai model Pengumuman, sesuaikan:
    // $informasi = \App\Models\Pengumuman::latest()->first();

    return view('guest.Pengumuman', compact('informasi'));
}

    // Tambahkan method lain (create, store, edit, update, destroy) jika ingin CRUD
}